<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Kelola Admin') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
          <form action="{{ route('update-admin', $user->email) }}" method="POST" class="mt-6 space-y-6">
            @csrf
            @method('PUT')
            <div>
              <x-input-label for="name" :value="__('Nama')" />
              <x-text-input value="{{ $user->name }}" id="name" name="name" type="text"
                class="mt-1 block w-full" required autocomplete="name" />
              <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
              <x-input-label for="email" :value="__('Username')" />
              <x-text-input value="{{ $user->email }}" id="email" name="email" type="text"
                class="mt-1 block w-full" required autocomplete="username" />
              <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <div>
              <label for="stand" class="block text-sm font-medium text-gray-900"> Stand </label>

              <select name="stand" id="stand"
                class="mt-1.5 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm">
                {{-- <option value="">Please select</option> --}}
                <option {{ $user->admin->stand == 'website' ? 'selected' : '' }} value="website">Website</option>
                <option {{ $user->admin->stand == 'iot' ? 'selected' : '' }} value="iot">IoT</option>
                <option {{ $user->admin->stand == 'mobile' ? 'selected' : '' }} value="mobile">Mobile</option>
                <option {{ $user->admin->stand == 'cyber' ? 'selected' : '' }} value="cyber">Cyber</option>
                <option {{ $user->admin->stand == 'multimedia' ? 'selected' : '' }} value="multimedia">Multimedia
                </option>
                <option {{ $user->admin->stand == 'gis' ? 'selected' : '' }} value="gis">GIS</option>
                <option {{ $user->admin->stand == 'game' ? 'selected' : '' }} value="game">Game</option>
                <option {{ $user->admin->stand == 'network' ? 'selected' : '' }} value="network">Network</option>
                <option {{ $user->admin->stand == 'troubleshoot' ? 'selected' : '' }} value="troubleshoot">Troubleshoot
                </option>
              </select>
            </div>


            <div class="flex items-center gap-4">
              <x-primary-button>{{ __('Simpan') }}</x-primary-button>
            </div>
          </form>
        </div>
      </div>

      <div class="mt-10 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
          <h2 class="text-lg font-medium text-gray-900 mb-5">
            {{ __('Password') }}
          </h2>

          {{-- <x-danger-button >{{ __('Reset Password') }}</x-danger-button> --}}

          <x-danger-button x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete Account') }}</x-danger-button>

          <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
            <form action="{{ route('reset-password', $user->email) }}" method="POST" class="p-6">
              @csrf
              @method('PUT')
              <h2 class="text-lg text-center font-medium text-gray-900">
                {{ __('Are you sure you want to reset password for this user?') }}
              </h2>


              <div class="mt-6 flex justify-center">
                <x-secondary-button x-on:click="$dispatch('close')">
                  {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                  {{ __('Reset') }}
                </x-danger-button>
              </div>
            </form>
          </x-modal>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
