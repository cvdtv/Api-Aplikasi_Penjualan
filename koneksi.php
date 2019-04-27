<?php

define('HOST','192.168.4.77');
define('USER','root');
define('PASS','hanyaadminyangtau');
define('DB','c_erp_sigk');

$con = mysqli_connect(HOST,USER,PASS,DB) or die ('gagal konek ke database');

// for($i=1;$i<=date("d");$i++)
//     {
//         if (strlen($i)==1) $i="0".$i;
//         $sql = "insert into produk_opname_temp select '".date("Y-m-").$i."', PV_ID, L_ID, STOK from produk_opname where STOK<>0 and MONTH(TANGGAL)=MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH)) AND YEAR(TANGGAL)=YEAR(DATE_ADD(NOW(), INTERVAL -1 MONTH))";
//         mysqli_query($con, $sql);
//     }


?>
