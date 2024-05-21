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

function updateImage($conn, $imageName, $newImage) {
    $sql = "UPDATE images SET image=? WHERE image_name=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sb", $newImage, $imageName);
    $stmt->execute();
}

$image1 = getImageByName($conn, 'messi2019');
$image2 = getImageByName($conn, 'messibarca');
$image3 = getImageByName($conn, 'Brando3');
$image4 = getImageByName($conn, 'Brando1');

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <script src="ajax.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/png" href="icon.png"/>
        
</head>
<body class="page-transition"></body>
<body>
    <div id="cursor"></div>
    <header>
        <h1>Gallery</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php" class="active">Gallery</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main class="active-page">
        <!-- Konten utama -->
    </main>

    <main>
        <div class="gallery">
            <?php if($image1): ?>
                <img src="<?php echo $image1; ?>" alt="Gambar 1">
            <?php endif; ?>
            <?php if($image2): ?>
                <img src="<?php echo $image2; ?>" alt="Gambar 2">
            <?php endif; ?>
            <?php if($image3): ?>
                <img src="<?php echo $image3; ?>" alt="Gambar 3">
            <?php endif; ?>
            <?php if($image4): ?>
                <img src="<?php echo $image4; ?>" alt="Gambar 4">
            <?php endif; ?>

        </div>
        
    </main>

    <script>
        // Memuat konten utama menggunakan AJAX saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            loadContent('gallery-content.html', function(response) {
                document.getElementById('main-content').innerHTML = response;
            });
        });
    </script>

    <script src="main.js"></script>

    <script>
        document.getElementById('update-image-form').addEventListener('submit', function(event) {
            event.preventDefault();
            var imageName = document.getElementById('image-name').value;
            var newImage = document.getElementById('new-image').files[0];
            updateImage($conn, imageName, newImage);
            window.location.reload();
        });
    </script>

</body>
</html>