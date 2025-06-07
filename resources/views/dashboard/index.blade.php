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

            @if (auth()->user()->is_admin)
                <h1>Halo Admin</h1>
            @elseif (auth()->user()->is_owner)
                <div class="flex flex-col mt-10 border-y-1 border-gray-300 overflow-hidden px-4 md:px-10 md:py-7">
                    <h2 class="font-bold text-xl mb-2">Permintaan Upgrade Admin</h2>
                    <div class="flex flex-col mt-5 gap-y-3">
                        @foreach ($users as $user)
                            @if ($user->request_admin)
                            <div class="flex justify-between items-center p-4 rounded-lg mb-3 shadow-sm">
                                <div class="flex flex-col">
                                    <h2 class="font-bold text-lg">{{ $user->name }}</h2>
                                    <p class="text-gray-500 text-sm">{{ $user->email }}</p>
                                </div class="flex justify-between items-center">
                                {{-- jika tombol diklik, ubah is_admin jadi true --}}
                                <form action="/dashboard" method="POST" class="flex items-center">
                                    @csrf
                                    <button type="submit" class="flex items-center rounded-md bg-green-500 font-medium px-3 py-1.5 cursor-pointer hover:bg-green-400 mr-3"><span class="material-symbols-outlined mr-1">check</span>Terima</button>
                                    <button type="submit" class="flex items-center rounded-md bg-red-500 font-medium px-3 py-1.5 cursor-pointer hover:bg-red-400 text-white"><span class="material-symbols-outlined mr-1">close</span>Tolak</button>
                                </form>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @else
                <div class="flex flex-col rounded-md shadow-md overflow-hidden px-4 md:px-10 py-7 md:py-10">
                    <h2 class="font-bold text-lg">Informasi Akun</h2>
                    <p class="text-gray-500 text-sm">Email: {{ auth()->user()->email }}</p>
                    <p class="text-gray-500 text-sm">Dibuat pada: {{ auth()->user()->created_at->format('d M Y') }}</p>
                </div>
            @endif

        </div>
    </section>
    
</x-layout>