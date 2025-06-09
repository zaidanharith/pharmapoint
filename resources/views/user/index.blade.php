<x-layout>
     <x-slot:title>{{ $title }}</x-slot:title>
 
     <section id="catalogue" class="py-30 text-black">
         <div class="container mx-auto px-4">
          <div class="flex justify-between mb-5 items-center">
               @php
                   date_default_timezone_set('Asia/Jakarta');
                   $hour = date('H');
                   if ($hour < 11 && $hour >= 0) {
                       $greeting = 'Selamat Pagi';
                   } elseif ($hour < 15 && $hour >= 11) {
                       $greeting = 'Selamat Siang';
                   } elseif ($hour < 18 && $hour >= 15) {
                       $greeting = 'Selamat Sore';
                   } else { 
                       $greeting = 'Selamat Malam';
                   }

                   $role = auth()->user()->is_admin ? 'Admin' : (auth()->user()->is_owner ? 'Owner' : 'User'); 
               @endphp
               <div class="flex items-center">
                   <h1 class="font-extrabold text-4xl text-blue-dark">{{ $greeting }}, {{ auth()->user()->name }}</h1>
                   <p class="text-sm ml-3 rounded-md px-1 text-white {{ $role === 'Admin' ? 'bg-green-600' : ($role === 'Owner' ? 'bg-amber-600' : 'bg-gray-600') }}">{{ $role }}</p>
               </div>
               <div class="text-black font-bold flex items-center">
                   <span class="material-symbols-outlined">
                       calendar_month
                       </span>
                   <span class="ml-2" id="current-time"></span>
               </div>
           </div>
           <div class="flex flex-col rounded-md shadow-md overflow-hidden px-4 py-7 md:p-10">
               <a href="/dashboard" class="flex items-center hover:font-bold group transition-all duration-200"><span class="material-symbols-outlined mr-1 group-hover:-translate-x-3 transition-all duration-200 ease-in-out">arrow_back</span>Kembali ke Dashboard</a>
               <form action="/dashboard/{{ $user->username }}" method="POST" class="flex flex-col w-1/4">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col mt-5">
                      <label for="name" class="font-medium after:content-['*'] after:text-red after:ml-1">Nama</label>
                      <input type="text" name="name" id="name" placeholder="Paracetamol" value="{{ old('name', $user->name) }}" class="outline-none mt-1 py-1 border-b-1 text-sm focus:border-b-2 focus:border-orange" required>
                      @error('name')
                          <p class="text-red text-sm mt-1 font-bold">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="flex flex-col mt-5">
                      <label for="username" class="font-medium after:content-['*'] after:text-red after:ml-1">Username</label>
                      <input type="text" name="username" id="username" placeholder="Paracetamol" value="{{ old('username', $user->username) }}" class="outline-none mt-1 py-1 border-b-1 text-sm focus:border-b-2 focus:border-orange" required>
                      @error('username')
                          <p class="text-red text-sm mt-1 font-bold">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="flex flex-col mt-5">
                      <label for="email" class="font-medium after:content-['*'] after:text-red after:ml-1">Email</label>
                      <input type="text" name="email" id="email" placeholder="Paracetamol" value="{{ old('email', $user->email) }}" class="outline-none mt-1 py-1 border-b-1 text-sm focus:border-b-2 focus:border-orange" required>
                      @error('email')
                          <p class="text-red text-sm mt-1 font-bold">{{ $message }}</p>
                      @enderror
                    </div>
                    <button class="mt-5 py-1.5 px-3 bg-orange font-medium w-fit rounded-md hover:bg-orange/90 transition-all duration-200 flex items-center"><span class="material-symbols-outlined mr-2 cursor-pointer">
                         edit
                         </span>Simpan Perubahan</button>
               </form>
           </div>
         </div>
     </section>

     <script>
          function updateClock() {
          const now = new Date();
          const options = {
               day: "numeric",
               month: "long",
               year: "numeric",
               hour: "2-digit",
               minute: "2-digit",
               second: "2-digit",
               hour12: false,
          };
          document.getElementById("current-time").textContent = now.toLocaleString(
               "id-ID",
               options
          );
          }

          updateClock();
          setInterval(updateClock, 1000);
     </script>
     
 </x-layout>