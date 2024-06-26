<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicle = Vehicle::all();

        $data = $vehicle->pluck('amount_of_use', 'vname');
        $chart = new Chart;
        $chart->labels($data->values());
        $chart->dataset('Jumlah Pemakaian Kendaraan', 'bar', $data->keys())->backgroundColor('rgb(11, 96, 176, 0.1)');

        return view('admin.vehicle', ['vehicle' => $vehicle, 'chart' => $chart]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
