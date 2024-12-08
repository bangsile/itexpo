<div>
  <div class="p-6 text-gray-900 font-semibold">
    Lencana Terkumpul : {{ $totalBadge }}/9
  </div>
  <div class="p-6 text-gray-900 font-semibold">
    <div class="grid grid-cols-3 gap-x-4 gap-y-10  ">
      <x-badge :src="asset('img/badge.png')" :earned="$badges->Website">Website</x-badge>
      <x-badge :src="asset('img/badge.png')" :earned="$badges->IoT">IoT</x-badge>
      <x-badge :src="asset('img/badge.png')" :earned="$badges->GIS">GIS</x-badge>
      <x-badge :src="asset('img/badge.png')" :earned="$badges->Network">Network</x-badge>
      <x-badge :src="asset('img/badge.png')" :earned="$badges->Cyber">Cyber Security</x-badge>
      <x-badge :src="asset('img/badge.png')" :earned="$badges->Multimedia">Multimedia</x-badge>
      <x-badge :src="asset('img/badge.png')" :earned="$badges->Troubleshooting">Troubleshoot</x-badge>
      <x-badge :src="asset('img/badge.png')" :earned="$badges->Game">Game</x-badge>
      <x-badge :src="asset('img/badge.png')" :earned="$badges->Mobile">Mobile</x-badge>
    </div>
  </div>
</div>
