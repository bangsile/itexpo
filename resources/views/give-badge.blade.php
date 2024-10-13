<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Berikan Lencana') }}
      <div class="inline-block px-3 py-1 ms-3 bg-blue-200 font-semibold text-base rounded ">
        {{ auth()->user()->admin->stand }}
      </div>
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <div>
            @if (!session('pengunjung'))
              <h1 class="text-center py-5 font-semibold">Scan QR Pengunjung</h1>
              <div class="flex justify-center">
                <div id="reader" class="w-[400px]">

                </div>
              </div>
            @endif

            @if (session('error'))
              <h1 class="text-center py-5 font-semibold text-red-600">{{ session('error') }}</h1>
            @endif

            @if (session('pengunjung'))
              <div class="py-5">
                <h1 class="text-center font-semibold text-emerald-600">Pengunjung Ditemukan!</h1>
                <h1 class="text-center font-semibold text-lg py-2">{{ session('pengunjung')->name }}</h1>
              </div>
            @endif

            <div class="flex justify-center flex-col items-center gap-4">
              @if (session('pengunjung'))
                <form action="{{ route('update-badge') }}" method="POST">
                  @csrf
                  <x-text-input id="qr-input" type="hidden" name="id" value="{{ session('pengunjung')->id }}" />
                  <x-text-input id="qr-input" type="hidden" name="stand"
                    value="{{ auth()->user()->admin->stand }}" />
                  <x-primary-button id="cek" type="submit">Submit</x-primary-button>
                </form>
              @else
                <form action="{{ route('cek-pengunjung') }}" method="POST">
                  @csrf
                  <x-text-input id="qr-input" type="hidden" value="" name="id" />
                  <x-secondary-button id="cek" type="submit" class="my-5" disabled>Cek
                    Pengunjung</x-secondary-button>
                </form>
              @endif
            </div>

            <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
            <script>
              const html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", {
                  fps: 10,
                  qrbox: 250
                },
                /* verbose= */
                false
              );
              html5QrcodeScanner.render(onScanSuccess);

              function onScanSuccess(decodedText, decodedResult) {
                document.getElementById("qr-input").value = decodedText;
                document.getElementById("cek").disabled = false;
              }
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
