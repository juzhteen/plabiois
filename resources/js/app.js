require('./bootstrap');

import 'alpinejs';
import QrScanner from 'qr-scanner';

const qrScanner = new QrScanner(
  document.querySelector(".attendance-qr-scanner"),
  result => 
    Livewire.emit('save_attendance', result.data),
  {
    maxScansPerSecond: 1,
    highlightScanRegion: true,
    highlightCodeOutline: true,
  }
);

const qr_scanner_start = document.querySelector(".qr-scanner-start");
const qr_scanner_stop = document.querySelector(".qr-scanner-stop");

qr_scanner_start.addEventListener("click", function(){
  qrScanner.start();
})

qr_scanner_stop.addEventListener("click", function(){
  qrScanner.stop();
})

const camList = document.getElementById('cam-list');

qrScanner.start().then(() => {
  QrScanner.listCameras(true).then(cameras => cameras.forEach(camera => {
      const option = document.createElement('option');
      option.value = camera.id;
      option.text = camera.label;
      camList.add(option);
  }));
});

camList.addEventListener('change', event => {
  qrScanner.setCamera(event.target.value);
});