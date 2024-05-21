// Tambahkan event listener untuk setiap tautan navigasi
document.querySelectorAll('nav ul li a').forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault();
        const href = this.getAttribute('href');

        // Tambahkan kelas fade-out untuk memulai animasi transisi
        document.body.classList.add('fade-out');

        // Setelah animasi selesai, arahkan ke halaman yang dituju
        setTimeout(() => {
            window.location.href = href;
        }, 500); // Sesuaikan dengan durasi animasi CSS
    });
});

// Ambil elemen kursor
const cursor = document.getElementById('cursor');

// Fungsi untuk memperbarui posisi kursor
function updateCursorPosition(event) {
    cursor.style.left = event.clientX + 'px'; // Atur posisi horizontal kursor
    cursor.style.top = event.clientY + 'px'; // Atur posisi vertikal kursor

    // Cek apakah kursor berada di dalam halaman
    const isInsidePage = event.clientX > 0 && event.clientY > 0 &&
                         event.clientX < window.innerWidth &&
                         event.clientY < window.innerHeight;

    // Jika kursor berada di dalam halaman, tampilkan kursor, jika tidak, sembunyikan kursor
    if (isInsidePage) {
        cursor.style.display = 'block';
    } else {
        cursor.style.display = 'none';
    }
}

// Tambahkan event listener untuk mengikuti pergerakan kursor
document.addEventListener('mousemove', updateCursorPosition);

// Tambahkan event listener untuk menyembunyikan kursor saat keluar dari halaman
document.addEventListener('mouseleave', () => {
    cursor.style.display = 'none';
});

// Fungsi untuk mengatur animasi kursor saat dihover pada tautan
function setCursorAnimationOnLink(event) {
    const target = event.target;
    if (target.tagName.toLowerCase() === 'a') {
        cursor.classList.add('link-hover'); // Tambahkan kelas CSS saat dihover pada tautan
    } else {
        cursor.classList.remove('link-hover'); // Hapus kelas CSS saat kursor tidak dihover pada tautan
    }
}

// Tambahkan event listener untuk mengubah animasi kursor saat dihover pada tautan
document.addEventListener('mouseover', setCursorAnimationOnLink);
document.addEventListener('mouseout', setCursorAnimationOnLink);

// Ambil elemen h3
const h3Element = document.querySelector('h3');
const text = 'TEKNIK INFORMATIKA';
let charIndex = 0;

function typeWriter() {
    if (charIndex < text.length) {
        const char = text.charAt(charIndex);
        const span = document.createElement('span'); // Buat elemen span untuk setiap huruf
        span.textContent = char;
        h3Element.appendChild(span);
        charIndex++;

        // Tambahkan animasi perubahan warna teks ke setiap huruf
        span.style.animation = 'colorChange 1s ease forwards'; // Sesuaikan durasi dan timing function jika diperlukan
    } else {
        charIndex = 0;
        h3Element.textContent = ''; // Reset teks pada h3
    }
}

setInterval(typeWriter, 200); // Panggil fungsi typeWriter setiap 200ms



