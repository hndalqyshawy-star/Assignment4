<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $connection->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if($user && password_verify($password, $user['password'])){
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
        exit(); 
    } else {
        echo "<p style='text-align:center; color:red'>بيانات الدخول غير صحيحة</p>";
    }
}
?>

<link rel="stylesheet" href="style.css">
<div class="navbar">
    <a href="creat account.php">إنشاء حساب</a>
    <a href="login.php">تسجيل الدخول</a>
</div>
<form method="post">
    <h2>تسجيل الدخول</h2>
    <input type="email" name="email" placeholder="البريد الإلكتروني" required>
    <input type="password" name="password" placeholder="كلمة المرور" required>
    <button type="submit" name="login">دخول</button>
</form>
