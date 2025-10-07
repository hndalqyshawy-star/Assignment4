<?php
include 'db.php';
?>

<link rel="stylesheet" href="style.css">
<div class="navbar">
    <a href="dashboard.php">الرئيسية</a>
</div>
<h2 style="text-align:center">قائمة الفئات</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>الرقم</th>
        <th>الإسم</th>
    </tr>
<?php
$result = $connection->query("SELECT * FROM categories");

if($result && $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $id = htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');
        $name = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');

        echo "<tr>
                <td>{$id}</td>
                <td>{$name}</td>
              </tr>"; 
    }
} else {
    echo '<tr><td colspan="2" style="text-align:center">لا توجد فئات</td></tr>';
}
?>
</table>
