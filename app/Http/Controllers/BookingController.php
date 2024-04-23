<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Driver;
use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Exports\BookingsExport;
use PhpParser\Node\Expr\Cast\Bool_;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = Booking::all();
        $booking = Booking::join('vehicles', 'vehicles.id', '=', 'bookings.vehicle_id')
            ->join('drivers', 'drivers.id', '=', 'bookings.driver_id')
            ->join('users as au', 'au.id', '=', 'bookings.user_id')
            ->join('users as ru', 'ru.id', '=', 'bookings.admin_id')
            ->get(['bookings.*', 'vehicles.vname', 'drivers.name', 'au.username as username', 'ru.username as adminname']);
        return view('admin.show', ['booking' => $booking]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicle = Vehicle::where('status', '=', 'available')->get();
        $driver = Driver::where('status', '=', 'available')->get();
        $admin = User::where('admin', '=', '1')->get();
        return view('admin.bookings.index', ['vehicle' => $vehicle, 'driver' => $driver, 'admin' => $admin]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        $save = new Booking();
        $save->vehicle_id = $request->input('vehicle');
        $save->driver_id = $request->input('driver');
        $save->start = $request->input('mulai');
        $save->end = $request->input('selesai');
        $save->user_id = $user;
        $save->admin_id = $request->input('admin');
        $save->status = 'pending';
        $save->save();

        return redirect()->route('admin.show')->with('status', 'Booking has been uploaded');
    }

    public function approved(Request $request, $id)
    {
        $status = Booking::find($id);
        $status->status = $request->input('status');
        $status->update();
        return redirect()->route('admin.show')->with('success', 'Update Successful');
    }

    public function export()
    {
        return Excel::download(new BookingsExport, 'booking.xlsx');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
