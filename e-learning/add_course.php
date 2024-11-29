<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Handle image upload
    $image = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = basename($_FILES['image']['name']);
        $targetPath = "uploads/" . $image;
        move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
    }

    $query = "INSERT INTO courses (title, description, image) VALUES (:title, :description, :image)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image);
    $stmt->execute();

    header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kursus</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Tambah Kursus Baru</h1>
    </header>

    <form method="POST" action="" enctype="multipart/form-data">
        <label for="title">Judul Kursus</label>
        <input type="text" name="title" required>

        <label for="description">Deskripsi Kursus</label>
        <textarea name="description" required></textarea>

        <label for="image">Gambar Kursus</label>
        <input type="file" name="image" accept="image/*" required>

        <button type="submit">Tambah Kursus</button>
    </form>

</body>
</html>

