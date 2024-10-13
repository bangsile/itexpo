<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          {{ __('Selamat Datang di IT Expo 7.0') }}
        </div>
      </div>
    </div>
  </div>

  @if (auth()->user()->role == 'pengunjung')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <div class=" text-gray-900 font-semibold">
          {{ __('Ikutan challange kita yuk!') }}
        </div>
        <div class="  text-gray-900">
          <p class="pb-5">Kumpulkan semua lencana di setiap stand untuk ditukarkan di hari terakhir IT Expo 7.0</p>
          <x-primary-button onclick="location.href = '{{ route('badge') }}'" class="">Lihat Lencanamu di
            sini</x-primary-button>
        </div>

      </div>
    </div>
  @endif
</x-app-layout>
