<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('My QR Code') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 flex justify-center">
          <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data={{ auth()->user()->id }}"
            alt="">
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
