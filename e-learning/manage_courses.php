<?php
include 'includes/db.php';

$query = "SELECT * FROM courses ORDER BY id DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kursus</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <a href="index.php">e-Learning</a>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="manage_courses.php">Manage Kursus</a></li>
            <li><a href="#">Tentang</a></li>
            <li><a href="#">Kontak</a></li>
        </ul>
    </nav>

    <!-- Header -->
    <header>
        <h1>Manajemen Kursus</h1>
        <a href="add_course.php" class="btn-primary">Tambah Kursus Baru</a>
    </header>

    <!-- Main Content -->
    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                    <tr>
                        <td><?php echo $course['id']; ?></td>
                        <td><?php echo htmlspecialchars($course['title']); ?></td>
                        <td>
                            <?php if ($course['image']): ?>
                                <img src="uploads/<?php echo $course['image']; ?>" alt="Gambar Kursus" style="max-width: 100px;">
                            <?php else: ?>
                                <p>Tanpa Gambar</p>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="view_course.php?id=<?php echo $course['id']; ?>" class="btn-view">Lihat</a>
                            <a href="edit_course.php?id=<?php echo $course['id']; ?>" class="btn-edit">Edit</a>
                            <a href="delete_course.php?id=<?php echo $course['id']; ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus kursus ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 e-Learning. All rights reserved.</p>
    </footer>
</body>
</html>
