<?php

namespace App\Http\Controllers;

use App\Models\Medicines;
use App\Http\Requests\StoreMedicinesRequest;
use App\Http\Requests\UpdateMedicinesRequest;

class MedicinesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicinesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicines $medicines)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicines $medicines)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicinesRequest $request, Medicines $medicines)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicines $medicines)
    {
        //
    }
}
