// ajax.js

// Fungsi untuk membuat permintaan AJAX
function loadContent(url, callback) {
    var xhr = new XMLHttpRequest(); // Membuat objek XMLHttpRequest
    xhr.open('GET', url, true); // Membuka koneksi ke URL dengan metode GET

    // Menangani kejadian saat permintaan selesai
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400) { // Pastikan status HTTP adalah sukses
            var response = xhr.responseText; // Ambil respons teks
            callback(response); // Panggil fungsi callback dengan respons
        } else {
            console.error('Request failed: ' + xhr.status); // Tampilkan pesan kesalahan jika permintaan gagal
        }
    };

    // Menangani kesalahan saat melakukan permintaan
    xhr.onerror = function() {
        console.error('Request failed'); // Tampilkan pesan kesalahan jika terjadi kesalahan saat melakukan permintaan
    };

    xhr.send(); // Kirim permintaan
}