<?php
include 'includes/db.php';

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
    <title>Detail Kursus</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Detail Kursus</h1>
    </header>

    <div class="course-detail">
        <h2><?php echo htmlspecialchars($course['title']); ?></h2>
        <p><?php echo nl2br(htmlspecialchars($course['description'])); ?></p>
    </div>
</body>
</html>
