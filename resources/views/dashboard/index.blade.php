<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- KATALOG START --}}
    <section id="catalogue" class="py-30 text-black">
        <div class="container mx-auto px-4">
            <div class="flex justify-between mb-5">
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
                @endphp
                <h1 class="font-extrabold text-4xl text-blue-dark">{{ $greeting }}, {{ auth()->user()->name }}</h1>
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
                <h1>Halo Owner</h1>
            @else
                <h1>Halo User</h1>
            @endif

        </div>
    </section>
    
</x-layout>