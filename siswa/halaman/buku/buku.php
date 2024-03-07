<h3>
    <center>Daftar Buku Perpustakaan</center>

    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</h3>
<p>
<h3>
    <center>Perpustakaan Digital</center>
</h3>
<!----cari---->
<?php
include "../koneksi.php";
?>



<!--awal table-->
<table id="maintable" class="display compact cell-border" cellspacing="0" width="100%">
    <thead>
    <!--awal header table-->
    <tr style="background-color: bluesky;">
    <td width="5%" align="center">No</td>
        <td width="5%" align="center">ID Buku</td>
        <td width="30%" align="center">Judul</td>
        <td width="20%" align="center">Pengarang</td>
        <td width="20%" align="center">Penerbit</td>
    </tr>
    </thead>
    <tbody>
    <!--akhir header table-->

    <?php
        //koneksi ke database melalui koneksi.php
        include "../koneksi.php";
        
          //ambil data dari tabel tbl_siswa
          if(isset($_POST['cari'])){

            $kunci = $_POST['cari'];
            $ambildata =mysqli_query($sambung,"SELECT * FROM tbl_buku where idbuku like '%$kunci%' or  judul like '%$kunci%' or pengarang like '%$kunci%' or penerbit like '%$kunci%'");
            }else{   
           
            $ambildata     = mysqli_query($sambung,"SELECT * FROM tbl_buku");
            }
            $nomor =1;
    
            while ($tampildata = mysqli_fetch_array($ambildata)) {
        ?>

        <!--awal menampilkan data dari tabel buku ke halaman web-->
        <tr>
            <td> <?php echo $nomor++?></td>
            <td> <?php echo $tampildata['idbuku'] ?></td>
            <td> <?php echo $tampildata['judul'] ?></td>
            <td> <?php echo $tampildata['pengarang']?></td>
            <td> <?php echo $tampildata['penerbit']?></td>
        </tr>
        <?php
        }
    ?>

<tfoot style="background-color: #c0c0c0; color: #ffffff; font-size: 0.9em; ">
    <tr>
    <td width="5%" align="center"></td>
        <td width="5%" align="center"></td>
        <td width="30%" align="center"></td>
        <td width="20%" align="center"></td>
        <td width="20%" align="center"></td>
        
    </tr>
    </tfoot>
        </tbody>
        <!--akhir menampilkan data dari tabel buku ke halaman web-->

 
</table>

<script type="text/javascript" src="../js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/app.js"></script>
<!--akhir table-->