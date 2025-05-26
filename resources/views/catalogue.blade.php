<x-layout>
     <x-slot:title>{{ $title }}</x-slot:title>
     <h1 class="mt-20">Selamat Datang di Katalog</h1>
     <a href="/">KEMBALI</a>
     <p>Sekarang {{ date("d M y") }}</p>
     <br>
     @foreach ($owners as $owner)  
     <p>Nama : {{ $owner['name'] }}</p>
     <p>Email : {{ $owner['email'] }}</p>
     <p>Password : {{ $owner['password'] }}</p>
     <br>
     @endforeach
</x-layout>