<?php
include 'db.php';

if(isset($_POST['creat'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $connection->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);
    $stmt->execute();

    echo "<p style='text-align:center; color:green'>تم إنشاء الحساب بنجاح</p>";
}
?>

<link rel="stylesheet" href="style.css">
<div class="navbar">
    <a href="creat account.php">إنشاء حساب</a>
    <a href="login.php">تسجيل الدخول</a>
</div>
<form method="post">
    <h2>إنشاء حساب</h2>
    <input type="text" name="name" placeholder="الإسم" required>
    <input type="email" name="email" placeholder="البريد الإلكتروني" required>
    <input type="password" name="password" placeholder="كلمة المرور" required>
    <button type="submit" name="creat">تسجيل</button>
</form>
