<?php
include 'includes/db.php';

$id = $_GET['id'];

$query = "DELETE FROM courses WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();

header("Location: index.php");
?>
