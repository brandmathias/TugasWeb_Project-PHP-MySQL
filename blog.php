<?php
$conn = new mysqli("localhost:3308", "root", "", "portofolio");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getImageByName($conn, $imageName) {
    $sql = "SELECT image FROM images WHERE image_name='$imageName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return 'data:image/jpeg;base64,' . base64_encode($row['image']);
    } else {
        return null;
    }
}

$image1 = getImageByName($conn, 'messi2019');
$image2 = getImageByName($conn, 'messibarca');
$image3 = getImageByName($conn, 'Brando3');

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <script src="ajax.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/png" href="icon.png"/>
    
</head>
<body class="page-transition"></body>
<body>
    <div id="cursor"></div>
    <header>
        <h1>Blog</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="blog.php" class="active">Blog</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <article>
            <h2>Pentingnya Olahraga Bagi Kesehatan</h2>
            <img src="olahraga.jpg" alt="Gambar 1" width="848" height="565">
            <p>
                Olahraga merupakan salah satu aktivitas fisik yang penting untuk kesehatan. 
                Olahraga dapat membantu menjaga kesehatan tubuh, meningkatkan kebugaran, dan mencegah berbagai penyakit.
                Meskipun demikian, berdasarkan laporan Sport Development Index (SDI) tahun 2021, 
                hanya 35,7% penduduk Indonesia yang aktif berolahraga.Angka ini masih jauh di bawah standar yang ditetapkan oleh World Health Organization (WHO), yaitu 60%. 
                Rendahnya minat olahraga di Indonesia disebabkan oleh beberapa faktor, yaitu kurangnya kesadaran masyarakat akan pentingnya berolahraga untuk mejaga kesehatan, fasilitas 
                dan infrastruktur yang tidak memadai, dan kurangnya dukungan dari pemerintah maupun swasta dalam pengembangan olahraga.

                Olahraga memiliki banyak manfaat bagi kesehatan masyarakat, diantaranya menjaga kesehatan jantung dan pembuluh darah. Olahraga dapat membantu menurunkan tekanan darah, kolesterol, dan trigliserida. 
                Hal ini dapat mengurangi risiko penyakit jantung, stroke, dan penyakit pembuluh darah lainnya, meningkatkan kebugaran fisik. 
                Olahraga dapat membantu meningkatkan kekuatan otot, daya tahan, dan fleksibilitas. Hal ini dapat membantu meningkatkan kemampuan fisik untuk melakukan aktivitas sehari-hari. 
                Mencegah berbagai penyakit. Olahraga dapat membantu mencegah berbagai penyakit, seperti obesitas, diabetes, kanker, dan osteoporosis. Meningkatkan kualitas hidup. 
                Olahraga dapat membantu meningkatkan mood, mengurangi stres, dan meningkatkan rasa percaya diri.
            </p>
        </article>
        <article>
            <h2>Betapa Bahayanya AI</h2>
            <img src="bahayaai.jpeg" alt="Gambar 2" width="848" height="565">
            <p>Kemajuan teknologi kecerdasan buatan (AI) telah menghadirkan berbagai kemungkinan baru dalam kehidupan manusia. 
               Meskipun demikian, ada bahaya yang muncul seiring dengan peningkatan penggunaan AI di berbagai bidang. Salah satu bahaya utama adalah potensi penggantian pekerjaan manusia oleh mesin yang cerdas. 
               Dengan kemampuan AI untuk melakukan tugas-tugas rutin dengan cepat dan akurat, banyak pekerjaan yang dulunya dilakukan oleh manusia bisa terancam. 
               Hal ini dapat menyebabkan tingkat pengangguran yang lebih tinggi dan ketidaksetaraan ekonomi yang lebih besar di masyarakat.

               Selain itu, kekhawatiran lain adalah potensi kesalahan atau kegagalan dalam sistem AI yang dapat berdampak serius pada kehidupan manusia. 
               Meskipun AI mampu melakukan tugas-tugas kompleks dengan kecepatan dan ketepatan yang tinggi, namun mereka juga rentan terhadap masalah teknis, seperti bias algoritma atau kurangnya pemahaman tentang konteks manusia. 
               Kesalahan semacam ini bisa memiliki konsekuensi yang fatal, terutama jika AI digunakan dalam bidang seperti perawatan kesehatan atau transportasi. 
               Oleh karena itu, penting untuk memperhatikan dan mengelola risiko-risiko ini dengan hati-hati saat mengembangkan dan menerapkan teknologi AI.
            </p>
        </article>
        <article>
            <h2>Mengenal Tarian Maengket Sebagai Tarian Tradisional Manado</h2>
            <img src="tarimaengket.jpg" alt="Gambar 2" width="848" height="565">
            <p>Tari Maengket merupakan salah satu tarian tradisional dari Sulawesi Utara yang memiliki sejarah panjang.
                Tarian ini berasal dari suku Minahasa yang tinggal di daerah sekitar Kota Manado. Tari Maengket merupakan bagian penting dari budaya dan tradisi masyarakat Minahasa.
                Sejarah tari Maengket dimulai dari masa lalu ketika suku Minahasa menggunakan tarian ini dalam upacara adat dan perayaan keagamaan.
                Tarian ini digunakan untuk mengiringi acara-acara seperti pernikahan, pemakaman, perayaan panen, dan lainnya. Tari Maengket juga menjadi sarana untuk mengungkapkan rasa syukur dan kebahagiaan atas hasil bumi yang melimpah.
                Tari Maengket lahir dari suatu tradisi budaya gotong-royong masyarakat di Minahasa dalam kegiatan agraris yaitu bercocok tanam.
                Para penari menggunakan gerakan yang halus dan lembut untuk menggambarkan keseimbangan dan keindahan alam. Mereka juga mengenakan pakaian adat yang kaya akan detail dan warna cerah.
                Selama bertahun-tahun, Tari Maengket terus berkembang dan menjadi bagian integral dari budaya Sulawesi Utara. Tarian tersebut juga sering dijadikan atraksi utama dalam festival budaya dan acara pariwisata di daerah Manado.
                Melalui Tari Maengket, masyarakat menjaga dan memperkuat warisan budaya mereka serta memperkenalkan keindahan dan keunikan budaya Sulawesi Utara kepada dunia.
            </p>
        </article>

        <script>
            // Memuat konten utama menggunakan AJAX saat halaman dimuat
            document.addEventListener('DOMContentLoaded', function() {
                loadContent('blog-content.html', function(response) {
                    document.getElementById('main-content').innerHTML = response;
                });
            });
        </script>

    </main>

    <script src="main.js"></script>


</body>
</html>
