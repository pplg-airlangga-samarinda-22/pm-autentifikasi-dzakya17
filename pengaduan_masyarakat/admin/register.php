<?php
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nik = $_POST['nik'];

    $sql = "SELECT * FROM masyarakat WHERE nik=?";
    $cek = $koneksi->execute_query($sql, [$nik]);

    if (mysqli_num_rows($cek) == 1) {
        echo "<script>alert('Nik sudah digunakan')</script>";
    } else {
        $nama = $_POST['nama'];
        $telepon = $_POST['telepon'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "INSERT INTO masyarakat SET nik=?, nama=?, telp=?, username=?, password=?";
        $koneksi->execute_query($sql, [$nik, $nama, $telepon, $username, $password]);
        echo "<script>alert('Pendaftaran berhasil')</script>";
        header("location:login.php");

    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registrasi</title>
    </head> 
    <body>
        <h1>Registrasi Pengguna Baru</h1>
        <form action="" method="post">
            <div class="form-item">
                <label for="nik">NIK</label>
                <input type="type" name="nik" id="nik">
            </div>
            <div>
                <div class="form-item">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama">
            </div>
            <div>
                <div class="form-item">
                    <label for="telepon">Telepon</label>
                    <input type="tel" name="telepon" id="telepon">
            </div>
            <div>
                <div class="form-item">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
            </div>
            <div>
                <div class="form-item">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
            </div>
            <button type="submit">Register</button>
        </form>
        <a href="login.php">Batal</a>
    </body>
</html>