<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Kelola Lencana' ) }}
      <div class="inline-block px-3 py-1 ms-3 bg-blue-200 font-semibold text-base rounded ">
        {{ auth()->user()->admin->stand  }}
      </div>
    </h2>
  </x-slot>

  <x-qr-scanner />

</x-app-layout>