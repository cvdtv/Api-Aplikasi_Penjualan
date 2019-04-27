<?php
    require_once('koneksi.php');

    if($_SERVER['REQUEST_METHOD']=='POST'){
        //Mendapatkan Nilai Variable
        $idcustomer = "";
        $total = "";
        $barang ="";
        $biji = "";
        $kubik = "";
        $harga = "";
        $kbbarang = "";
        
        $filter = "";
        $kode = "";
        $sqla = "";
        $keysales = $_POST['keysales'];
//        $tipe = $_GET['tipe'];

        if(isset($_GET['tipe'])){
            $tipe = $_GET['tipe'];
            if($tipe == 'sales'){
                $filter = " a.keysales = '$keysales' ";
                $sqla = "INSERT INTO a_do (no_do, tgl, keysales, idcustomer, total, keterangan, idtujuan) VALUES ('temp', STR_TO_DATE(DATE(NOW()), '%Y-%m-%d'), '$keysales', 'DUMMY01', 0, 'temporary', 1);";
            }else{
                $filter = " a.idcustomer = '$keysales' ";  
                $sqla = "INSERT INTO a_do (no_do, tgl, keysales, idcustomer, total, keterangan, idtujuan) VALUES ('temp', 'NOW()', 'S001', '$keysales', 0, 'temporary', 1);"; 
            }
        }

        $barang = $_POST['PV_ID'];
        $biji = $_POST['BIJI'];
        $kubik = $_POST['KUBIK'];
        $harga = $_POST['HARGA_JUAL'];
        $kbbarang = $_POST['KUBIK_BARANG'];
        
//note barang tidak boleh sama belum ada pengecekan

        $totalnetto = ($kubik * $harga);

         $sqlrun = "SELECT a.id_do FROM a_do a, a_det_do b WHERE a.no_do='temp' AND".$filter."GROUP BY a.id_do";
         $recordcount = mysqli_fetch_row(mysqli_query($con, $sqlrun));
         if ($recordcount == 0){
           //menghapus child table jika memang masih ada isinya. ditaruh disini dengan asumsi parent terhapus dan child tidak terhapus 
            $sql = $sqla."INSERT INTO a_det_do (id_do, PV_ID, BIJI, KUBIK, HARGA_JUAL, KUBIK_BARANG, TOTAL_NETTO) VALUES ((select id_do from a_do a where no_do='temp' and".$filter."), '$barang', '$biji', '$kubik', '$harga', '$kbbarang', $totalnetto);";
         }else{
          $sql = "INSERT INTO a_det_do (id_do, PV_ID, BIJI, KUBIK, HARGA_JUAL, KUBIK_BARANG, TOTAL_NETTO)
           VALUES ((select a.id_do from a_do a, a_det_do b where a.no_do='temp' and".$filter."group by a.id_do), '$barang', '$biji', '$kubik', '$harga', '$kbbarang', $totalnetto);";
         }

//	$sql .="Update a_do set total=(select sum(total_netto) from a_do a, a_det_do b where a.id_do=b.id_do and no_do='temp' and ".$filter.")Where a.no_do='temp' and".$filter;
	$sql .="UPDATE a_do INNER JOIN (SELECT a.id_do AS id, SUM(TOTAL_NETTO) AS tot FROM a_do a, a_det_do WHERE a.id_do=a_det_do.id_do AND no_do='temp' AND ".$filter.")b ON a_do.id_do=b.id SET a_do.total=b.tot;";
  
      if(mysqli_multi_query($con,$sql)){
            echo 'Berhasil Menambahkan Wishlist';
            echo $sql;
        }else{
        echo $sql;
            echo 'Gagal Menambahkan Wishlist';
        }
        mysqli_close($con);
   }

?>
