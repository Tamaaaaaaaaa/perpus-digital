<a href="index.php?page=petugas">Kembali ke Data Petugas</a>
<br /><br />
<?php
    include "../koneksi.php";
    $idpetugas = $_GET['idpetugas'];
    $ambildata = mysqli_query($sambung, "select * from tbl_petugas where idpetugas='$idpetugas'");
    while ($tampildata = mysqli_fetch_array($ambildata)) {
?>

    <form action="halaman/petugas/petugasubah_aksi.php" method="post" name="formubah">
        <table>
            <tr>
                
            </tr>

            <tr>
                <td>Nama Petugas</td>
                <td><input type="text" name="namapetugas" value="<?php echo $tampildata['namapetugas'] ?>"></td>
            </tr>

            <tr>
                <td>Hp</td>
                <td><input type="text" name="hp" value="<?php echo $tampildata['hp'] ?>"></td>
            </tr>

            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo $tampildata['username'] ?>"></td>
            </tr>

            <tr>
                <td>Password</td>
                <td><input type="text" name="password" value="<?php echo $tampildata['password'] ?>"></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="tombolubah" value="Ubah" onclick="return confirm('Apa Anda yakin akan mengubah data petugas?')">
            </tr>
        </table>
    </form>

<?php
}
?>