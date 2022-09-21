require("./bootstrap");

import "alpinejs";
import QrScanner from "qr-scanner";
import Snackbar from "node-snackbar";
import "turbolinks";

// var Turbolinks = require("turbolinks");
// Turbolinks.start();

if (window.location.pathname == "/attendance") {
    const qrScanner = new QrScanner(
        document.querySelector(".attendance-qr-scanner"),
        (result) => Livewire.emit("save_attendance", result.data),
        {
            maxScansPerSecond: 1,
            highlightScanRegion: true,
            highlightCodeOutline: true,
        }
    );

    const qr_scanner_start = document.querySelector(".qr-scanner-start");
    const qr_scanner_stop = document.querySelector(".qr-scanner-stop");

    qr_scanner_start.addEventListener("click", function () {
        qrScanner.start();
    });

    qr_scanner_stop.addEventListener("click", function () {
        qrScanner.stop();
    });

    const camList = document.getElementById("cam-list");

    qrScanner.start().then(() => {
        QrScanner.listCameras(true).then((cameras) =>
            cameras.forEach((camera) => {
                const option = document.createElement("option");
                option.value = camera.id;
                option.text = camera.label;
                camList.add(option);
            })
        );
    });

    camList.addEventListener("change", (event) => {
        qrScanner.setCamera(event.target.value);
    });
}

// ========================== SNACKBARS

window.addEventListener("resident_updated", (event) => {
    Snackbar.show({
        text: "Resident record updated successfully!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("resident_added", (event) => {
    Snackbar.show({
        text: "Resident record added successfully!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("resident_deleted", (event) => {
    Snackbar.show({
        text: "Resident record deleted successfully!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("employee_type_updated", (event) => {
    Snackbar.show({
        text: "Employee type or position record updated successfully!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("employee_type_added", (event) => {
    Snackbar.show({
        text: "Employee type or position record added successfully!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("employee_type_deleted", (event) => {
    Snackbar.show({
        text: "Employee type or position record deleted successfully!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("employee_updated", (event) => {
    Snackbar.show({
        text: "Employee record updated successfully!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("employee_added", (event) => {
    Snackbar.show({
        text: "Employee record added successfully!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("employee_deleted", (event) => {
    Snackbar.show({
        text: "Employee record deleted successfully!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("attendance_in", (event) => {
    Snackbar.show({
        text: "Attendance: Time in recorded successfully!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("attendance_out", (event) => {
    Snackbar.show({
        text: "Attendance: Time out recorded successfully!",
        pos: "top-right",
        duration: 10000,
    });
});