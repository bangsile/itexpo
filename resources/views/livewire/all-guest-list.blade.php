<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="flex flex-col-reverse sm:flex-row justify-between pb-3 gap-5">
      <div class="flex items-center gap-5">
              {{-- Search Bar --}}
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
  
              {{-- Filter Search --}}
        <div class="relative">
          <details class="overflow-hidden rounded-md border border-gray-300 [&_summary::-webkit-details-marker]:hidden">
            <summary class="flex cursor-pointer items-center justify-between gap-2 bg-white py-[0.6rem] px-4 text-gray-900 transition">
              <span class="text-sm font-medium"> Filter Pencarian </span>
              <span class="transition group-open:-rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="size-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
              </span>
            </summary>
  
            <div class="border-t border-gray-200 bg-white absolute border rounded-md">
              <ul class="space-y-1 border-t border-gray-200 p-4">
                <li>
                  <label for="name" class="inline-flex items-center gap-2">
                    <input wire:model.live="name" type="checkbox" id="name" class="size-5 rounded border-gray-300" />
                    <span class="text-sm font-medium text-gray-700"> Nama </span>
                  </label>
                </li>
  
                <li>
                  <label for="address" class="inline-flex items-center gap-2">
                    <input wire:model.live="address" type="checkbox" id="address" class="size-5 rounded border-gray-300" />
  
                    <span class="text-sm font-medium text-gray-700"> Alamat </span>
                  </label>
                </li>
  
                <li>
                  <label for="job" class="inline-flex items-center gap-2">
                    <input wire:model.live="job" type="checkbox" id="job" class="size-5 rounded border-gray-300" />
                    <span class="text-sm font-medium text-gray-700"> Pekerjaan </span>
                  </label>
                </li>
              </ul>
            </div>
          </details>
        </div>
  
        <x-primary-button class="" onclick="window.open('{{ route('guests.export') }}', '_blank');">Export Excel</x-primary-button>
      </div>
  
          {{-- OrderBy --}}
      <div class="flex items-center gap-5">
        <select  wire:model.live="date" name="date" id="date"
          class="mt-1.5 w- rounded-lg border-gray-300 text-gray-700 sm:text-sm">
          <option value="">Semua Hari</option>
          <option value="2024-12-12">Hari Pertama</option>
          <option value="2024-12-13">Hari Kedua</option>
          <option value="2024-12-14">Hari Ketiga</option>
        </select>
        <select wire:model.live="sortBy" name="sortBy" id="sortBy"
          class="mt-1.5 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm">
          <option value="desc">Terbaru</option>
          <option value="asc">Terlama</option>
        </select>
      </div>
    </div>
  
    {{-- Table --}}
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 text-gray-900">
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm text-center">
            <thead class="">
              <tr>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 ">No</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">Nama</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left ">Jenis Kelamin</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">Alamat</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">No. HP</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">Pekerjaan</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">Tanggal</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">Jam</th>
              </tr>
            </thead>
  
            <tbody class="divide-y divide-gray-200">
              @foreach ($guests as $index => $guest)
                <tr class="odd:bg-white even:bg-slate-50">
                  <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $loop->iteration + $guests->firstItem() - 1 }}</td>
                  <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-left">{{ $guest->name }}</td>
                  <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-left ">{{ $guest->gender }}</td>
                  <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-left ">{{ $guest->address }}</td>
                  <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-left ">{{ $guest->phone ?? '-' }}</td>
                  <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-left ">{{ $guest->job }}</td>
                  <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-left ">
                    {{ $guest->created_at->format('d M Y') }}</td>
                  <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-left ">{{ $guest->created_at->format('H:i') }}
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
  