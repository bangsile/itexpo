<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  @if (session('success'))
    <div id="success-msg"
      class="absolute inline-block right-5 bottom-5 z-50 bg-emerald-500 rounded-lg border border-gray-200 shadow-lg">
      <div class="p-4 ">
        <p class="line-clamp-1 text-sm font-medium text-white">
          {{ session('success') }}
        </p>
      </div>
    </div>
    <script>
      const successMsg = document.getElementById('success-msg');
      setTimeout(() => {
        successMsg.classList.add('hidden');
      }, 5000);
    </script>
  @endif
  <div class="flex flex-col-reverse sm:flex-row justify-between pb-3 gap-5">
    <div>
      <div class="relative">
        <label for="Search" class="sr-only"> Search </label>

        <input type="text" wire:model.live="search" id="Search" placeholder="Cari pengunjung ..."
          class="w-full rounded-md border-gray-200 py-2.5 pe-10 sm:pe-24 shadow-sm sm:text-sm" />

        <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
          <button type="button" class="text-gray-600 hover:text-gray-700">
            <span class="sr-only">Search</span>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-4">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
          </button>
        </span>
      </div>
    </div>
    <x-primary-button onclick="location.href = '{{ route('give-badge') }}'"
      class="w-auto text-center mx-auto sm:mx-0">Beri
      Lencana</x-primary-button>
  </div>
  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm text-center">
          <thead class="">
            <tr>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">No</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">Nama</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">Username</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Lencana</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-gray-200">
            @foreach ($guests as $index => $guest)
              <tr class="odd:bg-white even:bg-slate-50">
                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $index + 1 }}</td>
                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">{{ $guest->name }}</td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-left">{{ $guest->email }}</td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                  @foreach ($stands as $stand)
                    @if (auth()->user()->admin->stand == $stand)
                      <label for="AcceptConditions"
                        class="relative inline-block h-8 w-14 rounded-full bg-gray-300 transition [-webkit-tap-highlight-color:_transparent] has-[:checked]:bg-green-500">
                        <input type="checkbox" id="AcceptConditions" {{ $guest->badge->$stand ? 'checked' : '' }}
                          disabled
                          class="peer sr-only [&:checked_+_span_svg[data-checked-icon]]:block [&:checked_+_span_svg[data-unchecked-icon]]:hidden" />

                        <span
                          class="absolute inset-y-0 start-0 z-10 m-1 inline-flex size-6 items-center justify-center rounded-full bg-white text-gray-400 transition-all peer-checked:start-6 peer-checked:text-green-600">
                          <svg data-unchecked-icon xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd" />
                          </svg>

                          <svg data-checked-icon xmlns="http://www.w3.org/2000/svg" class="hidden size-4"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                              clip-rule="evenodd" />
                          </svg>
                        </span>
                      </label>
                    @endif
                  @endforeach
                  {{-- <label class="flex cursor-pointer items-center justify-center gap-4">
                    <div class="flex items-center">
                      &#8203;
                      <input type="checkbox" {{ $guest->badge->website ? 'checked' : '' }} disabled
                        class="size-4 rounded border-gray-300" id="Option1" />
                    </div>
                  </label> --}}
                </td>
                {{-- <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                  <label class="flex cursor-pointer items-center justify-center gap-4">
                    <div class="flex items-center">
                      &#8203;
                      <input type="checkbox" {{ $guest->badge->iot ? 'checked' : '' }} disabled
                        class="size-4 rounded border-gray-300" id="Option1" />
                    </div>
                  </label>
                </td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                  <label class="flex cursor-pointer items-center justify-center gap-4">
                    <div class="flex items-center">
                      &#8203;
                      <input type="checkbox" {{ $guest->badge->mobile ? 'checked' : '' }} disabled
                        class="size-4 rounded border-gray-300" id="Option1" />
                    </div>
                  </label>
                </td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                  <label class="flex cursor-pointer items-center justify-center gap-4">
                    <div class="flex items-center">
                      &#8203;
                      <input type="checkbox" {{ $guest->badge->cyber ? 'checked' : '' }} disabled
                        class="size-4 rounded border-gray-300" id="Option1" />
                    </div>
                  </label>
                </td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                  <label class="flex cursor-pointer items-center justify-center gap-4">
                    <div class="flex items-center">
                      &#8203;
                      <input type="checkbox" {{ $guest->badge->multimedia ? 'checked' : '' }} disabled
                        class="size-4 rounded border-gray-300" id="Option1" />
                    </div>
                  </label>
                </td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                  <label class="flex cursor-pointer items-center justify-center gap-4">
                    <div class="flex items-center">
                      &#8203;
                      <input type="checkbox" {{ $guest->badge->gis ? 'checked' : '' }} disabled
                        class="size-4 rounded border-gray-300" id="Option1" />
                    </div>
                  </label>
                </td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                  <label class="flex cursor-pointer items-center justify-center gap-4">
                    <div class="flex items-center">
                      &#8203;
                      <input type="checkbox" {{ $guest->badge->game ? 'checked' : '' }} disabled
                        class="size-4 rounded border-gray-300" id="Option1" />
                    </div>
                  </label>
                </td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                  <label class="flex cursor-pointer items-center justify-center gap-4">
                    <div class="flex items-center">
                      &#8203;
                      <input type="checkbox" {{ $guest->badge->network ? 'checked' : '' }} disabled
                        class="size-4 rounded border-gray-300" id="Option1" />
                    </div>
                  </label>
                </td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                  <label class="flex cursor-pointer items-center justify-center gap-4">
                    <div class="flex items-center">
                      &#8203;
                      <input type="checkbox" {{ $guest->badge->troubleshoot ? 'checked' : '' }} disabled
                        class="size-4 rounded border-gray-300" id="Option1" />
                    </div>
                  </label>
                </td> --}}
              </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>

  </div>

  <div class="pt-4">
    {{ $guests->links() }}
  </div>
</div>
