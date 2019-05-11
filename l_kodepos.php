<?php 
  
    require_once('koneksi.php');
    
    $sql = "SELECT * FROM kodepos;";
    $r = mysqli_query($con, $sql);
        
    $result = array();
        
    while($row = mysqli_fetch_array($r)){
        array_push($result,array(
            "kodepos"=>$row['KODEPOS'],
            "kelurahan"=>$row['KELURAHAN'],
            "kecamatan"=>$row['KECAMATAN'],
            "kota"=>$row['KOTA'],
            "provinsi"=>$row['PROPINSI'],
        ));
    }

    echo json_encode(array('result'=>$result));
    mysqli_close($con);
 
?>
