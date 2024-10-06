@props(['src', 'earned'])
<div class="flex flex-col gap-3 items-center">
  <img class="h-20 {{ $earned ? '' : 'grayscale' }}" src={{ $src }} alt="">
  <p class="text-center">{{ $slot }}</p>
</div>
