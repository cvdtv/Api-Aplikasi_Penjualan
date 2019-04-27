<?php
    require_once('koneksi.php');

    $tipe = $_GET['tipe'];
    
    $keysales = $_GET['keysales'];
    if($tipe=='sales'){
        $listbarang = "SELECT a.id_do, b.id_det_do, c.PV_ID, c.PV_NAMA, TOTAL_NETTO, BIJI, HARGA_JUAL, KUBIK, KUBIK_BARANG, d.idtujuan, d.alamat, d.kodepos, a.total, a.tgl, a.no_do, e.CUS_NAMA FROM a_do a, a_det_do b, produk c, tujuan d, customer e where a.id_do=b.id_do and b.PV_ID=c.PV_ID and a.no_do='temp' and a.idtujuan=d.idtujuan and e.CUS_ID=a.idcustomer and a.keysales='$keysales';";
    }else{
        $listbarang = "SELECT a.id_do, b.id_det_do, c.PV_ID, c.PV_NAMA, TOTAL_NETTO, BIJI, HARGA_JUAL,KUBIK,  KUBIK_BARANG, d.idtujuan, d.alamat, d.kodepos, a.total, a.tgl, a.no_do, e.CUS_NAMA FROM a_do a, a_det_do b, produk c, tujuan d, customer e where a.id_do=b.id_do and b.PV_ID=c.PV_ID and a.no_do='temp' and a.idtujuan=d.idtujuan and e.CUS_ID=a.idcustomer and a.idcustomer='$keysales';";
    }

    // $listbarang = "SELECT * FROM a_do where no_do='temp' and idcustomer='$idcustomer';";
    $r = mysqli_query($con, $listbarang);
    $result = array();
    
    while($row = mysqli_fetch_array($r)){

        array_push($result, array(
            "id_do" => $row['id_do'],
            "id_det_do"=>$row['id_det_do'],
            "idbarang"=>$row['PV_ID'],
            "produk"=>$row['PV_NAMA'],
	    "kubik" =>$row['KUBIK'],
            "kubik_barang"=>$row['KUBIK_BARANG'],
            "totalkubik"=>$row['TOTAL_NETTO'],
            "biji"=>$row['BIJI'],
            "harga"=>$row['HARGA_JUAL'],
            "no_do" => $row['no_do'],
            "tgl" => $row['tgl'],
            "total" => $row['total'],
            "alamat" => $row['alamat'],
            "CUS_NAMA" => $row['CUS_NAMA']
        ));
    }

    //DETAIL DO
//    $queryjt = mysqli_query($con, "SELECT a.*, tj.alamat, tj.kodepos, count(ad.id_det_do) as jumlahbrg FROM a_do a, tujuan tj, a_det_do ad where no_do='temp' and a.idtujuan=tj.idtujuan and idcustomer='$idcustomer' and ad.id_do=a.id_do group by a.id_do;");     
//    $JsonDetail = array();

//    while($row = mysqli_fetch_array($queryjt)){
//        array_push($JsonDetail, array(
//            "jumlah_barang" => $row['jumlahbrg'],
//            "no_do" => $row['no_do'],
//            "tgl" => $row['tgl'],
//            "total" => $row['total'],
//            "alamat" => $row['alamat'],
//            "kodepos" => $row['kodepos']
 //       ));
   // }

    // while($row = mysqli_fetch_assoc($queryjt)){
    //     $JsonDetail[] = $row;
    // }
    //END DETAIL DO

    // echo json_encode(array(array('result'=>$result, 'resultParent'=>$JsonDetail)));
	echo json_encode(array('result'=>$result));
    mysqli_close($con);


?>
