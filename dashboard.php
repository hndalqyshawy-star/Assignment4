<?php
session_start();
if(isset($_SESSION['user_id'])){
        header("location:login.php"), exit();
}
?>

<link rel="stylesheet" href="style.css">
<div class="navbar">
    <a href="dashboard.php"> الرئيسية</a>
    <a href="add_category.php"> إضافة فئة</a>
    <a href="list_categories.php"> عرض الفئات</a>
    <a href="add_news.php"> إضافة خبر</a>
    <a href="list_news.php"> عرض الأخبار</a>
    <a href="deleted_news.php"> الأخبار المحذوفة</a>
</div>
<h2 style="text-align:center">لوحة التحكم </h2>
