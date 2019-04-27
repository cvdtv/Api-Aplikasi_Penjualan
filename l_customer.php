<?php 
  
    require_once('koneksi.php');
        
    $sql = "SELECT * FROM customer where CUS_BLACKLIST='N';";
    $r = mysqli_query($con, $sql);
        
    $result = array();
        
    while($row = mysqli_fetch_array($r)){
        array_push($result,array(
            "idcustomer"=>$row['CUS_ID'],
            "nama"=>$row['CUS_NAMA'],
            "alamat"=>$row['CUS_ALAMAT']
        ));
    }

    echo json_encode(array('result'=>$result));
    mysqli_close($con);
 
?>
