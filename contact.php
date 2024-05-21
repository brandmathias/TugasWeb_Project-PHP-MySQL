<?php
// Connect to the database
$conn = mysqli_connect("localhost:3308", "root", "", "Portofolio");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data and sanitize it
  $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
  $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
  $message = isset($_POST['message']) ? mysqli_real_escape_string($conn, $_POST['message']) : '';

  // Validate form data (basic validation example)
  if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Insert data into the database
    $sql = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";
    if (mysqli_query($conn, $sql)) {
      echo "Form submitted successfully.";
    } else {
      echo "Error submitting form: " . mysqli_error($conn);
    }
  } else {
    echo "Please fill in all fields correctly.";
  }
}

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
  <script src="ajax.js"></script>
  <link rel="stylesheet" href="style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="shortcut icon" type="image/png" href="icon.png"/>
</head>
<body class="page-transition">
  <div id="cursor"></div>
  <header>
    <h1>Contact</h1>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="contact.php"class="active">Contact</a></li>
      </ul>
    </nav>
  </header>

  <div class="personal-info-wrapper">
    <div class="personal-info">
      <h2>Personal Information</h2>
      <p>Address : Kelurahan Ranotana, Kecamatan Sario, Kota Manado, Sulawesi Utara, Postal Code 95116 Indonesia</p>
      <p>Brando Mathias Zusriadi</p>
      <p>Phone Number : (+62)81214906815</p>
      <div class="social-icons">
        <a href="https://www.instagram.com/brandmathias_"><i class='bx bxl-instagram'></i></a>
        <a href="https://www.facebook.com/Brando Zusriadi"><i class='bx bxl-facebook'></i></a>
        <a href="https://wa.me/6282188769679"><i class='bx bxl-whatsapp'></i></a>
      </div>
    </div>
  </div>

  <div class="contact-form">
    <h2>Contact Us</h2>
    <form action="contact.php" method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name"><br><br>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email"><br><br>
      <label for="message">Message:</label>
      <textarea id="message" name="message"></textarea><br><br>
      <input type="submit" value="Send">
    </form>
  </div>


  <p style="font-size: large; font-weight: bolder; bottom: 0; left: 0; width: 100%;">&copy; 2024 Website Brando Mathias Zusriadi. All rights reserved.</p>


  <script>
    // Memuat konten utama menggunakan AJAX saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
      loadContent('contact-content.html', function(response) {
        document.getElementById('main-content').innerHTML = response;
      });
    });
  </script>

<script src="main.js"></script>

</body>
</html>
