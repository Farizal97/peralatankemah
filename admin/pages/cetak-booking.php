<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="shortcut icon" href="../../images/icn.png"/>
   <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">
   <script src="../../plugins/bootstrap/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="../../plugins/font awesome/font-awesome.min.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak Data Booking</title>
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
          <td width="22%"><img src="../../images/logo.png" alt="" style="width:140px;height:70px;"></div></td>
          <td width="80%">
          
    <h4><b>LAPORAN DATA BOOKING</b></h4>
    <h5><b>ADVENTURE OUTDOOOR</b></h5>
    <p>Jl. Khatib Sulaiman Padang, STMIK INDONESIA PADANG ,Handphone : 082123123126 </p>

          </td>
        </tr>

    </table>

  <div style="width:100%;float: left;">
 <div style="border-bottom: 2px solid #555;padding:10px 0;margin-bottom: 20px;"></div>
 <center>Per Tanggal : <b><?php echo date('d F Y',strtotime($_GET['tanggal1'])); ?> - <?php echo date('d F Y',strtotime($_GET['tanggal2'])); ?></b></center>
 <br>
  </div>

  <div style="width: 100%;float: left">
   <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Penyewa</th>
                        <th>Nama Alat</th>
                        <th>Tgl Pakai</th>
                        <th>Lama</th>
                        <th>Jumlah</th>
                        <th>SubTotal</th>
                        <th>Tgl Input</th>
                   
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include '../../koneksi/koneksi.php'; 
                      $no=0;
                       if(!empty($_GET['tanggal2']) and !empty($_GET['tanggal1'])){

                               $sql=mysqli_query($koneksi,"SELECT tb_booking.*,tb_booking.tgl_booking as tgli,tb_penyewa.*,tb_alat.* FROM tb_booking join tb_penyewa on tb_booking.id_costumer=tb_penyewa.id_costumer join tb_alat on tb_booking.id_alat=tb_alat.id_alat where tb_booking.stt_booking='Lunas' and date(tb_booking.tgl_booking) between '$_GET[tanggal1]' and '$_GET[tanggal2]'");

                        }else{

                              $sql=mysqli_query($koneksi,"SELECT tb_booking.*,tb_booking.tgl_booking as tgli,tb_penyewa.*,tb_alat.* FROM tb_booking join tb_penyewa on tb_booking.id_costumer=tb_penyewa.id_costumer join tb_alat on tb_booking.id_alat=tb_alat.id_alat where tb_booking.stt_booking='Lunas' order by tgl_pakai desc");
                                 
                        }
                   

                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                        <tr>
                        <td><?php echo $no; ?></td>
                         <td><?php echo $q['kode']; ?></td>
                        <td><?php echo $q['nama']; ?></td>
                         <td><?php echo $q['nm_alat']; ?></td>
                        <td><?php echo $q['tgl_booking']; ?></td>
                        <td><?php echo $q['lama_booking']; ?> Hari</td>
                         <td><?php echo $q['jumlah']; ?></td>
                        <td>Rp <?php echo number_format($q['subtotal'],0,',','.'); ?></td>
                        <td><?php echo $q['tgli']; ?></td>
                       
                      </tr>

                  <?php } ?>
                    </tbody>
                  </table>

  </div>
<div class="ttd">
  Diketahui :<br>
Padang, <?php echo date('d F Y'); ?>
  <br>
  <br>
  <br>
  <br>
  Pimpinan
</div>
</body>
</html>
