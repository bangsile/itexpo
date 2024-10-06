<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Lencana') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 font-semibold">
          {{ __('Ikutan challange kita yuk!') }}
        </div>
        <div class="p-6 text-gray-900">
          <p>Kumpulkan semua lencana untuk ditukarkan di hari terakhir IT Expo 7.0</p>
        </div>
      </div>
    </div>
  </div>

  <div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 font-semibold">
          {{ __('Lencana Terkumpul: 0/12') }}
        </div>
        
        <livewire:badge-list />

      </div>
    </div>
  </div>

	<div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        {{-- <div class="p-6 text-gray-900 font-semibold">
          {{ __('Ikutan challange kita yuk!') }}
        </div> --}}
        <div class="p-6 text-gray-900">
          <p>Untuk informasi lebih lanjut silahkan hubungi panitia!</p>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
