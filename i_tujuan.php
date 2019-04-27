<?php
    require_once('koneksi.php');

    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $alamat =  $_POST['alamat'];
        $kodepos = $_POST['kodepos'];
        $kota = $_POST['kota'];
        $idcustomer = $_POST['idcustomer'];
        
        $sql = "INSERT INTO tujuan (alamat, kodepos, kota, CUS_ID) values ('$alamat', '$kodepos', '$kota', '$idcustomer');";
    
        if(mysqli_multi_query($con,$sql)){
            echo 'Anda Berhasil Menambahkan Tujuan';
        }else{
        echo $sql;
            echo 'Tujuan Anda Gagal Ditambahkan, Harap ulangi...';
        }
        mysqli_close($con);
    }

?>