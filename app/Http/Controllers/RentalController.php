<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Rental::with('car')->get();
        return Rental::all();
        return response()->json(Rental::all());
    }

    public function rentalsAfterDate(string $date)
    {
        $rentals = Rental::with('car')->where('fromDate', '>=', $date)->get();
        return $rentals;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $today = date("Y.m.d");
        //date_create($today)
        if ($request->fromDate <= $today)
        {
            return response()->json(["message" => "Hibás dátum"], 422);
        }
        $rental = Rental::create($request->all());

        return $rental;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
