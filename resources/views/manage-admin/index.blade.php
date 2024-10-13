<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Kelola Admin') }}
    </h2>
  </x-slot>

  <div class="py-12">
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
        </div>
        <x-primary-button onclick="location.href = '{{ route('create-admin') }}'"
          class="w-auto text-center mx-auto sm:mx-0">Tambah</x-primary-button>
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
                  <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center">Stand</th>
                  <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"></th>
                </tr>
              </thead>

              <tbody class="divide-y divide-gray-200">
                @foreach ($users as $index => $user)
                  <tr class="odd:bg-white even:bg-slate-50">
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $index + 1 }}</td>
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-left">{{ $user->name }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-left">{{ $user->email }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">
                      <div class="inline-block bg-sky-300 font-semibold py-1 px-2 rounded text-xs">
                        {{ strtoupper($user->admin->stand) }}
                      </div>
                    </td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-left">
                      <x-secondary-button onclick="location.href = '{{ route('edit-admin', $user->email) }}'"
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
    </div>
  </div>

</x-app-layout>
