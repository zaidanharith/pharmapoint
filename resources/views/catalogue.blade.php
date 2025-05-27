{{$img = collect([1,2,3,4,5])}}

<x-layout>
     <x-slot:title>{{ $title }}</x-slot:title>

     {{-- KATALOG START --}}
     <section id="catalogue" class="py-30 text-black">
          <div class="container mx-auto px-4">
            <h1
              class="font-extrabold text-4xl text-blue-dark mb-20 text-center md:text-left"
            >
              Katalog Obat
            </h1>
            <div
              class="flex flex-col rounded-md shadow-md overflow-hidden px-4 md:px-10 py-7 md:py-10"
            >
              <div class="w-full flex justify-between mb-10">
                <form action="#" class="flex">
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
                    autofocus
                    class="outline-none hover:border-orange focus:border-b-2 focus:border-orange"
                  />
                </form>
                <div
                  class="flex cursor-pointer hover:font-medium hover:text-blue-navy"
                >
                  <span class="material-symbols-outlined"> filter_alt </span>
                  <p>Filter</p>
                </div>
              </div>
              <div class="w-full flex flex-wrap gap-10 lg:gap-x-0 justify-center lg:justify-between">
               @foreach ($medicines as $medicine)
               <div class="flex flex-col overflow-hidden rounded-lg shadow-md w-full lg:w-1/2 lg:max-w-md xl:max-w-lg 2xl:max-w-md hover:bg-peach hover:border-1 group border-orange hover:shadow-lg cursor-pointer transition-all duration-200">
                    <img
                        src="img/catalogue/{{$img->random()}}.jpg"
                        alt="Gambar {{$medicine['nama']}}"
                        class="w-full h-1/2 object-cover bg-center transition-all duration-500 ease-in-out transform origin-bottom group-hover:scale-110"
                    />
                    <div class="flex flex-col justify-center px-5 pt-7 md:px-7">
                        <h2 class="font-bold text-lg">{{$medicine['name']}}</h2>
                        <h3 class="font-extrabold text-xl text-blue-dark mt-2">Rp. {{$medicine['price']}}</h3>
                        <p class="mt-3 mb-5 font-light text-base">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. In
                            aut eligendi quibusdam temporibus mollitia, itaque nisi
                            repellendus quae consectetur optio?
                        </p>
                        <div class="flex justify-between">
                            <h4 class="flex items-center font-bold">
                                <span class="material-symbols-outlined mr-1">
                                    inventory_2
                                </span>
                                <p>{{$medicine['stock']}}</p>
                            </h4>
                            <p class="font-medium text-sm">Kesehatan Mata</p>
                        </div>
                    </div>
                </div>                
               @endforeach
              </div>
            </div>
          </div>
        </section>
     {{-- KATALOG --}}
     
</x-layout>