<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

<?php 

include '../../koneksi/koneksi.php';

$id=$_GET['id'];

 $sql=mysqli_query($koneksi,"UPDATE tb_booking SET stt_booking='Lunas' WHERE kode='$id'");
	
	if($sql){
 echo '<script> alert("Pembooking berhasil diset Lunas.");</script>';
  echo "<meta http-equiv=refresh content=0;url=../admin.php?p=booking-pengecekan>";
	}else{
echo '<script> alert("Pembooking Gagal diset Lunas.");</script>';
echo "<meta http-equiv=refresh content=0;url=../admin.php?p=booking-pengecekan>";	
	}

  

?>