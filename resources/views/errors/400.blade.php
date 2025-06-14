<x-layout>
     <x-slot:title>{{ "Bad Request" }}</x-slot:title>

     <section id="catalogue-detail" class="pt-40 pb-30 text-black">
          <div class="container mx-auto text-center">
               <h1 class="text-9xl font-extrabold mb-8 text-orange drop-shadow-lg animate-bounce">400</h1>
               <h2 class="text-2xl font-extrabold mb-4">Permintaan Tidak Valid</h2>
               <p class="mb-8">Maaf, permintaan Anda tidak valid atau terjadi kesalahan.</p>
               <a href="{{ url('/') }}" class="inline-block px-6 py-3 bg-orange rounded-lg hover:bg-orange/90 transition duration-200 cursor-pointer font-bold">Kembali ke Beranda</a>
          </div>
     </section>
</x-layout>