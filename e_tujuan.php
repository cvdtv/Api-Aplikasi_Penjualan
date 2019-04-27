<?php
    require_once('koneksi.php');

    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $idtujuan =  $_POST['idtujuan'];
        $iddo = $_POST['id_do'];

        $sql = "UPDATE a_do SET idtujuan=$idtujuan where id_do=$iddo;";
    
        if(mysqli_multi_query($con,$sql)){
            echo 'Tujuan Berhasil di set';
            echo $sql;
        }else{
        echo $sql;
            echo 'Tujuan Gagal di set, Harap ulangi...';
        }
        mysqli_close($con);
    }

?>
