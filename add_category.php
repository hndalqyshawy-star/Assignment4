<?php
include 'db.php';

if(isset($_POST['add'])){
    $name= $_POST['name'];

    $stmt= $connection-> prepare("INSERT INTO categories (name) VALUES(?)");
    $stmt-> bind_param("s", $name);
    $stmt-> execute();

    echo"<p style='text-align:center, color:green' تمت إضافة الفئة</p>";
}
?>

<link rel="stylesheet" href="style.css">
<div class="navbar">
    <a href="dashboard.php"> الرئيسية</a>
</div>
<form method="post">
    <h2> إضافة فئة</h2>
    <input type="text" name="name" placeholder="إسم الفئة" required>
    <button type="submit" name="add">إضافة</button>
</form>