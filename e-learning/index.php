<?php
include 'includes/db.php';

$query = "SELECT * FROM courses";
$stmt = $conn->prepare($query);
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-Learning</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js" defer></script>
    <style>
        /* Hero Section Styles */
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 40px 20px;
            background-color: #f5f5f5;
            margin-bottom: 20px;
        }
        .hero-content {
            flex: 1;
            max-width: 50%;
            padding-right: 20px;
        }
        .hero-content h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #333;
        }
        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #666;
        }
        .btn-primary {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .hero-image {
            flex: 1;
            max-width: 50%;
            text-align: center;
        }
        .hero-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
    </style>
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

    <!-- Main Content -->
    <main class="main-content">
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-content">
                <h1>Selamat datang di Platform e-Learning</h1>
                <p>Temukan berbagai kursus yang dapat membantu Anda dalam pembelajaran.</p>
                <a href="#courses" class="btn-primary">Lihat Kursus</a>
            </div>
            <div class="hero-image">
                <img src="../e-learning/assets/images/Innovation-amico.png" alt="Innovation Illustration">
            </div>
        </section>

        <!-- Courses Section -->
        <section id="courses" class="course-list">
            <h2>Kursus Terbaru</h2>
            <div class="course-cards">
                <?php foreach ($courses as $course): ?>
                    <div class="course-card">
                        <h3><?php echo htmlspecialchars($course['title']); ?></h3>
                        
                        <!-- Tampilkan Gambar -->
                        <?php if (!empty($course['image'])): ?>
                            <img src="uploads/<?php echo htmlspecialchars($course['image']); ?>" alt="Gambar <?php echo htmlspecialchars($course['title']); ?>" style="max-width: 100%; height: auto; margin-bottom: 10px;">
                        <?php else: ?>
                            <img src="assets/img/placeholder.png" alt="Gambar tidak tersedia" style="max-width: 100%; height: auto; margin-bottom: 10px;">
                        <?php endif; ?>
                        
                        <a href="view_course.php?id=<?php echo $course['id']; ?>" class="btn">Lihat Detail</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 e-Learning. All rights reserved.</p>
    </footer>
</body>
</html>
