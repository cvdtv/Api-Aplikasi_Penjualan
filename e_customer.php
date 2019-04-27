<?php
    require_once('koneksi.php');

    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $iddo =  $_POST['id_do'];
        $idcustomer = $_POST['idcustomer'];

        $sql = "UPDATE a_do SET idcustomer='$idcustomer' where id_do=$iddo;";

        if(mysqli_multi_query($con,$sql)){
            echo 'Customer Berhasil di set';
            echo $sql;
        }else{
        echo $sql;
            echo 'Customer Gagal di set, Harap ulangi...';
        }
        mysqli_close($con);
    }

?>
