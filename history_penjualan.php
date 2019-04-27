<?php 
  
    require_once('koneksi.php');

    $tipe = $_GET['tipe'];

    if($tipe=='sales'){
        $keysales = $_GET['keysales'];
        $sql = "SELECT a_do.*, tujuan.alamat FROM a_do, tujuan where keysales='".$keysales."' and tujuan.idtujuan=a_do.idtujuan order by a_do.id_do DESC;";
    }else{
        $keysales = $_GET['keysales'];
        $sql = "SELECT a_do.*, tujuan.alamat FROM a_do, tujuan where idcustomer='".$idcustomer."' and tujuan.idtujuan=a_do.idtujuan order by a_do.id_do DESC;";
    }
    
    // $sql = "SELECT a_do.*, tujuan.alamat FROM a_do, tujuan where idcustomer='".$idcustomer."' and tujuan.idtujuan=a_do.idtujuan;";

    $r = mysqli_query($con, $sql);
    $result = array();
    
    while($row = mysqli_fetch_array($r)){
        array_push($result, array(
            "id_do"=>$row['id_do'],
      	    "no_sistem"=>$row['no_sistem'],
            "no_do"=>$row['no_do'],
            "tgl"=>$row['tgl'],
            "tujuan"=>$row['alamat'],
            "total"=>$row['total']
        ));
    }
    echo json_encode(array('result'=>$result));
    mysqli_close($con);
 
?>
