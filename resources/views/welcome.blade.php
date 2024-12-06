<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name', 'IT-EXPO 7.0 - HMTI') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  <!-- Styles -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans">
  <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">

    <div
      class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
      <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
        <div class="flex flex-col justify-center items-center">
          <a href="/" wire:navigate>
            <x-application-logo class="w-28 fill-current text-gray-500" />
          </a>

          <div class="text-center mt-10 text-xl font-semibold">
            <h1>SELAMAT DATANG</h1>
            <h1 class="text-2xl font-bold">IT-EXPO 7.0 - HMTI</h1>
            <h1>2024</h1>
          </div>

          <div class="flex flex-col gap-2 mt-10">
            @if (Auth::check())
              <x-primary-button class="flex justify-center"
                onclick="location.href = '{{ route('dashboard') }}'">Dashboard</x-primary-button>
            @else
              <x-primary-button class="flex justify-center"
                onclick="location.href = '{{ route('login') }}'">Login</x-primary-button>
              <x-primary-button class="flex justify-center"
                onclick="location.href = '{{ route('register') }}'">Registrasi Akun</x-primary-button>
            @endif
            <x-primary-button class="flex justify-center"
              onclick="location.href = '{{ env('APP_PRESENSI_URL') }}'">Registrasi Pengunjung</x-primary-button>
          </div>

        </div>


        <footer class="py-16 text-center text-sm text-black dark:text-white/70">
          IT-EXPO 7.0 - HMTI 2024
        </footer>
      </div>
    </div>
  </div>
</body>

</html>
