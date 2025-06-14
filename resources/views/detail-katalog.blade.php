<x-layout>
     <x-slot:title>{{ $medicine->name }}</x-slot:title>

     {{-- KATALOG DETAIL START --}}
     <section id="catalogue-detail" class="py-30 text-black">
          <div class="container mx-auto px-4">
               <h1 class="font-extrabold text-4xl text-blue-dark mb-10 text-center md:text-left">Detail Produk</h1>
               <div class="flex flex-col rounded-md shadow-md overflow-hidden px-4 md:px-10 py-7 md:py-10">
                    <a href="/katalog" class="flex items-center hover:font-bold group transition-all duration-200"><span class="material-symbols-outlined mr-1 group-hover:-translate-x-3 transition-all duration-200 ease-in-out">arrow_back</span>Kembali ke Katalog</a>
                    <div class="flex flex-col md:flex-row gap-5 md:gap-10 mt-10">
                         <!-- Column 1: Image and Action Buttons -->
                         <div class="flex flex-col w-full md:w-5/12 xl:w-4/12">
                              <div class="shadow-md overflow-hidden rounded-lg w-full h-[300px] xl:h-[400px]">
                                   <img src="{{ asset('storage/' . $medicine->image) }}" alt="{{ $medicine['name'] }}" class="object-cover w-full h-full">
                              </div>
                              @can('owner-admin')
                              <div class="flex mt-5 justify-between gap-x-4">
                                   <a href="/katalog/{{ $medicine->slug }}/ubah" class="px-3 py-2 bg-blue-dark rounded-lg font-medium text-white flex items-center hover:bg-blue-dark/90 w-1/2 justify-center"><span class="material-symbols-outlined mr-1">edit</span>Ubah Detail</a>
                                   <button id="delete-katalog-btn" class="px-3 py-2 bg-red-600 rounded-lg font-medium text-white flex items-center hover:bg-red-700 w-1/2 justify-center cursor-pointer"><span class="material-symbols-outlined mr-1">delete_forever</span>Hapus</button>
                              </div>
                              <form id="delete-katalog-form" action="/katalog/{{ $medicine->slug }}" method="POST" class="mt-7 p-5 rounded-lg bg-red-50 border-1 border-red-600 hidden transition-all duration-200">
                                   @method('delete')
                                   @csrf
                                   <p class="font-medium">Apakah Anda yakin ingin menghapus produk <span class="font-bold">{{ $medicine->name }}</span>?</p>
                                   <div class="flex gap-3 mt-3">
                                        <button type="button" class="px-3 py-1 text-sm bg-gray-200 rounded-md cursor-pointer hover:bg-gray-300" id="cancel-delete-katalog-btn">Batal</button>
                                        <button type="submit" class="px-3 py-1 bg-red-600 rounded-lg font-medium text-white flex items-center hover:bg-red-700 cursor-pointer">Hapus</button>
                                   </div>
                              </form>
                              @endcan
                         </div>

                         <!-- Column 2: Product Details and Order Form -->
                         <div class="flex flex-col w-full md:w-7/12 xl:w-8/12 2xl:w-4/12">
                              <div class="flex flex-col mb-7">
                                   <h2 class="font-extrabold text-2xl xl:text-3xl text-bg-dark mb-2 text-blue-dark">{{$medicine->name}}</h2>
                                   <h3 class="font-bold text-sm xl:text-base">Kategori: {{$medicine->category->name}}</h3>
                                   <h2 class="text-xl xl:text-2xl font-extrabold mt-3">Rp{{ number_format($medicine->price, 0, ',', '.') }}</h2>
                              </div>
                              <div class="flex flex-col border-1 border-gray-300 rounded-md overflow-hidden mb-8">
                                   @foreach ($medicine_description as $description)
                                        <p class="p-4 text-sm xl:text-base {{ !$description->last ? 'border-b-1 border-gray-300' : '' }}">{{ $description->description }}</p>
                                   @endforeach
                              </div>
                         </div>

                         <!-- Column 3: Order Form (Shows as third column only on 2xl screens) -->
                         <div class="flex flex-col w-full md:w-7/12 md:ml-auto xl:w-8/12 xl:ml-auto 2xl:w-4/12 2xl:ml-0">
                              <form action="/katalog/{{ $medicine->slug }}/keranjang" method="POST" class="flex flex-col rounded-lg shadow-md py-7 px-5 border-1 border-orange">
                                   @csrf
                                   @method('post')
                                   <h2 class="font-extrabold text-xl xl:text-2xl text-bg-dark mb-4 text-blue-dark">Pesan</h2>
                                   <div class="flex justify-between items-center font-bold w-full">
                                        <div class="flex flex-col">
                                             <h5 class="text-lg xl:text-xl">{{ $medicine->name }}</h5>
                                             <p class="text-sm xl:text-base text-gray-500">Rp{{ number_format($medicine->price, 0, ',', '.') }}</p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                             <input type="number" name="quantity" id="quantity" class="w-20 px-2 py-1 border-1 border-gray-300 rounded-md" value="1" min="1" onchange="updateTotal(this.value)" required>
                                        </div>
                                   </div>
                                   <p class="mt-5 font-extrabold text-xl xl:text-2xl text-blue-dark" id="total">
                                        Total: Rp{{ number_format($medicine->price * old('quantity', 1), 0, ',', '.') }}
                                   </p>
                                   <button type="submit" class="font-bold text-md xl:text-lg py-3 bg-orange hover:bg-orange/90 rounded-lg text-center mt-5 flex items-center justify-center cursor-pointer"><span class="material-symbols-outlined mr-2">shopping_cart</span>Masukkan Keranjang</button>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     {{-- KATALOG DETAIL END --}}

     <script>
          const navToggle = document.querySelector("#nav-toggle");
          const navMenu = document.querySelector("#nav-menu");
          navToggle.addEventListener("click", function () {
          navToggle.classList.toggle("nav-toggle-active");
          navMenu.classList.toggle("hidden");
          });

          const deleteKatalogBtn = document.querySelector("#delete-katalog-btn");
          const cancelDeleteKatalogBtn = document.querySelector(
          "#cancel-delete-katalog-btn"
          );
          const deleteKatalogForm = document.querySelector("#delete-katalog-form");

          deleteKatalogBtn.addEventListener("click", function () {
               if (deleteKatalogForm.style.display === "block") {
                    deleteKatalogForm.style.display = "none";
               } else {
                    deleteKatalogForm.style.display = "block";
               }
          });

          cancelDeleteKatalogBtn.addEventListener("click", function () {
          deleteKatalogForm.style.display = "none";
          });

          function updateTotal(quantity) {
               const price = {{ $medicine->price }};
               const total = price * quantity;
               document.getElementById('total').textContent = 
                    'Total: Rp' + new Intl.NumberFormat('id-ID').format(total);
          }

          document.addEventListener('DOMContentLoaded', function() {
               const quantityInput = document.getElementById('quantity');
               updateTotal(quantityInput.value);
          });
     </script>
</x-layout>