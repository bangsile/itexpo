<div class="overflow-x-auto">
  <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm text-center">
    <thead class="">
      <tr>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">No</th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama</th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Username</th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Website</th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">IoT</th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Mobile</th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Cyber</th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Multimedia</th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">GIS</th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Game</th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Networking</th>
        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Troubleshoot</th>
      </tr>
    </thead>

    <tbody class="divide-y divide-gray-200">
      @foreach ($guests as $index => $guest)
        <tr>
          <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $index + 1 }}</td>
          <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $guest->name }}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $guest->email }}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">
            <label class="flex cursor-pointer items-center justify-center gap-4">
              <div class="flex items-center">
                &#8203;
                <input type="checkbox" {{ $guest->badge->website ? 'checked' : '' }} disabled
                  class="size-4 rounded border-gray-300" id="Option1" />
              </div>
            </label>
          </td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">
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
          </td>

        </tr>
      @endforeach

    </tbody>
  </table>
</div>
