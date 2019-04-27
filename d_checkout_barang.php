<?php 

	require_once('koneksi.php');
	
	
    $id = $_POST['id_det_do'];
    $iddo = "";
    $baris=mysqli_fetch_row(mysqli_query($con, "select id_do from a_det_do where id_det_do=$id"));
    $iddo = $baris[0];

    $sql = "DELETE FROM a_det_do WHERE id_det_do=$id;";
	     
    if(mysqli_query($con,$sql)){
	echo 'Berhasil Hapus Barang';
    }else{
        echo 'Data Barang tidak dapat dihapus';
        echo $sql;
    }
    $sql = "UPDATE a_do INNER JOIN (SELECT a_do.id_do AS id, SUM(TOTAL_NETTO) AS tot FROM a_do, a_det_do WHERE a_do.id_do=a_det_do.id_do AND no_do='temp' AND a_do.id_do=$iddo)b ON a_do.id_do=b.id SET a_do.total=b.tot";
    mysqli_query($con, $sql);

    mysqli_close($con);
 ?>
