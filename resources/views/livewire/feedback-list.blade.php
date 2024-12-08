<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
  <div class="flex flex-col-reverse sm:flex-row justify-between pb-3 gap-5">

    <div>
      @if (auth()->user()->role == 'super-admin')
        <x-primary-button class="" onclick="window.open('{{ route('feedback.export', 'all') }}', '_blank');">Export
          Excel</x-primary-button>
      @else
        <x-primary-button class=""
          onclick="window.open('{{ route('feedback.export', auth()->user()->admin->stand) }}', '_blank');">Export
          Excel</x-primary-button>
      @endif
    </div>
    <div>
      <select wire:model.live="sortBy" name="sortBy" id="sortBy"
        class="w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm">
        <option value="desc">Terbaru</option>
        <option value="asc">Terlama</option>
      </select>
    </div>
  </div>
  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm text-center">
          <thead class="">
            <tr>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">No</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">Nama</th>
              @if (Auth::user()->role == 'super-admin')
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 ">Stand</th>
              @endif
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">Feedback</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Tanggal</th>
              <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Waktu</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-gray-200">
            @foreach ($feedbacks as $index => $feedback)
              <tr class="odd:bg-white even:bg-slate-50">
                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $index + 1 }}</td>
                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">{{ $feedback->name }}</td>
                @if (auth()->user()->role == 'super-admin')
                  <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 max-w-xs">{{ $feedback->stand }}</td>
                @endif
                <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-left">{{ $feedback->message }}</td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700 ">
                  {{ $feedback->created_at->format('d M Y') }}</td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                  {{ $feedback->created_at->format('H:i') }}</td>
              </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>

  </div>

  <div class="pt-4">
    {{ $feedbacks->links() }}
  </div>

</div>
