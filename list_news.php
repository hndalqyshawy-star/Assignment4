<?php
include 'db.php';
?>
<link rel="stylesheet" href="style.css">
<div class="navbar">
    <a href="dashboard.php"> الرئيسية</a>
</div>
<h2 style="text-align:center">  قائمة الأخبار</h2>

<table>
    <tr>
        <th>العنوان</th>
        <th>الفئة</th>
        <th>التفاصيل</th>
        <th>الصورة</th>
        <th>إجراءات</th>
    </tr>

<?php
$result= $connection-> query("SELECT n.*, c.name as category FROM news n JOIN categories c ON n.category_id= c.id WHERE n.deleted=0");
while($row= $result-> fetch_assoc()){
    echo "<tr>";
    echo "<td>".$row['title']."</td>";
    echo "<td>".$row['category']."</td>";
    echo "<td>".$row['details']."</td>";
    echo "<td>".($row['image']?"<img src="".$row['image'].""width='80'>":"")."</td>";
    echo "<td>
        <a class='action-btn edit-btn' href='edit_news.php?' id=".$row['id']."">تعديل</a>
        <a class='action-btn delete-btn' href='delete_news.php?' id=".$row['id']."">حذف</a>
    </td>";
    echo"</tr>";
}
?>
</table>