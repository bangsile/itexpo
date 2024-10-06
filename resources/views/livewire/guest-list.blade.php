<div class="overflow-x-auto">
  <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm text-center">
    <thead class="">
      <tr>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">No</th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama</th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Username</th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Lencana</th>
      </tr>
    </thead>

    <tbody class="divide-y divide-gray-200">
      @foreach ($guests as $index =>$guest)
        <tr>
          <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $index + 1 }}</td>
          <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $guest->name }}</td>
          <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $guest->badge }}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $guest->email }}</td>
          <td class="whitespace-nowrap px-4 py-2">
            <label for="badge{{ $guest->id }}"
              class="relative inline-block h-8 w-14 cursor-pointer rounded-full bg-gray-300 transition [-webkit-tap-highlight-color:_transparent] has-[:checked]:bg-green-500">
              <input type="checkbox" id="badge{{ $guest->id }}"
                class="peer sr-only [&:checked_+_span_svg[data-checked-icon]]:block [&:checked_+_span_svg[data-unchecked-icon]]:hidden" />

              <span
                class="absolute inset-y-0 start-0 z-10 m-1 inline-flex size-6 items-center justify-center rounded-full bg-white text-gray-400 transition-all peer-checked:start-6 peer-checked:text-green-600">
                <svg data-unchecked-icon xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20"
                  fill="currentColor">
                  <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
                </svg>

                <svg data-checked-icon xmlns="http://www.w3.org/2000/svg" class="hidden size-4" viewBox="0 0 20 20"
                  fill="currentColor">
                  <path fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
                </svg>
              </span>
            </label>
          </td>
        </tr>
      @endforeach

    </tbody>
  </table>
</div>
