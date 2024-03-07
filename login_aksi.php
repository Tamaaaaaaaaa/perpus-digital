<?php
    //mulai session
    session_start();

    //koneksi ke database
    include "koneksi.php";

    //ambil data dari form login
    $username=$_POST['nama'];
    $password=$_POST['katakunci'];

    //query dari tabel petugas
    $ambildata=mysqli_query($sambung,"select * from tbl_petugas where username='$username' and password='$password'");
    
    //cek data
    $cek=mysqli_num_rows($ambildata);
    if($cek>0)
    $data = mysqli_fetch_assoc($ambildata);
    if($data['level']=="1"){
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 'login';
        $_SESSION['level'] = "1";
        header("location:admin/index.php?page=home");

    }else if($data['level']=="2"){
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 'login';
        $_SESSION['level'] = "2";
        header("location:siswa/index.php?page=home");

    }if($data['level']=="3"){
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 'login';
        $_SESSION['level'] = "3";
        header("location:petugas/index.php?page=home");

    }
?>