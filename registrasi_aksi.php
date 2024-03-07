<?php 
    //koneksi dengan database 
    include 'koneksi.php'; 
    
    //menangkap data yang dikirim dari form dengan methode post 
    $idpetugas        = $_POST['idpetugas'];
    $namapetugas      = $_POST['namapetugas'];
    $hp               = $_POST['hp'];
    $username         = $_POST['username'];
    $password         = $_POST['password'];
    $level         = $_POST['level'];

    //update data dari database 
    mysqli_query($sambung,"insert into tbl_petugas (idpetugas,namapetugas,hp,username,password,level) values ('$idpetugas','$namapetugas','$hp','$username','$password','$level')");

    //mengalihkan ke halaman daftar buku 
    header("location:index.php"); 
?>