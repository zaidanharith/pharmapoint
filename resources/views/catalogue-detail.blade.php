<x-layout>
     <x-slot:title>{{ $medicine['name'] }}</x-slot:title>

     {{-- KATALOG DETAIL START --}}
     <section id="catalogue-detail" class="py-30 text-black">
          <div class="container mx-auto px-4">
               <h1 class="font-extrabold text-4xl text-blue-dark mb-10 text-center md:text-left">Detail Produk</h1>
               <div class="flex flex-col rounded-md shadow-md overflow-hidden px-4 md:px-10 py-7 md:py-10">
                    <a href="/katalog" class="flex items-center hover:font-bold group transition-all duration-200"><span class="material-symbols-outlined mr-1 group-hover:-translate-x-3 transition-all duration-200 ease-in-out">arrow_back</span>Kembali ke Katalog</a>
                    <div class="flex gap-20 mt-10">
                         <div class="flex flex-col aspect-square overflow-hidden rounded-lg">
                              <img src="img/catalogue/2.jpg" alt="Gambar" class="object-cover">
                         </div>
                         <div class="flex flex-col">
                              <h2 class="font-extrabold text-2xl text-bg-dark">{{$medicine['name']}}</h2>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     {{-- KATALOG DETAIL END --}}
</x-layout>