<x-layout>
     <x-slot:title>{{ "Halaman Tidak Ditemukan" }}</x-slot:title>

     <section id="catalogue-detail" class="pt-40 pb-30 text-black">
            <div class="container mx-auto text-center">
                 <h1 class="text-9xl font-extrabold mb-8 text-orange drop-shadow-lg animate-bounce">404</h1>
                  <h2 class="text-2xl font-extrabold mb-4">Halaman Tidak Ditemukan</h2>
                  <p class="mb-8">Maaf, halaman yang Anda cari tidak ditemukan.</p>
                  <a href="{{ url('/') }}" class="inline-block px-6 py-3 bg-orange rounded-lg hover:bg-orange/90 transition duration-200 cursor-pointer font-bold">Kembali ke Beranda</a>
            </div>
     </section>
</x-layout>