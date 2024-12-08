<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Daftar Pengunjung') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <livewire:all-guest-list />
  </div>
  </div>
</x-app-layout>