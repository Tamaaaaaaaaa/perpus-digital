<!DOCTYPE html>
<html>
    <head>
        <title>Perpustakaan | Digital</title>
        <link rel="stylesheet" href="style1.css">
    </head>
    <body>
    <h2><center>Selamat Datang di</center></h2>
        <h2><center>Aplikasi Perpustakaan Digital</center></h2>
    
<div id="container">
    
        <form method="post" action="login_aksi.php" name="formlogin">
            <table align="center">
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="nama" placeholder="Masukan Nama Pengguna"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="katakunci" placeholder="Masukan Password"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="tombollogin" value="Masuk"></td>
                    <td><a href="registrasi.php" input type="submit" name="tomboldaftar">Daftar</a></td>
                </tr>
            </table>
        </form>
        </div>
        <center>
     <?php
            if(isset($_GET['pesan']))
            {
                if($_GET['pesan']=='gagal')
                {
                    echo "<script>alert('Gagal Login, username atau password salah')</script>";
                }
                else
                if($_GET['pesan']=='logout')
                {
                    echo "<script>alert('Anda sudah logout')</script>";
                }
                if($_GET['pesan']=='belum_login')
                {
                    echo "Anda harus login dahulu untuk mengakses halaman admin";
                }
            }
        ?>
        </center>
    </body>
</html>