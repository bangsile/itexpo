<div id="result"></div>

<div class="flex justify-center">
  <div id="reader" class="w-[500px]">

  </div>
</div>


<div id="result"></div>
<h1>KOTJAK</h1>

<div class="flex justify-center">
  <div id="reader" class="w-[500px]">

  </div>
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
    document.getElementById("result").innerHTML = decodedText;
  }
</script>
