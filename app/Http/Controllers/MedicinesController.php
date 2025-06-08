<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Medicines;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MedicineDescription;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMedicinesRequest;
use App\Http\Requests\UpdateMedicinesRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MedicinesController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $this->authorize('owner-admin');
        return view('tambah-katalog',[
            'title'=>'Tambah Katalog', 'categories' => Category::all()
        ]); 
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
    public function store(Request $request)
    {
        $this->authorize('owner-admin');

        $messages = [
            'name.required' => 'Nama obat harus diisi.',
            'category_id.required' => 'Kategori obat harus dipilih.',
            'category_id.exists' => 'Kategori obat tidak valid.',
            'price.required' => 'Harga obat harus diisi.',
            'price.numeric' => 'Harga obat harus berupa angka.',
            'price.min' => 'Harga obat tidak boleh kurang dari 0.',
            'stock.required' => 'Stok obat harus diisi.',
            'stock.integer' => 'Stok obat harus berupa angka bulat.',
            'stock.min' => 'Stok obat tidak boleh kurang dari 0.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Gambar harus berformat jpg, jpeg, atau png.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.'
        ];

        $validatedData = $request->validate(
            [
                'name' => 'required|max:255',
                'category_id' => 'required|exists:categories,id',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ]
        );
        
        $descriptions = $request->input('description');
        if ($descriptions) {
            $validatedData['description'] = $descriptions;
        } else {
            $validatedData['description'] = null;
        }
        
        unset($validatedData['description']);

        $validatedData['slug'] = Str::slug($validatedData['name']);
        
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('medicine-images');
        }

        Medicines::create($validatedData);

        if ($descriptions) {
            foreach ($descriptions as $description) {
                if (!empty($description)) {
                    $validatedDescriptions[] = [
                        'medicine_id' => Medicines::latest()->first()->id,
                        'description' => $description
                    ];
                }
            }
            MedicineDescription::insert($validatedDescriptions);
        }

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
    public function edit($slug)
    {
        $this->authorize('owner-admin');

        $medicine = Medicines::where('slug', $slug)->firstOrFail();

        return view('ubah-katalog', [
            'title' => 'Ubah Katalog',
            'medicine' => $medicine,
            'categories' => Category::all(),
            'medicine_description' => MedicineDescription::where('medicine_id', $medicine->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $this->authorize('owner-admin');

        $medicine = Medicines::where('slug', $slug)->firstOrFail();
        $messages = [
            'name.required' => 'Nama obat harus diisi.',
            'category_id.required' => 'Kategori obat harus dipilih.',
            'category_id.exists' => 'Kategori obat tidak valid.',
            'price.required' => 'Harga obat harus diisi.',
            'price.numeric' => 'Harga obat harus berupa angka.',
            'price.min' => 'Harga obat tidak boleh kurang dari 0.',
            'stock.required' => 'Stok obat harus diisi.',
            'stock.integer' => 'Stok obat harus berupa angka bulat.',
            'stock.min' => 'Stok obat tidak boleh kurang dari 0.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Gambar harus berformat jpg, jpeg, atau png.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.'
        ];
        $validatedData = $request->validate(
            [
                'name' => 'required|max:255',
                'category_id' => 'required|exists:categories,id',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ],
            $messages
        );
        $descriptions = $request->input('description');
        if ($descriptions) {
            $validatedData['description'] = $descriptions;
        } else {
            $validatedData['description'] = null;
        }
        unset($validatedData['description']);
        $validatedData['slug'] = Str::slug($validatedData['name']);
        if ($request->file('image')) {
            if ($medicine->image) {
                $imagePath = public_path('storage/' . $medicine->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $validatedData['image'] = $request->file('image')->store('medicine-images');
        } else {
            $validatedData['image'] = $medicine->image;
        }
        $medicine->update($validatedData);
        MedicineDescription::where('medicine_id', $medicine->id)->delete();
        if ($descriptions) {
            foreach ($descriptions as $description) {
                if (!empty($description)) {
                    $validatedDescriptions[] = [
                        'medicine_id' => $medicine->id,
                        'description' => $description
                    ];
                }
            }
            MedicineDescription::insert($validatedDescriptions);
        }
        return redirect("/katalog/{$validatedData['slug']}")->with('success', "Produk {$validatedData['name']} berhasil diubah.");
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
