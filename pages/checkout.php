<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

<?php 

include './../koneksi/koneksi.php';
session_start();
$id=$_SESSION[us];
date_default_timezone_set("Asia/Jakarta");
$tgls = date('Y-m-d H:i:s');
$bts=date('Y-m-d H:i:s',strtotime('+2 Hours',strtotime($tgls)));
$kode=rand(0,999);

 $sql1=mysqli_query($koneksi,"UPDATE tb_booking SET stt_booking='Checkout',kode='$kode',batas_waktu='$bts' WHERE stt_booking='Pending' and id_costumer='$id'");
	
	if($sql1){
 echo '<script> alert("Checkout berhasil, silahkan lakukan pembayaran."); javascript:history.back(); </script>';
	}else{
echo '<script> alert("Checkout gagal, cobalah beberapa saat lagi"); javascript:history.back(); </script>';	
	}

  

?>