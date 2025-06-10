<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Medicines;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kategori', [
            'title' => 'Kategori',
            'categories' => Category::all(),
            'medicines' => Medicines::all()
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
            'name.required' => 'Nama kategori harus diisi.',
            'name.string' => 'Nama kategori harus berupa teks.',
            'name.max' => 'Nama kategori tidak boleh lebih dari 255 karakter.',
        ];
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $validatedData['slug'] = Str::slug($validatedData['name']);
        Category::create($validatedData);

        return redirect('/katalog/kategori')->with('success', "Kategori {$validatedData['name']} berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->authorize('owner-admin');
        $messages = [
            'name.required' => 'Nama kategori harus diisi.',
            'name.string' => 'Nama kategori harus berupa teks.',
            'name.max' => 'Nama kategori tidak boleh lebih dari 255 karakter.',
        ];
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $validatedData['slug'] = Str::slug($validatedData['name']);
        $category->update($validatedData);

        return redirect('/katalog/kategori')->with('success', "Kategori {$category->name} berhasil diperbarui.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->authorize('owner-admin');
        if ($category->medicines()->count() > 0) {
            return redirect('/katalog/kategori')->with('error', "Kategori {$category->name} tidak dapat dihapus karena masih memiliki produk.");
        }
        $category->delete();
        return redirect('/katalog/kategori')->with('success', "Kategori {$category->name} berhasil dihapus.");
    }
}
