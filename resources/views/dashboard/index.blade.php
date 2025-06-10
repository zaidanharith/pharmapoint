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

            <div class="flex justify-between items-center rounded-md shadow-md overflow-hidden px-4 md:px-5 py-3 mb-5">
                <p class="font-bold text-md">Halo! Bagaimana kabarmu hari ini?</p>
                <div class="flex flex-col items-end text-right">
                    <div class="flex flex-col mb-3">
                        <a href="/dashboard/{{ auth()->user()->username }}" class="py-1.5 px-3 rounded-md font-medium text-white bg-blue-dark text-sm cursor-pointer hover:bg-blue-dark/90 flex items-center"><span class="material-symbols-outlined mr-2">
                            edit
                            </span>Ubah Profil</a>
                    </div>
                    <div class="flex flex-col items-end text-right">
                    @if(!auth()->user()->is_admin && !auth()->user()->request_admin && !auth()->user()->is_owner)
                        <form action="{{ route('dashboard.requestAdmin', auth()->user()) }}" method="POST" class="flex items-center">
                            @csrf
                            <button type="submit" name="action" value="request" class="bg-green-600 text-white font-medium px-3 py-1.5 rounded-md hover:bg-green-700 text-sm cursor-pointer">
                                Kirim Permintaan Menjadi Admin
                            </button>
                        </form>
                    @elseif(auth()->user()->request_admin)
                        <p class="font-medium text-sm text-green-600">Permintaan Anda untuk menjadi admin sedang diproses</p>
                    @endif
                    </div>
                </div>
            </div>

            <div class="flex flex-col mt-10 border-t-1 border-gray-300 overflow-hidden md:pt-7">
                <h2 class="font-bold text-lg text-blue-dark flex items-center"><span class="material-symbols-outlined mr-2">
                    receipt_long
                    </span>Histori Transaksi</h2>
                <div class="flex flex-col mt-5 gap-y-3">
                    @if ($transactions->count())
                        @foreach ($transactions as $transaction)
                            <div class="flex justify-between items-center rounded-lg border-1 border-gray-300 px-4 py-2 mb-1">
                                <div class="flex flex-col">
                                    <p class="font-bold text-lg text-green">Rp{{ number_format($transaction->grand_total, 0, ',', '.') }}</p>
                                    <p class="text-sm font-medium text-gray-500">{{ $transaction->payment_method }}</p>
                                </div>
                                <p class="font-medium">{{ $transaction->created_at->format('d M Y, H:i:s') }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-500">Belum ada transaksi.</p>
                    @endif
                </div>
            </div>

            @if (auth()->user()->is_admin)
            @elseif (auth()->user()->is_owner)
                <div class="flex flex-col mt-10 border-t-1 border-gray-300 overflow-hidden md:pt-7">
                    <h2 class="font-bold text-lg text-blue-dark flex items-center"><span class="material-symbols-outlined mr-2">
                        add_circle
                        </span>Permintaan Upgrade Admin</h2>
                    <div class="flex flex-col mt-5 gap-y-3">
                        @if ($users->contains('request_admin', true))
                            @foreach ($users as $user)
                                @if ($user->request_admin)
                                <div class="flex justify-between items-center px-4 py-2 rounded-lg mb-1 border-1 border-orange">
                                    <div class="flex flex-col">
                                        <h2 class="font-bold text-lg">{{ $user->name }}</h2>
                                        <p class="text-gray-500 text-xs">{{ $user->updated_at->format('d M Y, H:i') }}</p>
                                    </div class="flex justify-between items-center">
                                    <form action="{{ route('dashboard.approve', $user->id) }}" method="POST" class="flex items-center">
                                        @csrf
                                        <button type="submit" name="action" value="approve" 
                                            class="flex items-center rounded-md bg-green-500 font-medium px-3 py-1.5 cursor-pointer hover:bg-green-400 mr-3">
                                            <span class="material-symbols-outlined mr-1">check</span>Terima
                                        </button>
                                        <button type="submit" name="action" value="reject" 
                                            class="flex items-center rounded-md bg-red-500 font-medium px-3 py-1.5 cursor-pointer hover:bg-red-400 text-white">
                                            <span class="material-symbols-outlined mr-1">close</span>Tolak
                                        </button>
                                    </form>
                                </div>
                                @endif
                            @endforeach
                            
                        @else
                            <p class="text-gray-500">Tidak ada permintaan upgrade admin saat ini.</p>
                        @endif
                    </div>
                </div>
            @else
                <div>
                    
                </div>
            @endif
            
            @can('owner-admin')
            <div class="flex flex-col mt-10 border-t-1 border-gray-300 overflow-hidden md:pt-7">
                <h2 class="font-bold text-lg text-blue-dark flex items-center"><span class="material-symbols-outlined mr-2">
                    info
                    </span>Informasi Katalog</h2>
                <div class="mt-5">
                    @if ($medicines->where('stock', '<=', 10)->where('stock', '>', 0)->count() > 0)
                        <h3 class="font-bold mb-3 text-red">Stok akan segera habis!</h3>
                    @endif
                    @foreach ($medicines->sortBy('stock') as $medicine)
                        @if ($medicine->stock <= 10 && $medicine->stock > 0)
                            <a href="/katalog/{{ $medicine->slug }}" class="flex justify-between items-center px-3 py-1.5 rounded-lg mb-3 border-1 border-orange cursor-pointer hover:bg-orange/10 transition-all duration-200">
                                <div class="flex items-center justify-between w-full">
                                    <div class="flex items-center">
                                        <h2 class="font-bold text-red">{{ $medicine->name }}</h2>
                                        <p class="text-gray-500 text-xs ml-3">{{ $medicine->category->name }}</p>
                                    </div>
                                    <p class="text-red font-bold">Stok Tersedia: {{ $medicine->stock }}</p>   
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="mt-5">
                    <h3 class="font-bold mb-3">Barang yang masuk dalam 24 jam terakhir</h3>
                    @foreach ($medicines as $medicine)
                        @if ($medicine->created_at >= now()->subDay())
                            <a href="/katalog/{{ $medicine->slug }}" class="flex justify-between items-center px-3 py-1.5 rounded-lg mb-3 border-1 border-orange cursor-pointer hover:bg-orange/10 transition-all duration-200">
                                <div class="flex items-center justify-between w-full">
                                    <div class="flex items-center">
                                        <h2 class="font-bold">{{ $medicine->name }}</h2>
                                        <p class="text-gray-500 text-xs ml-3">{{ $medicine->category->name }}</p>
                                    </div>
                                    <p class="text-gray-500 text-sm font-medium">{{ $medicine->created_at->diffForHumans() }}</p>   
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
            @endcan

        </div>
    </section>
    
</x-layout>