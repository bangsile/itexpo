<div>
  <div>
    <form wire:submit="register">
      <!-- Name -->
      <div>
        <x-input-label for="name" :value="__('Nama')" />
        <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required
          autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>

      <!-- Gender -->
      <div class="mt-4">
        <x-input-label for="gender" :value="__('Jenis Kelamin')" />
        <select name="gender" wire:model="gender" id="gender" required
          class="mt-1.5 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-gray-700 sm:text-sm shadow-sm">
          <option value="Laki-Laki" selected>Laki-Laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
      </div>

      <!-- Address -->
      <div class="mt-4">
        <x-input-label for="address" :value="__('Alamat')" />
        <x-text-input wire:model="address" id="address" class="block mt-1 w-full" type="text" name="address"
          required autocomplete="address" />
        <x-input-error :messages="$errors->get('address')" class="mt-2" />
      </div>

      <!-- Phone -->
      <div class="mt-4">
        <x-input-label for="phone" :value="__('No. HP')" />
        <x-text-input wire:model="phone" id="phone" class="block mt-1 w-full" type="text" name="phone"
          autocomplete="phone" />
        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
      </div>

      <!-- Job -->
      <div class="mt-4">
        <x-input-label for="job" :value="__('Pekerjaan')" />

        <x-text-input wire:model="job" id="job" class="block mt-1 w-full" type="text" name="job" required
          autocomplete="job" />
        <x-input-error :messages="$errors->get('job')" class="mt-2" />
      </div>

      <div class="flex items-center justify-end mt-4">
        <x-secondary-button class="ms-4" type="button" onclick="window.history.back()">
          {{ __('Kembali') }}
        </x-secondary-button>
        <x-primary-button class="ms-4" type="submit">
          {{ __('Registrasi') }}
        </x-primary-button>
      </div>

    </form>
  </div>
  <div>
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
  </div>
</div>
