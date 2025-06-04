<nav
      class="bg-blue-dark/90 backdrop-blur-sm border-b-1 border-b-blue-navy fixed top-0 left-0 w-full z-[99999]"
    >
      <div
        class="container mx-auto px-4 py-3 flex justify-between items-center"
      >
        <!-- Logo -->
        <div class="flex flex-col justify-center flex-1/4">
          <a href="/" class="text-orange">
            <h1 class="text-2xl font-extrabold">PharmaPoint+</h1>
            <p class="font-bold">By ZACreative</p>
          </a>
        </div>

        <!-- Hamburger Menu (Mobile) -->
        <div
          class="bg-blue-dark absolute hidden flex-col w-2/3 top-20 -right-2 text-peach rounded-bl-xl overflow-hidden border-1 border-blue-navy transition-all duration-300 z-[9999] md:flex md:static md:w-auto md:flex-3/4 md:border-none md:flex-row-reverse md:bg-transparent md:rounded-none"
          id="nav-menu"
        >
          <div
            class="flex flex-col md:flex-row md:justify-between items-center"
          >
            <a
              href="/ "
              class="px-4 py-5 hover:text-orange md:p-0 md:ml-7"
              >Beranda</a
            >
            <a
              href="/#about"
              class="px-4 py-5 hover:text-orange md:p-0 md:ml-7"
              >Tentang Kami</a
            >
            <a href="/katalog" class="px-4 py-5 hover:text-orange md:p-0 md:ml-7"
              >Katalog</a
            >
            <a
              href="/masuk"
              class="px-4 py-5 hover:scale-105 md:p-0 md:ml-7 md:font-bold text-orange"
              >Masuk</a
            >
            <a
              href="/daftar"
              class="px-4 py-5 hover:text-orange md:ml-7 md:bg-orange md:py-1 md:px-3 md:rounded-md md:text-black md:font-bold md:hover:text-black md:hover:bg-orange/90"
              >Daftar</a
            >
          </div>
        </div>

        <!-- Mobile Menu Toggle -->
        <div
          class="flex flex-col group md:hidden hover:cursor-pointer"
          id="nav-toggle"
        >
          <span
            class="nav-toggle origin-top-left transition-all duration-200"
          ></span>
          <span class="nav-toggle transition-all duration-200"></span>
          <span
            class="nav-toggle origin-bottom-left transition-all duration-200"
          ></span>
        </div>
      </div>
    </nav>