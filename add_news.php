<?php
session_start(;)
include 'db.php';

if(isset($_POST['add'])){
    $title= $_POST['title'];
    $category= $_POST['category'];
    $details= $_POST['details'];
    $user_id= $_SESSION['user_id'];

    if(isset($_FILES['image'])&& $_FILES['image']['name'] !=""){
        $image="uploads/" .basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp-name'], $image);
    }
    $stmt= $connection-> prepare("INSERT INTO news (title, category_id, details, image, user_id) VALUES(?,?,?,?,?)");
    $stmt-> bind_param("sissi", $title, $category, $details, $image, $user_id);
    $stmt-> execute();

    echo"<p style='text-align:center, color:green' تمت إضافة الخبر</p>";
}
?>

<link rel="stylesheet" href="style.css">
<div class="navbar">
    <a href="dashboard.php"> الرئيسية</a>
</div>
<form method="post" enctype="multipart/form-data">
    <h2> إضافة خبر</h2>
    <input type="text" name="title" placeholder="العنوان" required>
    <select name="category">
        <?php
        $cats= $connection-> query("SELECT* FROM categories");
        while($c= $cats-> fetch_assoc()){
            echo"<option value="".$c['id'].>".$c['name']."</option>"
        }
        ?>
    </select>
    <textarea name="details" placeholder="التفاصيل">
    </textarea>
    <input type="file" name="image">
    <button type="submit" name="add">إضافة </button>
</form>