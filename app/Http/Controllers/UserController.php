<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Asset;
use App\Models\Driver;
use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function show()
    {
        $booking = Booking::all();
        $booking = Booking::join('vehicles', 'vehicles.id', '=', 'bookings.vehicle_id')
            ->join('drivers', 'drivers.id', '=', 'bookings.driver_id')
            ->join('users as au', 'au.id', '=', 'bookings.user_id')
            ->join('users as ru', 'ru.id', '=', 'bookings.admin_id')
            ->get(['bookings.*', 'vehicles.vname', 'drivers.name', 'au.username as username', 'ru.username as adminname']);
        return view('user.show', ['booking' => $booking]);
    }

    public function user()
    {
        $vehicle = Vehicle::where('status', '=', 'available')->get();
        $driver = Driver::where('status', '=', 'available')->get();
        $admin = User::where('admin', '=', '1')->get();
        return view('user.bookings', ['vehicle' => $vehicle, 'driver' => $driver, 'admin' => $admin]);
    }

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
        return redirect()->route('user.show')->with('status', 'Booking has been uploaded');
    }

    public function edit(Request $request, $id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
