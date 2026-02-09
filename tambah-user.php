<?php 

require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $username = $_POST["username"];
    $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
    $role = $_POST["role"]; // ambil role dari form


    $sql = "INSERT INTO pengguna(username,password,role)values (?,?,?)";
    $row = $koneksi ->execute_query($sql,[$username,$password,$role]);

    if ($row) {
        header("location:admin.php");
    }

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="login-container">
    <h2>Tambah User</h2>
    <form action="" method="POST" class="login-form">
        
        <input type="text" name="username" placeholder="Username" required>
        
        <input type="password" name="password" placeholder="Password" required>

        <select name="role" required>
            <option value="">-- Pilih Role --</option>
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
        </select>

        <button type="submit" class="btn-login">Tambah</button>
        <a href="admin.php" class="btn-submit">Keluar</a>
    </form>
</div>
    </form>

</body>
</html>