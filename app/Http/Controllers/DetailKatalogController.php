<?php

namespace App\Http\Controllers;

use App\Models\Medicines;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailKatalogController extends Controller
{
    public function destroy($slug)
    {
        $medicine = Medicines::where('slug', $slug)->firstOrFail();
        $medicineName = $medicine->name;
        $medicine->delete();

        return redirect('/katalog')->with('success', "Produk {$medicineName} berhasil dihapus dari katalog.");
    }
}
