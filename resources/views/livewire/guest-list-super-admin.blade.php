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
    <div></div>
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
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Website</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">IoT</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Mobile</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Cyber</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Multimedia</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">GIS</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Game</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Networking</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Troubleshoot</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"></th>
            </tr>
          </thead>

          <tbody class="divide-y divide-gray-200">
            @foreach ($guests as $index => $guest)
              <tr class="odd:bg-white even:bg-slate-50">
                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $index + 1 }}</td>
                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">{{ $guest->name }}</td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-left">{{ $guest->email }}</td>
                @foreach ($stands as $stand)
                  <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                    <label class="flex items-center justify-center gap-4">
                      <div class="flex items-center">
                        &#8203;
                        <input type="checkbox" {{ $guest->badge->$stand ? 'checked' : '' }} disabled
                          class="size-4 rounded border-gray-300" id="Option-{{ $stand }}" />
                      </div>
                    </label>
                  </td>
                @endforeach
                <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-left">
                  <x-secondary-button onclick="location.href = '{{ route('edit-guest', $guest->email) }}'"
                    class="py-2 px-4 bg-emerald-400 hover:bg-emerald-500 ">
                    edit
                  </x-secondary-button>
                </td>
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
