<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Handle image upload
    $image = $_POST['current_image'] ?? null; // Default to current image
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = basename($_FILES['image']['name']);
        $targetPath = "uploads/" . $image;
        move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
    }

    $query = "UPDATE courses SET title = :title, description = :description, image = :image WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: index.php");
}


$id = $_GET['id'];
$query = "SELECT * FROM courses WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$course = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kursus</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Edit Kursus</h1>
    </header>

    <form method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $course['id']; ?>">

        <label for="title">Judul Kursus</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($course['title']); ?>" required>

        <label for="description">Deskripsi Kursus</label>
        <textarea name="description" required><?php echo htmlspecialchars($course['description']); ?></textarea>

        <label for="image">Gambar Kursus</label>
        <input type="file" name="image" accept="image/*">
        <?php if ($course['image']): ?>
            <p>Gambar Saat Ini: <img src="uploads/<?php echo $course['image']; ?>" alt="Gambar Kursus" style="max-width: 150px;"></p>
        <?php endif; ?>

        <button type="submit">Simpan Perubahan</button>
    </form>

</body>
</html>
