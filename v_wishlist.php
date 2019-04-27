<?php 
  
    require_once('koneksi.php');

    $id = $_POST['PV_ID'];

    $sql = "SELECT * FROM produk where PV_ID='".$id."'";

    $r = mysqli_query($con, $sql);
    $result = array();
    
    while($row = mysqli_fetch_array($r)){
        array_push($result, array(
            "id"=>$row['PV_ID'],
            "produk"=>$row['PV_NAMA'],
            "kubik"=>$row['PV_KUBIK']
        ));
    }
    echo json_encode(array('result'=>$result));
    mysqli_close($con);
 
?>
