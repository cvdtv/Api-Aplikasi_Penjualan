<?php
    require_once('koneksi.php');

    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $tanggal = $_POST['tgl'];
        $iddo = $_POST['id_do'];

        $sql = "UPDATE a_do SET tgl=STR_TO_DATE('$tanggal', '%d-%m-%Y') where id_do=$iddo;";

        if(mysqli_multi_query($con,$sql)){
            echo 'Tanggal Berhasil di set';
//echo $sql;
        }else{
        echo $sql;
            echo 'Tanggal Gagal di set, Harap ulangi...';
        }
        mysqli_close($con);
    }

?>

