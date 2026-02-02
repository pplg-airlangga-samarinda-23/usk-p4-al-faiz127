<?php
session_start();
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM pengguna WHERE username = ?";
    $result = $koneksi->execute_query($sql, [$username]);
    $row = $result->fetch_assoc();

    if ($row && password_verify($password, $row['password'])) {

        $_SESSION['login'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        if ($row['role'] === 'admin') {
            header("Location: admin.php");
        } elseif ($row['role'] === 'petugas') {
            header("Location: petugas.php");
        } else {
            echo "Role tidak valid";
        }
        exit;

    } else {
        echo "<script>alert('username atau password salah');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h2>Login</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>

</body>
</html>
