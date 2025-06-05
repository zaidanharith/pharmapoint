<x-layout>
     <x-slot:title>{{ $title }}</x-slot:title>

     <section id="catalogue" class="py-30 text-black">
          <div class="container mx-auto px-4">
            <h1 class="font-extrabold text-4xl text-blue-dark mb-10 text-center md:text-left">
              Ubah Katalog
            </h1>
            <div class="flex flex-col rounded-md shadow-md overflow-hidden px-4 md:px-10 py-7 md:py-10">
               <a href="/katalog/{{ $medicine->slug }}" class="flex items-center hover:font-bold group transition-all duration-200"><span class="material-symbols-outlined mr-1 group-hover:-translate-x-3 transition-all duration-200 ease-in-out">arrow_back</span>Kembali ke Detail</a>
               <h2 class="font-bold text-lg mt-5">Silakan Masukkan Perubahan!</h2>
               <form action="/katalog/{{ $medicine->slug }}/ubah" method="POST" enctype="multipart/form-data">
                   @csrf
                   @method('PUT')

                   <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 cursor-pointer font-medium">Simpan Perubahan</button>
               </form>
            </div>
          </div>
        </section>
     
</x-layout>