<x-header>
    <x-slot:title>{{"Test"}}</x-slot:title>
</x-header>

    <section id="login" class="select-none min-h-screen bg-blue-dark p-10 xl:flex xl:flex-col xl:justify-center">
      <div class="container mx-auto max-w-lg xl:max-w-7xl text-black border-1 bg-white rounded-3xl  overflow-hidden shadow-lg flex">
        <div class="hidden xl:w-4/7 xl:flex h-full">
          <img src="img/pharmacy.jpg" alt="Medicine" class="object-cover">
        </div>
        <div class="w-full px-6 md:px-8 xl:px-12 xl:w-3/7 flex flex-col justify-center">
          <a href="/" class="block w-full mb-10 text-center">
            <h1 class="font-extrabold text-3xl text-black">PharmaPoint+</h1>
            <p class="font-bold text-black">By ZACreative</p>
          </a>
          <h1 class="font-extrabold text-xl text-center">
            Silakan masukkan akun Anda!
          </h1>
          <form action="/register" method="POST" class="mt-10">
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
                required
                class="py-1.5 outline-none border-b-1 hover:border-orange focus:border-b-2 focus:border-orange"
              />
              <p class="font-bold text-sm mt-2 text-red">Salah</p>
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
                class="py-1.5 outline-none border-b-1 hover:border-orange focus:border-b-2 focus:border-orange"
              />
              <p class="font-bold text-sm mt-2 text-red">Salah</p>
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
            </div>
            <p class="font-bold text-sm mt-2 text-red">Salah</p>
            <div class="flex flex-col mt-5">
              <label
                for="password-confirm"
                class="font-bold after:content-['*'] after:text-red after:ml-1 peer-invalid:text-red"
                >Konfirmasi Password</label
              >
              <input
                type="password"
                name="password-confirm"
                id="password-confirm"
                placeholder="********"
                required
                class="py-1.5 outline-none border-b-1 hover:border-orange focus:border-b-2 focus:border-orange"
              />
            </div>
            <p class="font-bold text-sm mt-2 text-red">Salah!</p>
            <div class="flex flex-row justify-between mt-5 items-center">
              <label for="is-admin" class="flex items-center cursor-pointer"
                ><input
                  type="checkbox"
                  name="is-admin"
                  id="is-admin"
                  class="appearance-none peer"
                />
                <span type="checkbox" name="is-admin" id="is-admin" class=" text-sm py-1.5 px-3 rounded-md mr-2 border-1 bg-transparent peer-checked:border-orange peer-checked:border-2 peer-checked:bg-peach peer-checked:font-bold peer-checked:text-blue-dark transition-all duration-100 hover:bg-peach"/>Daftar sebagai admin</span>
                <p class="hidden md:peer-checked:flex items-center"><span class="material-symbols-outlined text-green">
                  check
                  </span></p>
                
              </label>
            </div>
            <div class="flex flex-col text-center mt-5">
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