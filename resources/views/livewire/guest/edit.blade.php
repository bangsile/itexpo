<div>
  <div class="font-semibold px-4 py-2 bg-sky-300/30 inline-block rounded-md">
    {{ strtoupper($guest->name) }}
  </div>
  <h1 class="font-semibold py-5">
    Lencana
  </h1>
  <div>
    <form wire:submit="saveBadge">
      <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
        @foreach ($stands as $stand)
          <x-checkbox for="{{ $stand }}" wire:model.live="badges.{{ $stand }}"
            stand="{{ $badges[$stand] }}">{{ strtoupper($stand) }}</x-checkbox>
        @endforeach
      </div>
      <div class="flex items-center gap-4 py-4">
        <x-primary-button>Update</x-primary-button>
        <x-action-message class="" on="badge-updated">
          {{ __('Berhasil update lencana.') }}
        </x-action-message>
      </div>
    </form>
  </div>
</div>
