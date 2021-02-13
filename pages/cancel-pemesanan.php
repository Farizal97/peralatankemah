<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

<?php 

include './../koneksi/koneksi.php';

$id=$_GET['kd'];

 $sql1=mysqli_query($koneksi,"UPDATE tb_booking SET stt_booking='Cancel' WHERE id_booking='$id'");
	
	if($sql1){
 echo '<script> alert("Pembookingan Berhasil dibatalkan."); javascript:history.back(); </script>';
	}else{
echo '<script> alert("Pembookingan gagal dibatalkan."); javascript:history.back(); </script>';	
	}

  

?>