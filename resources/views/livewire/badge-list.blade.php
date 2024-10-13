<div>
  <div class="p-6 text-gray-900 font-semibold">
    Lencana Terkumpul : {{ $totalBadge }}/9
  </div>
  <div class="p-6 text-gray-900 font-semibold">
    {{-- <p class="text-center py-10">Lencana Harian</p>
  <div class="grid grid-cols-3 gap-x-4 gap-y-10 mb-10">
    <div class="flex flex-col gap-3 items-center">
      <img class="grayscale h-20" src="{{ asset('img/badge.png') }}" alt="">
      <p class="text-center">Hari 1</p>
    </div>
    <div class="flex flex-col gap-3 items-center">
      <img class=" h-20" src="{{ asset('img/badge.png') }}" alt="">
      <p class="text-center">Hari 2</p>
    </div>
    <div class="flex flex-col gap-3 items-center ">
      <img class=" h-20" src="{{ asset('img/badge.png') }}" alt="">
      <p class="text-center">Hari 3</p>
    </div>
  </div> --}}
    {{-- <p class="text-center py-10">Lencana Stan</p> --}}
    <div class="grid grid-cols-3 gap-x-4 gap-y-10  ">
      <x-badge :src="asset('img/badge.png')" :earned="$badges->website">Website</x-badge>
      <x-badge :src="asset('img/badge.png')" :earned="$badges->iot">IoT</x-badge>
      <x-badge :src="asset('img/badge.png')" :earned="$badges->gis">GIS</x-badge>
      <x-badge :src="asset('img/badge.png')" :earned="$badges->network">Network</x-badge>
      <x-badge :src="asset('img/badge.png')" :earned="$badges->cyber">Cyber Security</x-badge>
      <x-badge :src="asset('img/badge.png')" :earned="$badges->multimedia">Multimedia</x-badge>
      <x-badge :src="asset('img/badge.png')" :earned="$badges->troubleshoot">Troubleshoot</x-badge>
      <x-badge :src="asset('img/badge.png')" :earned="$badges->game">Game</x-badge>
      <x-badge :src="asset('img/badge.png')" :earned="$badges->mobile">Mobile</x-badge>
    </div>
  </div>
</div>
