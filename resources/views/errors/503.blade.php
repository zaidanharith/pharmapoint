<x-layout>
     <x-slot:title>{{ "Layanan Tidak Tersedia" }}</x-slot:title>

     <section id="error-503" class="pt-40 pb-30 text-black">
          <div class="container mx-auto text-center">
               <h1 class="text-9xl font-extrabold mb-8 text-orange drop-shadow-lg animate-bounce">503</h1>
               <h2 class="text-2xl font-extrabold mb-4">Layanan Tidak Tersedia</h2>
               <p class="mb-8">Maaf, layanan sedang tidak tersedia. Silakan coba beberapa saat lagi.</p>
               <a href="{{ url('/') }}" class="inline-block px-6 py-3 bg-orange rounded-lg hover:bg-orange/90 transition duration-200 cursor-pointer font-bold">Kembali ke Beranda</a>
          </div>
     </section>
</x-layout>