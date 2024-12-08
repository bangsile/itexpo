<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Tambah Admin') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
          <form action="{{ route('store-admin') }}" method="POST" class="mt-6 space-y-6">
            @csrf
            <input type="hidden" name="role" value="admin">
            <div>
              <x-input-label for="name" :value="__('Nama')" />
              <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required
                autocomplete="name" />
              <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
              <x-input-label for="email" :value="__('Username')" />
              <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" required
                autocomplete="username" />
              <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <div class="mt-4">
              <x-input-label for="password" :value="__('Password')" />

              <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password"
                name="password" required autocomplete="new-password" />

              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
              <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

              <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                type="password" name="password_confirmation" required autocomplete="new-password" />

              <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div>
              <label for="stand" class="block text-sm font-medium text-gray-900"> Stand </label>

              <select name="stand" id="stand"
                class="mt-1.5 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm">
                <option value="" selected disabled>Pilih Stand</option>
                <option value="Website">Website</option>
                <option value="Networking">Networking</option>
                <option value="IoT">Internet of Things (IoT)</option>
                <option value="Game">Game</option>
                <option value="Mobile">Mobile</option>
                <option value="Cyber">Cyber Security</option>
                <option value="Multimedia">Multimedia</option>
                <option value="GIS">Geographic Information System (GIS)</option>
                <option value="Troubleshooting">Troubleshooting</option>
              </select>
            </div>


            <div class="flex items-center gap-4">
              <x-primary-button>{{ __('Simpan') }}</x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
