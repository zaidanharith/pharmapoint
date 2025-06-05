<x-layout>
     <x-slot:title>{{ $title }}</x-slot:title>

     <section id="catalogue" class="py-30 text-black">
          <div class="container mx-auto px-4">
            <h1 class="font-extrabold text-4xl text-blue-dark mb-10 text-center md:text-left">
              Tambah Produk Baru
            </h1>
            <div class="flex flex-col rounded-md shadow-md overflow-hidden px-4 md:px-10 py-7 md:py-10">
              <a href="/katalog" class="flex items-center hover:font-bold group transition-all duration-200"><span class="material-symbols-outlined mr-1 group-hover:-translate-x-3 transition-all duration-200 ease-in-out">arrow_back</span>Kembali ke Katalog</a>
              <form action="/tambah" method="POST" enctype="multipart/form-data">
                <div class="flex flex-col mt-7">
                  <h2 class="font-bold text-lg mb-3">Masukkan Data Produk Baru!</h2>
                  @csrf
                  <div class="flex flex-col mt-5 w-1/3">
                    <label for="name" class="font-medium after:content-['*'] after:text-red after:ml-1">Nama Produk</label>
                    <input type="text" name="name" id="name" placeholder="Paracetamol" class=" outline-none mt-1 py-1 border-b-1 text-sm focus:border-b-2 focus:border-orange" required>
                  </div>
                  <div class="flex flex-col mt-5 w-1/3">
                    <label for="name" class="font-medium after:content-['*'] after:text-red after:ml-1">Kategori</label>
                    {{-- <input type="text" name="name" id="name" placeholder="Paracetamol" class=" outline-none mt-1 py-1 border-b-1 text-sm focus:border-b-2 focus:border-orange" required> --}}
                    <select name="category_id" id="category_id" class="outline-none mt-1 py-1 border-b-1 text-sm focus:border-b-2 focus:border-orange cursor-pointer" required>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                    <div class="flex flex-col mt-5 w-1/3">
                      <label for="name" class="font-medium after:content-['*'] after:text-red after:ml-1">Harga</label>
                      <div class="flex items-center">
                        <span class="text-md font-bold text-blue-dark mr-2  ">Rp</span>
                        <input type="text" name="price" id="price" placeholder="10000" class=" outline-none mt-1 py-1 border-b-1 text-sm focus:border-b-2 focus:border-orange" required>
                    </div>
                    </div>
                  </div>
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-dark text-white rounded-lg mt-7 flex items-center cursor-pointer hover:bg-blue-dark/90"><span class="material-symbols-outlined mr-1"> add </span>Tambah</button>
              </form>
            </div>
          </div>
        </section>
     
</x-layout>