<x-layout>
     <x-slot:title>{{ $title }}</x-slot:title>
 
     {{-- KATALOG START --}}
     <section id="catalogue" class="py-30 text-black">
         <div class="container mx-auto px-4">
             <div class="flex justify-between mb-5 items-center">
                 @php
                     date_default_timezone_set('Asia/Jakarta');
                     $hour = date('H');
                     if ($hour < 11 && $hour >= 0) {
                         $greeting = 'Selamat Pagi';
                     } elseif ($hour < 15 && $hour >= 11) {
                         $greeting = 'Selamat Siang';
                     } elseif ($hour < 18 && $hour >= 15) {
                         $greeting = 'Selamat Sore';
                     } else { 
                         $greeting = 'Selamat Malam';
                     }
 
                     $role = auth()->user()->is_admin ? 'Admin' : (auth()->user()->is_owner ? 'Owner' : 'User'); 
                 @endphp
                 <div class="flex items-center">
                     <h1 class="font-extrabold text-4xl text-blue-dark">{{ $greeting }}, {{ auth()->user()->name }}</h1>
                     <p class="text-sm ml-3 rounded-md px-1 text-white {{ $role === 'Admin' ? 'bg-green-600' : ($role === 'Owner' ? 'bg-amber-600' : 'bg-gray-600') }}">{{ $role }}</p>
                 </div>
                 <div class="text-black font-bold flex items-center">
                     <span class="material-symbols-outlined">
                         calendar_month
                         </span>
                     <span class="ml-2" id="current-time"></span>
                 </div>
             </div>
 
             <div class="flex flex-col rounded-md shadow-md overflow-hidden px-4 py-7 md:p-10">
                <a href="/dashboard" class="flex items-center hover:font-bold group transition-all duration-200 w-fit"><span class="material-symbols-outlined mr-1 group-hover:-translate-x-3 transition-all duration-200 ease-in-out">arrow_back</span>Kembali ke Dashboard</a>
                
                <div class="flex justify-between mt-5">
                    <div class="flex flex-col w-1/2">
                        <h2 class="font-bold text-lg text-blue-dark mb-5">Isi Keranjang</h2>
                        <div class="flex flex-col rounded-lg border-1 border-gray-300 overflow-hidden">
                            @foreach ($carts as $cart)
                                <a href="/katalog/{{$cart->medicine->slug}}" class="p-4 flex items-center justify-between cursor-pointer hover:bg-orange/5 transition-all duration-200">
                                    <div class="flex items-center">
                                        <h4 class="font-bold">{{$cart->medicine->name}}</h4>
                                        <p class="text-sm font-medium text-gray-500 ml-5">Rp{{ number_format($cart->medicine->price, 0, ',', '.') }} <span class="ml-1">x {{$cart->medicine_quantity}}</span></p>
                                    </div>
                                    <div class="flex items-center">
                                        <p class="text-lg font-bold text-blue-dark mr-3">Rp{{ number_format($cart->subtotal, 0, ',', '.') }}</p>
                                        <form action="/dashboard/keranjang/{{$cart->id}}/hapus" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-md font-medium text-sm flex items-center text-red cursor-pointer border-1 border-red hover:bg-red hover:text-white transition-all duration-200">
                                                <span class="material-symbols-outlined"> close </span>
                                           </button>
                                        </form>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="flex justify-between items-center mt-5 rounded-lg border-2 border-orange p-4">
                            <h2 class="font-bold text-xl text-blue-dark">Harga Total</h2>
                            <p class="font-extrabold text-2xl text-blue-dark">Rp{{ number_format($carts->sum('subtotal'), 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col rounded-lg border-1 border-orange p-5 items-center h-fit w-1/3">
                        <h2 class="font-bold text-lg text-blue-dark mb-3">Transaksi Pembayaran</h2>
                        <h2 class="font-medium">Pilih Metode Pembayaran</h2>
                        <form action="/dashboard/keranjang/beli" method="POST" class="flex flex-col w-full">
                            @csrf
                            @method('post')
                            <div class="flex flex-col gap-3 mt-3">
                                <label class="flex items-center p-3 border rounded-md cursor-pointer hover:bg-orange/5 [&:has(input:checked)]:bg-orange/10 [&:has(input:checked)]:border-orange transition-all duration-200 [&:has(input:checked)]:font-bold">
                                    <input type="radio" name="payment_method" value="Virtual Account" class="mr-3 appearance-none" required>
                                    <span>Virtual Account</span>
                                </label>
                                <label class="flex items-center p-3 border rounded-md cursor-pointer hover:bg-orange/5 [&:has(input:checked)]:bg-orange/10 [&:has(input:checked)]:border-orange transition-all duration-200 [&:has(input:checked)]:font-bold">
                                    <input type="radio" name="payment_method" value="Transfer Bank" class="mr-3 appearance-none" required>
                                    <span>Transfer Bank</span>
                                </label>
                                <label class="flex items-center p-3 border rounded-md cursor-pointer hover:bg-orange/5 [&:has(input:checked)]:bg-orange/10 [&:has(input:checked)]:border-orange transition-all duration-200 [&:has(input:checked)]:font-bold">
                                    <input type="radio" name="payment_method" value="E-Wallet" class="mr-3 appearance-none" required>
                                    <span>E-Wallet</span>
                                </label>
                                <label class="flex items-center p-3 border rounded-md cursor-pointer hover:bg-orange/5 [&:has(input:checked)]:bg-orange/10 [&:has(input:checked)]:border-orange transition-all duration-200 [&:has(input:checked)]:font-bold">
                                    <input type="radio" name="payment_method" value="QRIS" class="mr-3 appearance-none" required>
                                    <span>QRIS</span>
                                </label>
                            </div>
                            <button type="submit" class="bg-orange text-blue-dark font-bold py-2 px-4 rounded-md mt-5 hover:bg-orange/90 transition-all duration-200 flex justify-center items-center cursor-pointer"> <span class="material-symbols-outlined mr-2">
                                payments
                                </span>
                                Lanjutkan Pembayaran
                            </button>
                        </form>
                    </div>
                </div>
             </div>

         </div>
     </section>

     <script>
        function updateClock() {
        const now = new Date();
        const options = {
             day: "numeric",
             month: "long",
             year: "numeric",
             hour: "2-digit",
             minute: "2-digit",
             second: "2-digit",
             hour12: false,
        };
        document.getElementById("current-time").textContent = now.toLocaleString(
             "id-ID",
             options
        );
        }

        updateClock();
        setInterval(updateClock, 1000);
   </script>
     
 </x-layout>