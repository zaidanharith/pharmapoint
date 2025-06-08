<x-layout>
     <x-slot:title>{{ $medicine->name }}</x-slot:title>

     {{-- KATALOG DETAIL START --}}
     <section id="catalogue-detail" class="py-30 text-black">
          <div class="container mx-auto px-4">
               <h1 class="font-extrabold text-4xl text-blue-dark mb-10 text-center md:text-left">Detail Produk</h1>
               <div class="flex flex-col rounded-md shadow-md overflow-hidden px-4 md:px-10 py-7 md:py-10">
                    <a href="/katalog" class="flex items-center hover:font-bold group transition-all duration-200"><span class="material-symbols-outlined mr-1 group-hover:-translate-x-3 transition-all duration-200 ease-in-out">arrow_back</span>Kembali ke Katalog</a>
                    <div class="flex gap-15 mt-10 items-start">
                         <div class="flex flex-col w-3/9">
                              <div class="shadow-md overflow-hidden rounded-lg w-full">
                                   <img src="{{ asset('storage/' . $medicine->image) }}" alt="{{ $medicine['name'] }}" class="object-cover w-full">
                              </div>
                              @can('owner-admin')
                              <div class="flex mt-5 justify-between gap-x-4">
                                   <a href="/katalog/{{ $medicine->slug }}/ubah" class="px-3 py-2 bg-blue-dark rounded-lg font-medium text-white flex items-center hover:bg-blue-dark/90 w-1/2 justify-center"><span class="material-symbols-outlined mr-1">
                                   edit
                                   </span>Ubah Detail</a>
                                   <button id="delete-katalog-btn" class="px-3 py-2 bg-red-600 rounded-lg font-medium text-white flex items-center hover:bg-red-700 w-1/2 justify-center cursor-pointer"><span class="material-symbols-outlined mr-1">
                                   delete_forever
                                   </span>Hapus</button>
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
                         <div class="flex flex-col w-4/9">
                              <h2 class="font-extrabold text-2xl text-bg-dark mb-3 text-blue-dark">{{$medicine->name}}</h2>
                              <h3 class="font-bold text-sm mb-5">Kategori: {{$medicine->category->name}}</h3>
                              @foreach ($medicine_description as $description)
                                   <p>{{ $description->description }}</p>
                              @endforeach
                         </div>
                         <div class="flex flex-col w-2/9 rounded-lg shadow-md p-7 border-1 border-orange">
                              <h2 class="font-extrabold text-xl text-bg-dark mb-4 text-blue-dark">Pesan</h2>
                              <h3 class="">Ringkasan Pesanan</h3>
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum nobis numquam possimus aspernatur ipsam placeat ut, est sequi doloremque natus officiis officia deleniti odio quisquam iste cum adipisci harum velit quibusdam voluptatibus. Eaque saepe cum, deserunt ipsa ut cupiditate omnis iusto eum facilis, alias corporis dolorem harum velit animi in.</p>
                              <a href="#" class="font-bold text-md py-3 bg-orange hover:bg-orange/90 rounded-lg text-center mt-4">Beli</a>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     {{-- KATALOG DETAIL END --}}

     <script>
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
     </script>
</x-layout>