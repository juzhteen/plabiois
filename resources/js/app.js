require("./bootstrap");

import "alpinejs";
import QrScanner from "qr-scanner";
import Snackbar from "node-snackbar";
import "turbolinks";

// var Turbolinks = require("turbolinks");
// Turbolinks.start();

if (window.location.pathname == "/attendance") {
    // const qrScanner = new QrScanner(
    //     document.querySelector(".attendance-qr-scanner"),
    //     (result) => Livewire.emit("save_attendance", result.data),
    //     {
    //         highlightScanRegion: true,
    //         highlightCodeOutline: true,
    //     }
    // );

    const camQrResult = document.getElementById("cam-qr-result");

    function setResult(label, result) {
        label.style.fontWeight = "bold";
        label.textContent = result.data;
        label.style.color = "teal";
        clearTimeout(label.highlightTimeout);
        Livewire.emit("save_attendance", result.data);
    }

    const qrScanner = new QrScanner(
        document.querySelector(".attendance-qr-scanner"),
        (result) => setResult(camQrResult, result),
        {
            onDecodeError: (error) => {
                camQrResult.textContent = error;
                camQrResult.style.color = "inherit";
            },
            maxScansPerSecond: 1
        }
    );

    // const qr_scanner_start = document.querySelector(".qr-scanner-start");
    // const qr_scanner_stop = document.querySelector(".qr-scanner-stop");

    // qr_scanner_start.addEventListener("click", function () {
    //     qrScanner.start();
    // });

    // qr_scanner_stop.addEventListener("click", function () {
    //     qrScanner.stop();
    // });

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
        text: "Resident record deleted successfully! Request records also deleted. If an employee, employee record and attendance are also deleted.",
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

window.addEventListener("employee_code_exists", (event) => {
    Snackbar.show({
        text: "The generated employee code already exists. Please click save again to generate a new one.",
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
    const notif_sound = document.getElementById('attendance-notification-sound');
    notif_sound.play();
});

window.addEventListener("attendance_out", (event) => {
    Snackbar.show({
        text: "Attendance: Time out recorded successfully!",
        pos: "top-right",
        duration: 10000,
    });
    const notif_sound = document.getElementById('attendance-notification-sound');
    notif_sound.play();
});

window.addEventListener("attendance_in_exists", (event) => {
    Snackbar.show({
        text: "Time in log already exists!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("attendance_out_exists", (event) => {
    Snackbar.show({
        text: "Time out log already exists!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("attendance_closed", (event) => {
    Snackbar.show({
        text: "Attendance failed. Time out already recorded.",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("barangay_certification_empty_fields", (event) => {
    Snackbar.show({
        text: "Field or fields are empty or Resident profile not found.",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("request_deleted", (event) => {
    Snackbar.show({
        text: "Request record deleted successfully!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("request_accepted", (event) => {
    Snackbar.show({
        text: "Request record accepted successfully!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("request_completed", (event) => {
    Snackbar.show({
        text: "Request record completed successfully!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("error_saving", (event) => {
    Snackbar.show({
        text: "There's an error saving the record. Please review your data and try again.",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("existing_document", (event) => {
    Snackbar.show({
        text: "Document with this title or file name already exists!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("document_saved", (event) => {
    Snackbar.show({
        text: "Document record saved successfully!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("document_deleted", (event) => {
    Snackbar.show({
        text: "Document record deleted successfully!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("user_deleted", (event) => {
    Snackbar.show({
        text: "User account deleted successfully!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("user_approved", (event) => {
    Snackbar.show({
        text: "User account approved successfully!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("employee_type_exists", (event) => {
    Snackbar.show({
        text: "Position or employee type already exists!",
        pos: "top-right",
        duration: 10000,
    });
});

window.addEventListener("nothing_to_update_document", (event) => {
    Snackbar.show({
        text: "Nothing to update!",
        pos: "top-right",
        duration: 10000,
    });
});

let download = document.getElementById("download_qr");
let qrcodeContainer = document.getElementById("qrcode");
let empCodeContainer = document.querySelector(".emp_code");

window.addEventListener("generate_qrcode", (event) => {
    let emp_code = event.detail.emp_code;

    if (emp_code) {
        qrcodeContainer.innerHTML = "";
        empCodeContainer.innerHTML = emp_code;
        new QRious({
            element: qrcodeContainer,
            value: emp_code,
            size: 150,
            padding: 10,
            level: 'H'
        });
    } else {
        alert("Error loading qrcode");
    }
});

 // Download QR

 download.addEventListener("click", function (e) {
    let link = document.createElement("a");
    link.download = empCodeContainer.innerHTML + ".png";
    link.href = qrcodeContainer.toDataURL();
    link.click();
    link.delete;
});