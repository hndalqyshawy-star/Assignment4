<?php
include 'db.php';
?>

<link rel="stylesheet" href="style.css">
<div class="navbar">
    <a href="dashboard.php">الرئيسية</a>
</div>
<h2 style="text-align:center">قائمة الأخبار</h2>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>العنوان</th>
        <th>الفئة</th>
        <th>التفاصيل</th>
        <th>الصورة</th>
        <th>إجراءات</th>
    </tr>

<?php
$result = $connection->query("SELECT n.*, c.name as category FROM news n JOIN categories c ON n.category_id = c.id WHERE n.deleted = 0");

if($result && $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $id = intval($row['id']);
        $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
        $category = htmlspecialchars($row['category'], ENT_QUOTES, 'UTF-8');
        $details = nl2br(htmlspecialchars($row['details'], ENT_QUOTES, 'UTF-8'));
        $image = $row['image'] ? "<img src='".htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8')."' width='80'>" : "";

        echo "<tr>
                <td>{$title}</td>
                <td>{$category}</td>
                <td>{$details}</td>
                <td>{$image}</td>
                <td>
                    <a class='action-btn edit-btn' href='edit_news.php?id={$id}'>تعديل</a>
                    <a class='action-btn delete-btn' href='delete_news.php?id={$id}'>حذف</a>
                </td>
              </tr>";
    }
} else {
    echo '<tr><td colspan="5" style="text-align:center">لا توجد أخبار</td></tr>';
}
?>
</table>
