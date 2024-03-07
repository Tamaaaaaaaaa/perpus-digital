<?php
include "koneksi.php";
$ambildata =mysqli_query($sambung, "SELECT max(idpetugas) as kodeTerbesar FROM tbl_petugas");
$nomor = 1;
$tampildata = mysqli_fetch_array($ambildata);
$huruf = "3";
?>
<link rel="stylesheet" href="style1.css">
<form action="registrasi_aksi.php" method="post">
<center>
    <div id="container">
<table>
        

        <tr>
            <td>Nama</td>
            <td><input type="text" name="namapetugas" placeholder="Masukan Nama"></td>
        </tr>

        <tr>
            <td>Hp</td>
            <td><input type="text" name="hp" placeholder="Masukan No Hp"></td>
        </tr>

        <tr>
            <td>Username</td>
            <td><input type="text" name="username" placeholder="Masukan Username"></td>
        </tr>

        <tr>
            <td>Password</td>
            <td><input type="text" name="password" placeholder="Masukan password"></td>
        </tr>

        <tr>
            <td>Level</td>
            <td><input type="text" name="level" placeholder="Masukan Level"></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="tomboltambah" value="Daftar"> <input type="submit" name="tombolkembali" value="Kembali"></td>
        </tr>
    </table>
</div>
</center>
</form>