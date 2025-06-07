<x-layout>
     <x-slot:title>{{ $title }}</x-slot:title>

     <section id="catalogue" class="py-30 text-black">
          <div class="container mx-auto px-4">
            <h1 class="font-extrabold text-4xl text-blue-dark mb-10 text-center md:text-left">
              Tambah Produk Baru
            </h1>
            <div class="flex flex-col rounded-md shadow-md overflow-hidden px-4 md:px-10 py-7 md:py-10">
              <a href="/katalog" class="flex items-center hover:font-bold group transition-all duration-200"><span class="material-symbols-outlined mr-1 group-hover:-translate-x-3 transition-all duration-200 ease-in-out">arrow_back</span>Kembali ke Katalog</a>
              <form action="/katalog/tambah" method="POST" enctype="multipart/form-data">
                <div class="flex flex-col mt-7">
                  <h2 class="font-bold text-lg mb-3">Masukkan Data Produk Baru!</h2>
                  @csrf
                  <div class="flex flex-col mt-5 w-1/3">
                    <label for="name" class="font-medium after:content-['*'] after:text-red after:ml-1">Nama Produk</label>
                    <input type="text" name="name" id="name" placeholder="Paracetamol" class=" outline-none mt-1 py-1 border-b-1 text-sm focus:border-b-2 focus:border-orange" required>
                  </div>
                  <div class="flex flex-col mt-5 w-1/3">
                    <label for="name" class="font-medium after:content-['*'] after:text-red after:ml-1">Kategori</label>
                    <select name="category_id" id="category_id" class="outline-none mt-1 py-1 border-b-1 text-sm focus:border-b-2 focus:border-orange cursor-pointer" required>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="flex mt-5 w-1/3 items-center">
                    <div class="flex flex-col gap--5">
                      <label for="name" class="font-medium after:content-['*'] after:text-red after:ml-1">Harga</label>
                      <div class="flex items-center">
                        <span class="text-md font-bold text-blue-dark mr-2 ">Rp</span>
                        <input type="text" name="price" id="price" placeholder="10000" class=" outline-none mt-1 py-1 border-b-1 text-sm focus:border-b-2 focus:border-orange" required>
                      </div>
                    </div>
                    <div class="flex flex-col w-1/3 ml-5">
                      <label for="stock" class="font-medium after:content-['*'] after:text-red after:ml-1">Jumlah Stok</label>
                      <input type="number" name="stock" id="stock" placeholder="50" class=" outline-none mt-1 py-1 border-b-1 text-sm focus:border-b-2 focus:border-orange" required>
                    </div>
                  </div>
                  <div class="flex flex-col mt-5 w-1/3">
                    <label for="description" class="font-medium after:content-['*'] after:text-red after:ml-1 mb-2">Deskripsi</label>
                    <div id="description-container"></div>
                    <button type="button" 
                        class="px-3 py-1 bg-gray-200 rounded-md text-sm hover:bg-gray-300 w-fit flex items-center cursor-pointer" 
                        id="add-description-btn">
                        <span class="material-symbols-outlined text-sm">add</span> 
                        Tambah Deskripsi
                    </button>
                </div>
                <div class="flex flex-col mt-5 w-1/3">
                  <label for="image" class="font-medium">Gambar Produk</label>
                  <input type="file" name="image" id="image" class=" outline-none mt-1 py-1 border-b-1 text-sm focus:border-b-2 focus:border-orange cursor-pointer" >
                </div>
                </div>
                <button type="submit" class="px-4 py-2 bg-orange font-medium rounded-lg mt-5 flex items-center cursor-pointer hover:bg-orange/90"><span class="material-symbols-outlined mr-1"> add </span>Tambah Produk</button>
              </form>
            </div>
          </div>
        </section>
        
        <script>
          const addButton = document.getElementById("add-description-btn");
          const container = document.getElementById("description-container");

          addButton.addEventListener("click", function () {
              const inputDiv = document.createElement("div");
              inputDiv.className = "description-input mb-3 flex items-center gap-2";

              inputDiv.innerHTML = `
                          <input type="text" name="description[]" placeholder="Deskripsi produk" 
                              class="outline-none mt-1 py-1 border-b-1 text-sm focus:border-b-2 focus:border-orange w-full" required>
                          <button type="button" class="remove-description text-red-500 hover:text-red-700 cursor-pointer">
                              <span class="material-symbols-outlined">close</span>
                          </button>
                      `;

              container.appendChild(inputDiv);

              const removeButton = inputDiv.querySelector(".remove-description");
              removeButton.addEventListener("click", function () {
                  inputDiv.remove();
              });
          });
        </script>
     
</x-layout>