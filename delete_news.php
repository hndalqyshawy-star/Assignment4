<?php
include 'db.php';
$id= $_GET['id'];

$connection-> query("UPDATE news SET deleted=1 WHERE id=$id");
header("location:list_news.php");
?>