<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <link rel="shortcut icon" href="../images/icn.png"/>
  <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css"/>
     <!-- Font Awesome -->
       <link rel="stylesheet" href="../plugins/datepicker/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="../plugins/font awesome/font-awesome.min.css">
    <link rel="stylesheet" href="../plugins/user style/css/style.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak Bukti Booking</title>
</head>

<style type="text/css" media="print">

    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 5px;
    line-height: 0.9;

}
</style>
<style type="text/css" media="screen">
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 5px;
    line-height: 0.9;


}
</style>

<body onload="window.print();">
     <table>
        <tr>
          <td width="22%"><img src="../images/logo.png" alt="" style="width:140px;height:70px;"></div></td>
          <td width="80%">
          
    <h4><b>BUKTI PEMBOOKINGAN</b></h4>
    <h5><b>ADVENTURE OUTDOOOR</b></h5>
    <p>Jl. Khatib Sulaiman Padang, STMIK INDONESIA PADANG ,Handphone : 082123123126 </p>

          </td>
        </tr>

    </table>

<div style="width:100%;float: left;">
 <div style="border-bottom: 2px solid #555;padding:10px 0;margin-bottom: 20px;"></div>
  </div>

  <?php
   session_start();
   include '../koneksi/koneksi.php'; 
      $sql1=mysqli_query($koneksi,"SELECT * FROM tb_booking,tb_penyewa WHERE tb_booking.id_costumer=tb_penyewa.id_costumer and tb_booking.id_costumer='$_SESSION[us]' and tb_booking.stt_booking='Lunas' and tb_booking.kode='$_GET[kd]'");
      $q2=mysqli_fetch_array($sql1);
   ?>
 <table width="347" height="100">
     <tr>
       <td width="197"><b>Nama Lengkap</b></td>
       <td width="24"><b>:</b></td>
       <td width="110"><?php echo strtoupper($q2['nama']); ?></td>
     </tr>
     <tr>
       <td><b>Email</b></td>
       <td><b>:</b></td>
       <td><?php echo $q2['email']; ?></td>
     </tr>
     <tr>
       <td><b>No.Handphone</b></td>
       <td><b>:</b></td>
       <td><?php echo $q2['nohp']; ?></td>
     </tr>
      <tr>
       <td><b>Tanggal Booking</b></td>
       <td><b>:</b></td>
       <td><?php echo date('d F Y',strtotime($q2['tgl_pakai'])); ?></td>
     </tr>
   </table>
<br>
  <div style="width: 100%;float: left">
  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>KD Alat</th>
                        <th>Nama Alat</th>
                        <th>Jumlah</th>
                        <th>Harga/Hari</th>
                        <th>Lama Sewa</th>
                        <th>Sub Total</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                      
                       
                      $no=0;$total=0;
                   
                              $sql=mysqli_query($koneksi,"SELECT * FROM tb_booking,tb_alat WHERE tb_booking.id_alat=tb_alat.id_alat and tb_booking.id_costumer='$_SESSION[us]' and tb_booking.stt_booking='Lunas' and tb_booking.kode='$_GET[kd]'");
             
                      while($q=mysqli_fetch_array($sql)){
                        $no++;
                        $total+=$q['subtotal'];

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                         <td><?php echo $q['id_alat']; ?></td>
                        <td><?php echo $q['nm_alat']; ?></td>
                        
                        <td><?php echo $q['jumlah']; ?></td>
                        <td>Rp <?php echo number_format($q['harga_sewa'],0,',','.'); ?></td>
                         <td><?php echo $q['lama_booking']; ?> Hari</td>
                        <td>Rp <?php echo number_format($q['subtotal'],0,',','.'); ?></td>
                      </tr>

                  <?php } ?>
                    </tbody>
                    <tr>
                      <td colspan="6"><b><center>TOTAL</center></b></td>
                      <td><b>Rp <?php echo number_format($total,0,',','.'); ?></b></td>
                    </tr>
    </table>

  </div>
<center>##### TERIMAKASIH SUDAH MEMBOOKING #####</center>
</body>
</html>
