<?php
include 'db.php';
?>

<link rel="stylesheet" href="style.css">
<div class="navbar">
    <a href="dashboard.php">الرئيسية</a>
</div>
<h2 style="text-align:center">الأخبار المحذوفة</h2>
<table>
    <tr>
        <th>العنوان</th>
        <th>التفاصيل</th>
    </tr>
<?php
$result = $connection->query("SELECT * FROM news WHERE deleted = 1");

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $title = htmlspecialchars($row['title'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        $details = nl2br(htmlspecialchars($row['details'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'));

        echo "<tr>
                <td>{$title}</td>
                <td>{$details}</td>
              </tr>";
    }
} else {
    echo '<tr><td colspan="2" style="text-align:center">لا توجد أخبار محذوفة</td></tr>';
}
?>
</table>
