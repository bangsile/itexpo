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

  <body class="antialiased font-sans bg-cover bg-center"
    style="background-image: url('{{ asset('img/bg-landing.png') }}');">
    <div class="flex items-center justify-center min-h-screen">

      <!-- Card with additional styling -->
      <div class="bg-white rounded-lg shadow-xl p-6  w-full max-w-md sm:max-w-lg">
        <div>
          <div class="text-center">
            <!-- Logo and Title Section -->
            <h1 class="text-2xl font-bold mb-2">SELAMAT DATANG DI</h1>
            <a href="/" wire:navigate>
              <x-application-logo class="w-28 fill-current text-gray-500 mx-auto mb-5" />
            </a>

            <!-- Buttons Section -->
            <div class="flex flex-col gap-4 mt-8">
              @if (Auth::check())
              <x-primary-button class="flex justify-center" onclick="location.href = '{{ route('dashboard') }}'">
                Dashboard
              </x-primary-button>
              @else
              <x-primary-button class="flex justify-center" onclick="location.href = '{{ route('login') }}'">
                Login
              </x-primary-button>
              <x-primary-button class="flex justify-center" onclick="location.href = '{{ route('register') }}'">
                Registrasi Akun
              </x-primary-button>
              @endif
              <x-primary-button class="flex justify-center"
                onclick="location.href = '{{ route('registrasi-pengunjung') }}'">
                Registrasi Pengunjung
              </x-primary-button>
              <x-primary-button class="flex justify-center" onclick="location.href = '{{ route('feedback') }}'">
                Feedback
              </x-primary-button>
            </div>
          </div>

          <!-- Footer Section -->
          <footer class="pt-6 text-center text-sm font-bold text-black dark:text-white/70">
            &copy; IT-EXPO 7.0 - HMTI 2024
          </footer>
        </div>
      </div>

    </div>
  </body>

</html>