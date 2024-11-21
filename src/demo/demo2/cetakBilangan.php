<?php
function cetakBilangan($n) {
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 4 == 0 && $i % 6 == 0) {
            echo "Pemrograman Website 2024<br>";
        } elseif ($i % 5 == 0) {
            echo "2024<br>";
        } elseif ($i % 4 == 0) {
            echo "Pemrograman<br>";
        } elseif ($i % 6 == 0) {
            echo "Website<br>";
        } else {
            echo "$i<br>";
        }
    }
}

// Meminta input dari pengguna menggunakan form
if (isset($_POST['submit'])) {
    $n = (int)$_POST['number'];
    if ($n > 0) {
        cetakBilangan($n);
    } else {
        echo "Masukkan bilangan bulat positif.<br>";
    }
}
?>

<!-- Form HTML untuk menerima input dari pengguna -->
<form method="post">
    <label>Masukkan bilangan bulat positif:</label>
    <input type="number" name="number" min="1" required>
    <button type="submit" name="submit">Submit</button>
</form>
