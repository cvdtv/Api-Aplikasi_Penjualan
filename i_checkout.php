<?php
    require_once('koneksi.php');

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $filter = "";
        $kode = "";
	$iddo = $_POST['id_do']; 
        $idcustomer = $_POST['idcustomer'];
        // $tipe = $_GET['tipe'];

        if(isset($_POST['tipe'])){
            $tipe = $_POST['tipe'];
            if($tipe == 'sales'){
                $filter = " keysales = '$idcustomer'";
            }else{
                $filter = " idcustomer = '$idcustomer' ";   
            }
        }

        $tgl = $_POST['tgl'];

        $bln = date('m');
        $thn = date('Y');
        $thnbln = $thn.$bln;
        $cekno="SELECT MAX(no_do) FROM a_do WHERE no_do like '$idcustomer-%$blnthn%' ORDER BY no_do;";
        $baris = mysqli_fetch_row(mysqli_query($con, $cekno));

        if($baris[0] == "")
            $count = 0;
        else
            $count = substr($baris[0], 12, 4);

        $prefix = $idcustomer."-".$thnbln."-".sprintf("%04d", $count+1);

//        $query = mysqli_query($con, "SELECT id_do FROM a_do where".$filter."AND no_do='temp'");
//        $iddo  ="";
//        if($query)
//        {
//            $baris = mysqli_fetch_row($query);
//            $iddo = $baris[0];
//        }
            
        $sql = "UPDATE a_do SET no_do = '$prefix', keterangan = 'aplikasi penjualan $tipe'  where id_do=$iddo;";
    
        if(mysqli_multi_query($con,$sql)){
	        echo $sql;
            echo 'Order Anda Sedang dalam Validasi';
        }else{
            echo $sql;  
            echo 'Order Anda Gagal, Harap Ulangi Kembali';
        }
	        echo $sql;
        mysqli_close($con);
    }

?>
