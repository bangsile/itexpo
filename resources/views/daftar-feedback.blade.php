<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      @if (auth()->user()->role == 'admin')
        {{ __('Daftar Feedback Stand') }}
        {{ auth()->user()->admin->stand }}
      @else
        {{ __('Daftar Feedback') }}
      @endif
    </h2>
  </x-slot>

  <div class="py-12">
    <livewire:feedback-list />
  </div>
  </div>
</x-app-layout>
