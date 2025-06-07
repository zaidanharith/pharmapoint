
<x-header>
     <x-slot:title>{{$title}}</x-slot:title>
 </x-header>
 
 <section id="login" class="select-none min-h-screen bg-blue-dark p-10 xl:flex xl:flex-col xl:justify-center">
  @if(session()->has('success'))
    <div class="fixed top-10 left-1/2 bg-green-100 border-green-500 text-green-700 px-3 py-1.5 rounded-md shadow-lg z-50 animate-fade-in-down" 
         role="alert"
         x-data="{ show: true }"
         x-show="show"
         x-init="setTimeout(() => show = false, 10000)">
        <div class="flex items-center">
            <p class="font-medium">{{ session('success') }}</p>
            <button type="button" class="ml-4" @click="show = false">
                <span class="material-symbols-outlined cursor-pointer">close</span>
            </button>
        </div>
    </div>
  @endif
  @if(session()->has('loginError'))
    <div class="fixed top-10 left-1/2 bg-red-100 border-red-500 text-red-700 px-3 py-1.5 rounded-md shadow-lg z-50 animate-fade-in-down" 
         role="alert"
         x-data="{ show: true }"
         x-show="show"
         x-init="setTimeout(() => show = false, 10000)">
        <div class="flex items-center">
            <p class="font-medium">{{ session('loginError') }}</p>
            <button type="button" class="ml-4" @click="show = false">
                <span class="material-symbols-outlined cursor-pointer">close</span>
            </button>
        </div>
    </div>
  @endif
     <div class="container mx-auto max-w-lg xl:max-w-7xl text-black border-1 bg-white rounded-3xl  overflow-hidden shadow-lg flex">
         <div class="hidden xl:w-1/2 xl:flex h-full">
             <img src="img/pharmacy.jpg" alt="Medicine" class="h-full object-cover">
         </div>
         <div class="w-full px-6 md:px-8 xl:px-12 py-15 xl:w-1/2 flex flex-col justify-center">
             <a href="/" class="block w-full mb-10 text-center">
                 <h1 class="font-extrabold text-3xl text-black">PharmaPoint+</h1>
                 <p class="font-bold text-black">By ZACreative</p>
             </a>
             <h1 class="font-extrabold text-xl text-center">
                 Silakan masukkan akun Anda!
             </h1>
             <form method="POST" action="/masuk" class="mt-10">
             @csrf 
             <div class="flex flex-col">
               <label
                 for="email"
                 class="font-bold after:content-['*'] after:text-red after:ml-1 peer-invalid:text-red"
                 >Alamat Email atau Username</label
               >
               <input
                 type="text"
                 name="email"
                 id="email"
                 placeholder="walid@example.com"
                 required autofocus value="{{ old('email', 'username') }}"
                 class="py-1.5 outline-none border-b-1 hover:border-orange focus:border-b-2 focus:border-orange"
               />
               @error('email')
               <p class="font-bold text-sm mt-2 text-red">{{$message}}</p>
               @enderror
             </div>
             <div class="flex flex-col mt-5">
               <label
                 for="password"
                 class="font-bold after:content-['*'] after:text-red after:ml-1 peer-invalid:text-red"
                 >Password</label
               >
               <input
                 type="password"
                 name="password"
                 id="password"
                 placeholder="********"
                 required
                 class="py-1.5 outline-none border-b-1 hover:border-orange focus:border-b-2 focus:border-orange"
               />
               @error('password')
               <p class="font-bold text-sm mt-2 text-red">{{$message}}</p>
               @enderror
             </div>
             <div class="flex flex-row justify-between mt-5 items-center">
               <label for="remember_me" class="flex items-center cursor-pointer"
                 ><input
                   type="checkbox"
                   value="1"
                   {{ old('remember') ? 'checked' : '' }}
                   name="remember_me"
                   id="remember_me"
                   class="appearance-none peer"
                 /><span class=" text-sm py-1.5 px-3 rounded-md mr-2 border-1 bg-transparent peer-checked:border-orange peer-checked:border-2 peer-checked:bg-peach peer-checked:font-bold peer-checked:text-blue-dark transition-all duration-100 hover:bg-peach"/>Ingat saya</span>
                 <p class="hidden md:peer-checked:flex items-center"><span class="material-symbols-outlined text-green">
                   check
                   </span></p>
                 
               </label>
               <a href="{{ route('password.request') }}" class="text-orange font-bold hover:opacity-80 cursor-pointer">Lupa password?</a>
             </div>
             <div class="flex flex-col text-center mt-5">
               <button
                 type="submit"
                 class="bg-orange py-2 rounded-lg font-bold cursor-pointer hover:bg-orange/90"
               >
                 Masuk
               </button>
               <p class="mt-7">
                 Belum punya akun?
                 <a href="/daftar" class="text-orange font-bold hover:opacity-80 underline"
                   >Daftar</a
                 >
                 sekarang!
               </p>
             </div>
             <div class="flex flex-col text-center mt-7">
               <a href="/" class="font-bold flex items-center justify-center hover:text-blue-navy hover:scale-105 transition-all duration-300"><span class="material-symbols-outlined mr-1">
                 keyboard_backspace
                 </span>Kembali ke Beranda</a>
             </div>
           </form>
         </div>
       </div>
     </section>
 <x-footer></x-footer>