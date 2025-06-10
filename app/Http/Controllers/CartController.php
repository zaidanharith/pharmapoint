<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Medicines;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    return view('dashboard.keranjang', [
        'title' => 'Keranjang',
        'carts' => Cart::with('medicine')->where('user_id', Auth::id())->get()
    ]);
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
    public function store(Request $request, $slug)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
        if (!Medicines::where('slug', $slug)->exists()) {
            return redirect('/katalog')->with('error', 'Produk tidak ditemukan.');
        }
        $medicine = Medicines::where('slug', $slug)->first();
        if ($medicine->stock < $validated['quantity']) {
            return redirect('/katalog')->with('error', 'Stok tidak mencukupi untuk produk ini.');
        }
        if (!Auth::check()) {
            return redirect('/masuk')->with('error', 'Anda harus masuk untuk menambahkan produk ke keranjang.');
        }
        $validated['quantity'] = (int) $validated['quantity'];
        if ($validated['quantity'] <= 0) {
            return redirect('/katalog')->with('error', 'Jumlah produk harus lebih dari nol.');
        }

        $medicine = Medicines::where('slug', $slug)->firstOrFail();
        $validated['medicine_id'] = $medicine->id;

        $totalPrice = $medicine->price * $validated['quantity'];

        $cart = Cart::create([
            'user_id' => Auth::id(),
            'medicine_id' => $validated['medicine_id'],
            'medicine_quantity' => $validated['quantity'],
            'subtotal' => $totalPrice
        ]);

        return redirect('/katalog')->with('success', "Produk {$cart->medicine->name} berhasil ditambahkan ke keranjang sebanyak {$cart->medicine_quantity}.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }

    /**
     * Display the cart view.
     */
    public function cartView()
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        if ($carts->isEmpty()) {
            return redirect('/katalog')->with('error', 'Keranjang Anda kosong.');
        }

        $totalPrice = $carts->sum('subtotal');

        return view('dashboard.keranjang', [
            'title' => 'Keranjang',
            'carts' => $carts
        ]);
    }

    public function cartDelete($id)
    {
        $cart = Cart::where('id', $id)->where('user_id', Auth::id())->first();
        
        if (!$cart) {
            return redirect('/dashboard/keranjang')->with('error', 'Item tidak ditemukan dalam keranjang.');
        }

        $cart->delete();
        
        return redirect('/dashboard/keranjang')->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    public function buy(Request $request)
    {
        $validatedData = $request->validate([
            'payment_method' => ['required', 'string']
        ]);

        $cartItems = Cart::with('medicine')
                        ->where('user_id', Auth::id())
                        ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang kosong.');
        }

        $totalPrice = $cartItems->sum('subtotal');

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'grand_total' => $totalPrice,
            'payment_method' => $validatedData['payment_method']
        ]);

        foreach ($cartItems as $item) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'medicine_id' => $item->medicine_id,
                'medicine_quantity' => $item->medicine_quantity,
                'subtotal' => $item->subtotal
            ]);

            $medicine = $item->medicine;
            $medicine->stock -= $item->medicine_quantity;
            $medicine->save();
        }

        Cart::where('user_id', Auth::id())->delete();

        return redirect('/dashboard')->with('success', 'Pembelian berhasil dilakukan.');

    }

}
