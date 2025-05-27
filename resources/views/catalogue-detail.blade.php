<x-layout>
     <x-slot:title>{{ $medicine['name'] }}</x-slot:title>

     {{-- KATALOG DETAIL START --}}
     <section id="catalogue-detail" class="py-30 text-black">
          <div class="container mx-auto px-4">
               <h1 class="font-extrabold text-4xl text-blue-dark mb-10 text-center md:text-left">Detail Produk</h1>
               <div class="flex flex-col rounded-md shadow-md overflow-hidden px-4 md:px-10 py-7 md:py-10">
                    <a href="/katalog" class="flex items-center hover:font-bold group transition-all duration-200"><span class="material-symbols-outlined mr-1 group-hover:-translate-x-3 transition-all duration-200 ease-in-out">arrow_back</span>Kembali ke Katalog</a>
                    <div class="flex gap-15 mt-10">
                         <div class="flex flex-col overflow-hidden rounded-lg">
                              <img src="/img/catalogue/1.jpg" alt="Gambar" class="object-cover aspect-square w-[2/9]">
                         </div>
                         <div class="flex flex-col w-[4/9]">
                              <h2 class="font-extrabold text-2xl text-bg-dark mb-5 text-blue-dark">{{$medicine['name']}}</h2>
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis dolorem ab reprehenderit accusantium debitis! Repellat exercitationem hic mollitia ad ipsum vitae aliquid rem quod suscipit velit consectetur placeat rerum inventore, odio tempora adipisci porro quas quibusdam accusantium. Aut quia magnam officia tempora ullam, reprehenderit odit impedit nostrum repellendus, harum veniam facilis? Minima sunt iure corporis beatae illo. Porro voluptas dolores non, vitae sit laudantium. Iusto atque quidem dolorum sunt? Odit tempora hic alias minus libero quaerat aperiam laudantium facere error, commodi deleniti incidunt a, repellendus eligendi recusandae, doloribus deserunt magnam quas provident ratione eos cum suscipit quae? Repellendus, architecto non.</p>
                              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt cupiditate at ad, commodi quis nemo obcaecati maxime, illum tempore, quaerat qui harum eligendi voluptas. Minus, vitae. Cumque delectus, voluptatem laboriosam esse est vero iure provident? Consequatur sequi saepe totam nihil officiis debitis numquam nesciunt, hic nisi fuga, rem enim accusantium nam, voluptas perferendis voluptatum fugiat. Perferendis tempora magni alias minus corporis, iusto dolore voluptatibus aspernatur reprehenderit doloribus veritatis distinctio in possimus laudantium temporibus magnam. Qui.</p>
                         </div>
                         <div class="flex flex-col w-[3/9] rounded-lg shadow-md p-7 border-1 border-orange h-auto">
                              <h2 class="font-extrabold text-xl text-bg-dark mb-4 text-blue-dark">Pesanan</h2>
                              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis debitis blanditiis placeat suscipit fuga sunt, quae sequi molestias ipsa facere tempora adipisci corrupti. Quisquam maxime veritatis magnam quibusdam. Accusantium praesentium deserunt illum nam animi in id doloribus blanditiis exercitationem laboriosam ex perspiciatis, aspernatur velit adipisci nesciunt minus vel consectetur? Debitis!</p>
                              <a href="#" class="font-bold text-md py-3 bg-orange hover:bg-orange/90 rounded-lg text-center mt-4">Beli</a>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     {{-- KATALOG DETAIL END --}}
</x-layout>