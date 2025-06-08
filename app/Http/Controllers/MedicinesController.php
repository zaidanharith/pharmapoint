<?php

namespace App\Http\Controllers;

use App\Models\Medicines;
use Illuminate\Support\Str;
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

        dd($request->all());
        $validatedData = $request->validate(
            [
                'name' => 'required|max:255',
                'description' => 'nullable|string',
                'category_id' => 'required|exists:categories,id',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ]
        );
        
        
        $validatedData['slug'] = Str::slug($validatedData['name']);
        
        // Handle image upload  
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('medicine-images');
        }

        Medicines::create($validatedData);

        return redirect('/katalog')->with('success', "Produk {$validatedData['name']} berhasil ditambahkan ke katalog.");
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
    public function destroy($slug)
    {
        $medicine = Medicines::where('slug', $slug)->firstOrFail();
        
        if ($medicine->image) {
            $imagePath = public_path('storage/' . $medicine->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        $medicineName = $medicine->name;
        $medicine->delete();

        return redirect('/katalog')->with('success', "Produk {$medicineName} berhasil dihapus dari katalog.");
    }
}
