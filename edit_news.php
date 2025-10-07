<?php
include 'db.php';
$id= $_GET['id'];

if(isset($_POST['update'])){
    $title= $_POST['title'];
    $details= $_POST['details'];

    $stmt= $connection-> prepare("UPDATE news SET title=?, details=? WHERE id=?");
    $stmt-> bind_param("ssi", $title, $details, $id);
    $stmt-> execute();
    echo"<p style='text-align:center, color:green' تم التعديل</p>";
}
$news= $connection-> query("SELECT* FROM news WHERE id=$id")->fetch_assoc();
?>

<link rel="stylesheet" href="style.css">
<div class="navbar">
    <a href="dashboard.php"> الرئيسية</a>
</div>
<form method="post">
    <h2>تعديل الخبر </h2>
    <input type="text" name="title" value= "<?php echo $news['title'];?>">
    <textarea name="details"><?php echo $news['details'];?></textarea>
    <button type="submit" name="update">تعديل</button>
</form>