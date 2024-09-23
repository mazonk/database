<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id = :id";
$stmt = $con->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

header('Location: index.php');
?>
