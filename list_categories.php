<?php
include 'db.php';
?>

<link rel="stylesheet" href="style.css">
<div class="navbar">
    <a href="dashboard.php"> الرئيسية</a>
</div>
<h2 style="text-align:center"> قائمة الفئات</h2>
<table>
    <tr>
        <th>الرقم</th>
    </tr>
    <tr>
        <th>الإسم</th>
    </tr>
<?php
$result= $connection-> query ("SELECT* FROM categories");
while($row= $result-> fetch_assoc()){
    echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['name']."</td>
        </tr>"; 
}
?>
</table>
