{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address --
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<x-header>
    <x-slot:title>{{"Masuk"}}</x-slot:title>
</x-header>


<section id="register" class="select-none min-h-screen bg-blue-dark p-10 xl:flex xl:flex-col xl:justify-center">
    <div class="container mx-auto max-w-lg xl:max-w-7xl text-black border-1 bg-white rounded-3xl  overflow-hidden shadow-lg flex">
      <div class="hidden xl:w-1/2 xl:block">
        <img src="img/pharmacy.jpg" alt="Medicine" class="h-full object-cover">
      </div>
      <div class="w-full px-6 md:px-8 xl:px-12 py-15 xl:w-1/2 flex flex-col justify-center">
        <a href="/" class="block w-full mb-10 text-center">
          <h1 class="font-extrabold text-3xl text-black">PharmaPoint+</h1>
          <p class="font-bold text-black">By ZACreative</p>
        </a>
        <h1 class="font-extrabold text-xl text-center">
          Daftarkan akun Anda!
        </h1>
        <form method="POST" action="{{ route('register') }}" class="mt-10">
        @csrf 
          <div class="flex flex-col">
            <label
              for="name"
              class="font-bold after:content-['*'] after:text-red after:ml-1 peer-invalid:text-red"
              >Nama Lengkap</label
            >
            <input
              type="text"
              name="name"
              id="name"
              placeholder="Walid bin Walid"
              required value="{{old('name')}}"
              class="py-1 outline-none border-b-1 hover:border-orange focus:border-b-2 focus:border-orange"
            />
            <p class="font-bold text-sm mt-2 text-red">{{$errors->first('name')}}</p>
          </div>
          <div class="flex flex-col mt-5">
            <label
              for="username"
              class="font-bold after:content-['*'] after:text-red after:ml-1 peer-invalid:text-red"
              >Username</label
            >
            <input
              type="text"
              name="username"
              id="username"
              placeholder="walidbinwalid"
              required value="{{old('username')}}"
              class="py-1 outline-none border-b-1 hover:border-orange focus:border-b-2 focus:border-orange"
            />
            <p class="font-bold text-sm mt-2 text-red">{{$errors->first('username')}}</p>
          </div>
          <div class="flex flex-col mt-5">
            <label
              for="email"
              class="font-bold after:content-['*'] after:text-red after:ml-1 peer-invalid:text-red"
              >Alamat Email</label
            >
            <input
              type="email"
              name="email"
              id="email"
              placeholder="walid@example.com"
              required
              class="py-1 outline-none border-b-1 hover:border-orange focus:border-b-2 focus:border-orange"
            />
            <p class="font-bold text-sm mt-2 text-red">{{$errors->first('name')}}</p>
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
              required value="{{old('password')}}"
              class="py-1 outline-none border-b-1 hover:border-orange focus:border-b-2 focus:border-orange"
            />
            <p class="font-bold text-sm mt-2 text-red">{{$errors->first('password')}}</p>
          </div>
          <div class="flex flex-col mt-5">
            <label
              for="password_confirmation"
              class="font-bold after:content-['*'] after:text-red after:ml-1 peer-invalid:text-red"
              >Konfirmasi Password</label
            >
            <input
              type="password"
              name="password_confirmation"
              id="password_confirmation"
              placeholder="********"
              required value="{{old('password_confirmation')}}"
              class="py-1 outline-none border-b-1 hover:border-orange focus:border-b-2 focus:border-orange"
            />
            <p class="font-bold text-sm mt-2 text-red">{{$errors->first('password_confirmation')}}</p>
          </div>
          <div class="flex flex-row justify-between mt-5 items-center">
            <label for="is_admin" class="flex items-center cursor-pointer"
              ><input
                type="checkbox"
                name="is_admin"
                id="is_admin"
                class="appearance-none peer"
              />
              <span class=" text-sm py-1 px-3 rounded-md mr-2 border-1 bg-transparent peer-checked:border-orange peer-checked:border-2 peer-checked:bg-peach peer-checked:font-bold peer-checked:text-blue-dark transition-all duration-100 hover:bg-peach"/>Daftar sebagai admin</span>
              <p class="hidden peer-checked:flex items-center"><span class="material-symbols-outlined text-green">
                check
                </span></p>
              
            </label>
          </div>
          <div class="flex flex-col text-center mt-7">
            <button
              type="submit"
              class="bg-orange py-2 rounded-lg font-bold cursor-pointer hover:bg-orange/90"
            >
              Daftar
            </button>
            <p class="mt-7">
              Sudah punya akun?
              <a href="/login" class="text-orange font-bold hover:opacity-80 underline"
                >Masuk</a
              >
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