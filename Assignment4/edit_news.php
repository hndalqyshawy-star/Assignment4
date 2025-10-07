<?php
include 'db.php';

$id = intval($_GET['id']);

if(isset($_POST['update'])){
    $title = $_POST['title'];
    $details = $_POST['details'];

    $stmt = $connection->prepare("UPDATE news SET title = ?, details = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $details, $id);
    $stmt->execute();

    echo "<p style='text-align:center; color:green'>تم التعديل</p>";
}

$stmt2 = $connection->prepare("SELECT title, details FROM news WHERE id = ?");
$stmt2->bind_param("i", $id);
$stmt2->execute();
$result = $stmt2->get_result();
$news = $result->fetch_assoc();
?>

<link rel="stylesheet" href="style.css">
<div class="navbar">
    <a href="dashboard.php">الرئيسية</a>
</div>
<form method="post">
    <h2>تعديل الخبر</h2>
    <input type="text" name="title" value="<?php echo htmlspecialchars($news['title'], ENT_QUOTES, 'UTF-8'); ?>" required>
    <textarea name="details" required><?php echo htmlspecialchars($news['details'], ENT_QUOTES, 'UTF-8'); ?></textarea>
    <button type="submit" name="update">تعديل</button>
</form>
