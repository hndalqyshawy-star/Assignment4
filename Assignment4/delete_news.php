<?php
include 'db.php';

$id = $_GET['id'];
$id = intval($id);

$stmt = $connection->prepare("UPDATE news SET deleted = 1 WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: list_news.php");
exit();
?>
