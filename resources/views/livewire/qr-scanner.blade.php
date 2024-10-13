<div>

  <h1 class="text-center py-5 font-semibold">Scan QR Pengunjung</h1>

  <div class="flex justify-center">
    <div id="reader" class="w-[400px]">

    </div>
  </div>


  {{-- <div id="result" class="text-center py-10 font-semibold text-lg"></div> --}}
  @if (session('error'))
    <h1 class="text-center py-10 font-semibold text-red-600">{{ session('error') }}</h1>
  @endif
  @if ($nama)
    <h1 class="text-center font-semibold text-emerald-600">Pengunjung Ditemukan!</h1>
    <h1 class="text-center font-semibold text-lg">{{ $nama }}</h1>
  @endif

  <h1 class="text-center font-semibold text-lg">{{ $qr_result }}</h1>
  <x-text-input wire:model.change="qr_result" id="qr-inpu" class="block w-full  md:max-w-md xl:max-w-xl" type="text"
    value="" name="id" placeholder="Cari produk..." />



  <div class="flex justify-center flex-col items-center gap-4">
    @if ($nama)
      <x-primary-button disabled>submit</x-primary-button>
    @else
      <form action="{{ route('cek-pengunjung') }}" method="POST">
        @csrf
        <x-text-input wire:model.change="qr_result" id="qr-input" class="block w-full  md:max-w-md xl:max-w-xl"
          type="text" value="" name="id" placeholder="Cari produk..." />
          <x-secondary-button id="cek" type="submit" disabled>Cek Pengunjung</x-secondary-button>
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
      //   document.getElementById("result").innerHTML = decodedText;
      document.getElementById("qr-input").value = decodedText;
      document.getElementById("qr-input").onchange = console.log("changed");
      document.getElementById("cek").disabled = false;


      console.log(`Code matched = ${decodedText}`, decodedResult);
    }
  </script>


</div>
