<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*" required>
        <input type="text" name="image_name" placeholder="Enter image name" required>
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    // Maksimal ukuran file (64MB)
    $maxFileSize = 64 * 1024 * 1024; // 64MB dalam byte

    // Periksa apakah file diunggah
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Periksa ukuran file
        if ($_FILES['image']['size'] > $maxFileSize) {
            die('File size exceeds the maximum limit of 64MB.');
        }

        // Koneksi ke database
        $conn = new mysqli('localhost:3308', 'root', '', 'portofolio');

        // Cek koneksi
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Cek kembali koneksi sebelum query
        if (!$conn->ping()) {
            die("Error: " . $conn->error);
        }

        // Ambil data gambar
        $imageName = $conn->real_escape_string($_POST['image_name']);
        $imageData = file_get_contents($_FILES['image']['tmp_name']);
        $imageDataEscaped = $conn->real_escape_string($imageData);

        // Query untuk memasukkan data gambar
        $sql = "INSERT INTO images (image, image_name) VALUES ('$imageDataEscaped', '$imageName')";

        if ($conn->query($sql) === TRUE) {
            echo "Image uploaded successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        die('Error uploading file.');
    }
}
?>
