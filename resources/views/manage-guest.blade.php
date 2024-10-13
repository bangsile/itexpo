<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Kelola Pengunjung') }}
      {{-- <div class="inline-block px-3 py-1 ms-3 bg-blue-200 font-semibold text-base rounded ">
        {{ strtoupper(auth()->user()->admin->stand) }}
      </div> --}}
    </h2>
  </x-slot>
  <div class="py-12">
    <livewire:guest-list-super-admin />
  </div>
</x-app-layout>
