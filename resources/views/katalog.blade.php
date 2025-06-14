<x-layout>
     <x-slot:title>{{ $title }}</x-slot:title>

     {{-- KATALOG START --}}
     <section id="catalogue" class="py-30 text-black">
          <div class="container mx-auto px-4">
            <h1 class="font-extrabold text-4xl text-blue-dark mb-10 text-center md:text-left">
              Katalog
            </h1>
            @if (session()->has('success'))
            <div role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 10000)">
              <div class="flex justify-between items-center rounded-lg border-1 border-green-600 bg-green-50 text-green-600 mb-5 px-10 py-5">
                <h3 class="font-medium text-md">{{session('success')}}</h3>
                <button type="button" class="" @click="show = false">
                  <span class="material-symbols-outlined cursor-pointer">close</span>
                </button>
              </div>
            </div>
            @endif
            <div class="flex flex-col rounded-md shadow-md overflow-hidden px-4 py-7 md:p-10">
              <div class="w-full flex justify-between">
                <div class="flex items-center">
                  <span class="material-symbols-outlined mr-1">search</span>
                  <input
                  type="text"
                  name="search"
                  id="search"
                  placeholder="Cari..."
                  autofocus autocomplete="off"
                  class="w-32 md:w-48 lg:w-64 outline-none hover:border-orange focus:border-b-2 focus:border-orange"
                  />
                </div>
                <div class="flex flex-row items-center gap-2 mt-4 md:mt-0">
                  <div class="flex cursor-pointer hover:font-medium hover:text-blue-navy mr-2">
                  <span class="material-symbols-outlined">filter_alt</span>
                  <p class="hidden lg:block ml-1">Kategori</p>
                  </div>
                  
                  <div class="flex cursor-pointer hover:font-medium hover:text-blue-navy">
                  <span class="material-symbols-outlined">sort</span>
                  <p class="hidden lg:block ml-1">Urutkan</p>
                  </div>

                  @can('owner-admin')
                  <div class="flex flex-row gap-2 ml-4">
                    <a href="/katalog/tambah" class="flex items-center px-2 py-1 rounded-md bg-blue-dark hover:bg-blue-dark/90 text-white text-sm cursor-pointer transition-all duration-200">
                      <span class="material-symbols-outlined">add</span>
                      <p class="hidden md:block ml-1">Tambah Produk</p>
                    </a>                  
                    <a href="/katalog/kategori" class="flex items-center px-2 py-1 rounded-md bg-blue-dark hover:bg-blue-dark/90 text-white text-sm cursor-pointer transition-all duration-200">
                      <span class="material-symbols-outlined">category</span>
                      <p class="hidden md:block ml-1">Edit Kategori</p>
                    </a>
                  </div>                  
                  @endcan
                </div>
              </div>
              <div class="w-full grid gap-5 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 py-10">
               @forelse ($medicines as $medicine)
               <a href="/katalog/{{$medicine['slug']}}" class="flex flex-col max-h-75 overflow-hidden rounded-lg shadow-md w-full sm:aspect-square hover:bg-peach hover:border-1 group border-orange hover:shadow-lg cursor-pointer transition-all duration-200">
                    <img
                        src="{{ asset('storage/' . $medicine->image) }}"
                        alt="{{$medicine->name}}"
                        class="w-full h-5/9 object-cover bg-center transition-all duration-300 ease-in-out transform origin-bottom group-hover:scale-110"
                    />
                    <div class="flex flex-col h-4/9 justify-center px-5">
                      <div class="flex justify-between items-center">
                        <h2 class="font-bold text-md">{{Str::limit($medicine->name,10)}}</h2>
                        <p class="font-medium text-sm">{{$medicine->category->name}}</p>
                      </div>
                      <h3 class="font-extrabold text-xl text-blue-dark mt-1 mb-3">Rp{{number_format($medicine->price, 0, ',', '.')}}</h3>
                      <h4 class="flex items-center">
                          <p class="font-bold text-sm text-green">Stok: <span>{{$medicine->stock}}</span></p>
                      </h4>
                    </div>
                </a>  
                @empty
                <div class="flex flex-col">
                  <p class="font-bold text-lg">Produk tidak ditemukan!</p>
              </div>            
               @endforelse
              </div>
              {{ $medicines->links() }}
            </div>
          </div>
        </section>
     {{-- KATALOG --}}
     
</x-layout>