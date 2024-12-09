<div>
  <div>
    <form wire:submit="send">
      <!-- Name -->
      <div>
        <x-input-label for="name" :value="__('Nama (Opsional)')" />
        <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" autofocus
          autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>

      <!-- Stand -->
      <div class="mt-4">
        <x-input-label for="stand" :value="__('Stand')" />
        <select name="stand" wire:model="stand" id="stand" required
          class="mt-1.5 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-gray-700 sm:text-sm shadow-sm">
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
        <x-input-error :messages="$errors->get('stand')" class="mt-2" />
      </div>

      <!-- Message -->
      <div class="mt-4">
        <x-input-label for="message" :value="__('Pesan')" />
        <x-text-input wire:model="message" id="message" class="block mt-1 w-full" type="text" name="message"
          required autocomplete="message" />
        <x-input-error :messages="$errors->get('message')" class="mt-2" />
      </div>


      <div class="flex items-center justify-end mt-4">
        <x-secondary-button class="ms-4" type="button" onclick="window.history.back()">
          {{ __('Kembali') }}
        </x-secondary-button>
        <x-primary-button class="ms-4" type="submit">
          {{ __('Kirim') }}
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
