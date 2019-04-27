<?php 
  
    require_once('koneksi.php');
        
    $tipe = $_GET['tipe'];
    if($tipe=='sales'){
        $keysales = $_GET['keysales'];
        $sql = "SELECT PV_ID, PV_NAMA, ROUND(PV_KUBIK,3) AS PV_KUBIK FROM produk where PV_ID not in (select PV_ID from a_do, a_det_do where a_do.id_do=a_det_do.id_det_do and no_do='temp' and keysales='$keysales');";
    }else{
        $idcustomer = $_POST['idcustomer'];
        $sql = "SELECT PV_ID, PV_NAMA, ROUND(PV_KUBIK,3) AS PV_KUBIK FROM produk where PV_ID not in (select PV_ID from a_do, a_det_do where a_do.id_do=a_det_do.id_det_do and no_do='temp' and idcustomer='$idcustomer');";
    }
    $r = mysqli_query($con, $sql);
        
    $result = array();
        
    while($row = mysqli_fetch_array($r)){
        array_push($result,array(
            "id"=>$row['PV_ID'],
            "produk"=>$row['PV_NAMA'],
            "satuan"=>$row['PV_KUBIK']
        ));
    }

    echo json_encode(array('result'=>$result));
    mysqli_close($con);
 
?>

