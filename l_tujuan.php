<?php 
  
    require_once('koneksi.php');
    
    $id = $_GET['keysales'];
    
    $sql = "SELECT * FROM tujuan WHERE CUS_ID='$id';";
    $r = mysqli_query($con, $sql);
        
    $result = array();
        
    while($row = mysqli_fetch_array($r)){
        array_push($result,array(
            "idtujuan"=>$row['idtujuan'],
            "alamat"=>$row['alamat'],
            "kodepos"=>$row['kodepos'],
            "idcustomer"=>$row['CUS_ID']
        ));
    }

    echo json_encode(array('result'=>$result));
    mysqli_close($con);
 
?>
