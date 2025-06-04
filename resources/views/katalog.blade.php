<x-layout>
     <x-slot:title>{{ $title }}</x-slot:title>

     {{-- KATALOG START --}}
     <section id="catalogue" class="py-30 text-black">
          <div class="container mx-auto px-4">
            <h1 class="font-extrabold text-4xl text-blue-dark mb-10 text-center md:text-left">
              Katalog
            </h1>
            <div class="flex flex-col rounded-md shadow-md overflow-hidden px-4 md:px-10 py-7 md:py-10">
              <div class="w-full flex justify-between">
                <form class="flex">
                  <label for="search" class="flex items-center"
                    ><span class="material-symbols-outlined mr-1">
                      search
                    </span></label
                  >
                  <input
                    type="text"
                    name="search"
                    id="search"
                    placeholder="Cari..."
                    autofocus autocomplete="off"
                    class="outline-none hover:border-orange focus:border-b-2 focus:border-orange"
                  />
                </form>
                <div class="flex items-center">
                  <div class="flex cursor-pointer hover:font-medium hover:text-blue-navy mr-4">
                    <span class="material-symbols-outlined"> filter_alt </span>
                    <p>Kategori</p>
                  </div>
                  <div class="flex cursor-pointer hover:font-medium hover:text-blue-navy">
                    <span class="material-symbols-outlined"> sort </span>
                    <p>Urutkan</p>
                  </div>
                  @auth
                  @if (auth()->user()->is_admin || auth()->user()->is_owner)
                  <a href="/katalog/tambah" class="flex items-center px-4 py-2 rounded-lg bg-blue-dark ml-5 hover:bg-blue-dark/90 text-white cursor-pointer transition-all duration-200">
                    <span class="material-symbols-outlined"> add </span>
                    <p class="ml-1">Tambah Produk</p>
                  </a>                  
                  @endif
                  @endauth
              </div>
              </div>
              <div class="w-full grid gap-5 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 py-10">
               @forelse ($medicines as $medicine)
               <a href="/katalog/{{$medicine['slug']}}" class="flex flex-col max-h-75 overflow-hidden rounded-lg shadow-md w-full sm:aspect-square hover:bg-peach hover:border-1 group border-orange hover:shadow-lg cursor-pointer transition-all duration-200">
                    <img
                        src="img/catalogue/{{$medicine->image}}.jpg"
                        alt="{{$medicine->name}}"
                        class="w-full h-5/9 object-cover bg-center transition-all duration-300 ease-in-out transform origin-bottom group-hover:scale-110"
                    />
                    <div class="flex flex-col h-4/9 justify-center px-5">
                      <div class="flex justify-between items-center">
                        <h2 class="font-bold text-md">{{Str::limit($medicine->name,10)}}</h2>
                        <p class="font-medium text-sm">{{$medicine->category->name}}</p>
                      </div>
                      <h3 class="font-extrabold text-xl text-blue-dark mt-1 mb-3">Rp. {{$medicine->price}}</h3>
                      <h4 class="flex items-center">
                          <p class="font-bold text-sm text-green">Stok: <span>{{$medicine->stock}}</span></p>
                      </h4>
                    </div>
                </a>  
                @empty
                <div class="flex flex-col">
                  <p class="font-bold text-lg mb-3">Produk tidak ditemukan!</p> 
                  <a href="/katalog" class="flex items-center hover:font-bold group transition-all duration-200"><span class="material-symbols-outlined mr-1 group-hover:-translate-x-3 transition-all duration-200 ease-in-out">arrow_back</span>Lihat semua katalog</a>
              </div>            
               @endforelse
              </div>
              {{ $medicines->links() }}
            </div>
          </div>
        </section>
     {{-- KATALOG --}}
     
</x-layout>