<x-layout>
     <x-slot:title>{{ $title }}</x-slot:title>

     {{-- KATALOG DETAIL START --}}
     <section id="catalogue-detail" class="py-30 text-black">
          <div class="container mx-auto px-4">
               <h1 class="font-extrabold text-4xl text-blue-dark mb-10 text-center md:text-left">Kategori</h1>
               @if (session()->has('success'))
               <div role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 10000)">
                 <div class="flex justify-between items-center rounded-lg border-1 border-green-600 bg-green-50 text-green-600 mb-5 px-4 md:px-10 py-5">
                   <h3 class="font-medium text-sm md:text-md">{{session('success')}}</h3>
                   <button type="button" class="" @click="show = false">
                     <span class="material-symbols-outlined cursor-pointer">close</span>
                   </button>
                 </div>
               </div>
               @endif
               <div class="flex flex-col rounded-md shadow-md overflow-hidden px-4 md:px-10 py-7 md:py-10">
                    <a href="/katalog" class="flex items-center hover:font-bold group transition-all duration-200"><span class="material-symbols-outlined mr-1 group-hover:-translate-x-3 transition-all duration-200 ease-in-out">arrow_back</span>Kembali ke Katalog</a>
                    <div class="flex flex-col md:flex-row justify-between mt-7">
                         <div class="flex flex-col w-full md:w-3/4">
                              <h2 class="font-bold text-lg text-blue-dark">Daftar Kategori</h2>
                              <ul class="flex flex-col mt-4">
                                   @if ($categories->isEmpty())
                                        <li class="font-medium">Tidak ada kategori yang tersedia.</li>
                                   @else
                                   @foreach ($categories as $category)
                                        <li class="py-1.5 px-3 border-1 border-orange rounded-lg mb-3">
                                             <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                                  <div class="flex flex-col md:flex-row md:items-center mb-2 md:mb-0">
                                                       <h3 class="font-bold">{{ $category->name }}</h3>
                                                       <p class="text-xs text-gray-500 mt-1 md:mt-0 md:ml-5 font-medium">Jumlah Produk: {{ $medicines->where('category_id', $category->id)->count() }}</p>
                                                  </div>
                                                  <div class="flex items-center">
                                                    <div x-data="{ editing: false }">
                                                         <form x-show="editing" 
                                                                   x-cloak
                                                                   @click.outside="editing = false"
                                                                   action="/katalog/kategori/{{ $category->id }}" 
                                                                   method="POST">
                                                              @csrf
                                                              @method('PUT')
                                                              <input type="text" 
                                                                         name="name" 
                                                                         value="{{ $category->name }}"
                                                                         class="outline-none py-1 px-2 rounded border-1 border-orange focus:border-orange focus:bg-orange/5 w-full md:w-auto">
                                                         </form>
                                                         <button @click="editing = true" 
                                                                   x-show="!editing"
                                                                   x-cloak
                                                                   class="p-1 rounded-md font-medium text-sm flex items-center text-blue-dark cursor-pointer border-1 border-blue-dark hover:bg-blue-dark hover:text-white transition-all duration-200">
                                                              <span class="material-symbols-outlined">edit</span>
                                                         </button>
                                                    </div>
                                                    <form action="/katalog/kategori/{{ $category->id }}" method="POST" class="ml-2">
                                                         @csrf
                                                         @method('DELETE')
                                                         <button type="submit" class="p-1 rounded-md font-medium text-sm flex items-center text-red cursor-pointer border-1 border-red hover:bg-red hover:text-white transition-all duration-200">
                                                              <span class="material-symbols-outlined"> close </span>
                                                         </button>
                                                    </form>
                                               </div>
                                             </div>
                                        </li>
                                   @endforeach
                                   @endif
                              </ul>
                         </div>
                         <div class="flex flex-col border-1 border-orange rounded-lg py-4 px-6 h-fit mt-4 md:mt-0">
                              <h2 class="font-bold text-lg text-blue-dark">Tambah Kategori</h2>
                              <form action="/katalog/kategori" method="POST" class="flex items-center mt-3">
                                   @csrf
                                   @method('POST')
                                   <input type="text" name="name" placeholder="Nama Kategori" class="outline-none mt-1 py-1.5 px-3 rounded-md border-1 text-sm focus:border-orange focus:bg-orange/5 w-full md:w-auto">
                                   <button type="submit" class="text-blue-dark flex items-center ml-2 cursor-pointer">
                                        <span class="material-symbols-outlined"> add_circle </span>
                                   </button>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </section>

     <script>
          const navToggle = document.querySelector("#nav-toggle");
          const navMenu = document.querySelector("#nav-menu");
          navToggle.addEventListener("click", function () {
          navToggle.classList.toggle("nav-toggle-active");
          navMenu.classList.toggle("hidden");
          });

          document.addEventListener('alpine:init', () => {
               Alpine.data('category', () => ({
                   editing: false,
               }));
          });
     </script>
</x-layout>
