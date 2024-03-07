<h3>
    <center>Daftar Peminjaman Buku Perpustakaan</center>

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
        <td width="5%" align="center">ID Pinjam</td>
        <td width="15%" align="center">Petugas</td>
        <td width="20%" align="center">Siswa</td>
        <td width="20%" align="center">Judul Buku</td>
        <td width="10%" align="center">Waktu Pinjam</td>
        <td width="20%" align="center">Aksi</td>
    </tr>
    </thead>
    <tbody>
    <!--akhir header table-->

    <?php
        //koneksi ke database melalui koneksi.php
        include "../koneksi.php";
        

        //menentukan banyak nya data yang akan ditampilkan dalam 1 halaman
        $batas   = 10; 
        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
        $mulai  = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
        
        //ambil data dari tabel tbl_peminjaman., 
        $ambildata1     = mysqli_query($sambung,"SELECT * FROM tbl_pinjam INNER JOIN tbl_petugas ON tbl_petugas.idpetugas=tbl_pinjam.idpetugas INNER JOIN tbl_siswa ON tbl_siswa.idsiswa=tbl_pinjam.idsiswa INNER JOIN tbl_buku ON tbl_buku.idbuku=tbl_pinjam.idbuku
        LIMIT $mulai, $batas");
        $ambildata2     = mysqli_query($sambung,"SELECT * FROM tbl_pinjam INNER JOIN tbl_petugas ON tbl_petugas.idpetugas=tbl_pinjam.idpetugas INNER JOIN tbl_siswa ON tbl_siswa.idsiswa=tbl_pinjam.idsiswa INNER JOIN tbl_buku ON tbl_buku.idbuku=tbl_pinjam.idbuku");
        $jumlahdata     = mysqli_num_rows($ambildata2);  
        $jumlahhalaman  = ceil($jumlahdata / $batas);
        $nomor =$mulai+1;

        while ($tampildata = mysqli_fetch_array($ambildata2)) {
    ?>

        <!--awal menampilkan data dari tabel peminjaman ke halaman web-->
        <tr>
            <td> <?php echo $nomor++?></td>
            <td> <?php echo $tampildata['idpinjam'] ?></td>
            <td> <?php echo $tampildata['namapetugas'] ?></td>
            <td> <?php echo $tampildata['namasiswa']?></td>
            <td> <?php echo $tampildata['judul']?></td>
            <td> <?php echo $tampildata['waktupinjam']?></td>
            <td align="center">
                <a href="../admin/index.php?page=pinjamubah&idpinjam=<?php echo $tampildata['idpinjam'];?>">
                    <button>Edit</button>
                </a>
                |
                <a href="halaman/pinjam/pinjamhapus.php?idpinjam=<?php echo $tampildata['idpinjam'];?>" onclick="return confirm('Apa Anda yakin akan menghapus Data Peminjaman?')">
                    <button>Delete</button>
                </a>
            </td>
        </tr>
        <!--akhir menampilkan data dari tabel buku ke halaman web-->

    <?php
        }
    ?>
    <tfoot style="background-color: #c0c0c0; color: #ffffff; font-size: 0.9em; ">
    <tr>
    <td width="5%" align="center">No</td>
        <td width="15%" align="center"></td>
        <td width="15%" align="center"></td>
        <td width="20%" align="center"></td>
        <td width="20%" align="center"></td>
        <td width="10%" align="center"></td>
        <td width="20%" align="center"></td>
    </tr>
    </tfoot>
        </tbody>
</table>

<script type="text/javascript" src="../js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../js/jszip.min.js"></script>
<script type="text/javascript" src="../js/pdfmake.min.js"></script>
<script type="text/javascript" src="../js/vfs_fonts.js"></script>
<script type="text/javascript" src="../js/buttons.html5.min.js"></script>
<script type="text/javascript" src="../js/buttons.print.min.js"></script>
<script type="text/javascript" src="../js/app.js"></script>
<script type="text/javascript" src="../js/jquery.mark.min.js"></script>
<script type="text/javascript" src="../js/datatables.mark.js"></script>
<script type="text/javascript" src="../js/buttons.colVis.min.js"></script>
<!--akhir table-->

<!--awal menentukan banyaknya halaman pagination-->
<?php
    $ambildata2 = mysqli_query($sambung, "select * from tbl_buku");
    $jumlahdata = mysqli_num_rows($ambildata2);
    $jumlahhalaman = ceil($jumlahdata/$batas);
?>
<!--akhir menentukan banyaknya halaman pagination-->

<p>

<!--awal navigasi pagination-->
<div align="center">
    <?php 
        for ($i=1; $i<=$jumlahhalaman; $i++) 
        { 
    ?>
        <a href="../admin/index.php?page=pinjam&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

    <?php 
        } 
    ?>
</div>
<!--akhir navigasi pagination-->