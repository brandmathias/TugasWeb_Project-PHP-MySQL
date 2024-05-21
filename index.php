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
    <title>Home</title>
    <script src="ajax.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/png" href="icon.png"/>

</head>
<body class="page-transition"></body>
<body>
    <div id="cursor"></div>
    <header>
    <h1>Home</h1>
        <nav>
            <ul>
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main class="active-page">
        <!-- Konten utama -->
    </main>

    <main>

        <section id="home">
            <h2><span>Hi, I'm</span> <strong>Brando Mathias</strong></h2>
            <h3></h3>
            <p>This is the homepage of my website for project.</p>
        </section>

        <aside>
            <div class="profile-picture" style="background-image: url('Brando2.jpeg');"></div>
            <div class="shape"></div> <!-- Elemen untuk shape -->
        </aside>

        <script>
            // Memuat konten utama menggunakan AJAX saat halaman dimuat
            document.addEventListener('DOMContentLoaded', function() {
                loadContent('main-content.html', function(response) {
                    document.getElementById('main-content').innerHTML = response;
                });
            });
        </script>


    </main>

    <footer>
        <p>&copy; 2024 Website Brando Mathias Zusriadi. All rights reserved.</p>
    </footer>

    <script src="main.js"></script>
    
</body>
</html>