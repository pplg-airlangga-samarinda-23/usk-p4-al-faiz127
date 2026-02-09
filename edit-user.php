<?php
require 'koneksi.php';


$id = $_GET['id'] ?? null;
if (!$id) {
    header("location:admin.php");
    exit;
}
$sql = "SELECT * FROM pengguna WHERE id = ?";
$user = $koneksi->execute_query($sql, [$id])->fetch_assoc();


if (!$user) {
    header("location:admin.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $role     = $_POST['role'];

    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE pengguna SET username=?, password=?, role=? WHERE id=?";
        $result = $koneksi->execute_query($sql, [$username, $password, $role, $id]);
    } 
    else {
        $sql = "UPDATE pengguna SET username=?, role=? WHERE id=?";
        $result = $koneksi->execute_query($sql, [$username, $role, $id]);
    }

    if ($result) {
        header("location:admin.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>

<div class="login-container">
    <h2>Edit User</h2>

    <form method="POST">
        <input 
            type="text" 
            name="username" 
            value="<?= htmlspecialchars($user['username']); ?>" 
            required
        >

        <input 
            type="password" 
            name="password" 
            placeholder="Password baru (kosongkan jika tidak diubah)"
        >

        <select name="role" required>
            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : ''; ?>>
                Admin
            </option>
            <option value="petugas" <?= $user['role'] == 'petugas' ? 'selected' : ''; ?>>
                Petugas
            </option>
        </select>

        <button type="submit">Update</button>
        <a href="admin.php">Batal</a>
    </form>
</div>

</body>
</html>
