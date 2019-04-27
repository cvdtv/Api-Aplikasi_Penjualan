<?php
    require_once('koneksi.php');

    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $email =  $_POST['email'];
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $notelp = $_POST['notelp'];
        // $uuid = $_POST['uuid'];
        // $token = $_POST['token'];
        
        $sql = "INSERT INTO pengguna (email, password, nama_depan, nama_belakang, notelp, flag) values ('$email', 12345678, '$nama_depan', '$nama_belakang', '$notelp', 0);";
    
        if(mysqli_multi_query($con,$sql)){
            echo 'Anda Berhasil Registrasi Cek Email Anda...';
        }else{
        echo $sql;
            echo 'Registrasi Anda Gagal, Harap ulangi...';
        }
        mysqli_close($con);
    }

?>