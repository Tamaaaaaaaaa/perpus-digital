<?php
    include "../../../koneksi.php";

    if(isset($_POST['tomboltambah'])){
         $idpinjam    = $_POST['idpinjam'];
        $idpetugas      = $_POST['idpetugas'];
        $idsiswa        = $_POST['idsiswa'];
        $idbuku         = $_POST['idbuku'];
        $waktupinjam    = $_POST['waktupinjam'];

        mysqli_query($sambung,"insert into tbl_pinjam (idpinjam,idpetugas,idsiswa,idbuku,waktupinjam) values ('$idpinjam','$idpetugas','$idsiswa','$idbuku','$waktupinjam')");
    }

    header("location:../../index.php?page=pinjam");
?>