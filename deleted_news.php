<?php
include 'db.php';
?>

<link rel="stylesheet" href="style.css">
<div class="navbar">
    <a href="dashboard.php"> الرئيسية</a>
</div>
<h2 style="text-align:center">الأخبار المحذوفة</h2>
<table>
    <tr>
        <th>العنوان</th>
        <th>التفاصيل</th>
    </tr>
<?php
$result= $connection-> query ("SELECT* FROM news WHERE deleted=1");
while($row= $result-> fetch_assoc()){
    echo "<tr>
            <td>".$row['title']."</td>
            <td>".$row['details']."</td>
        </tr>"; 
}
?>
</table>