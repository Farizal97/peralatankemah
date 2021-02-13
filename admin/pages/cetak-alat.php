<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="shortcut icon" href="../../images/icn.png"/>
   <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">
   <script src="../../plugins/bootstrap/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="../../plugins/font awesome/font-awesome.min.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak Data Alat</title>
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
          
    <h4><b>LAPORAN DATA ALAT</b></h4>
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
                        <th>Foto</th>
                        <th>KD Alat</th>
                        <th>Nama Alat</th>
                        <th>Spesifikasi</th>
                        <th>Harga Sewa</th>
                        <th>Tanggal</th>
                        <th>Stok</th>
                      
                    
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include '../../koneksi/koneksi.php'; 
                      $no=0;
                       if(isset($_POST['b1'])){

                               $sql=mysqli_query($koneksi,"SELECT * FROM tb_alat where date(tgl_input) between '$_GET[tanggal1]' and '$_GET[tanggal2]'");

                        }else{

                              $sql=mysqli_query($koneksi,"SELECT * FROM tb_alat order by tgl_input desc");
                                 
                        }
                   

                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><a href="../../images/alat/<?php echo $q['ft_alat']; ?>" target="_blank"><img src="../../images/alat/<?php echo $q['ft_alat']; ?>" alt="" class="img-thumbnail" style="width: 100px;height: 100px;"></a></td>
                         <td><?php echo $q['id_alat']; ?></td>
                        <td><?php echo $q['nm_alat']; ?></td>
                   
                        <td><div class="ket"><?php echo $q['spesifikasi']; ?></div></td>
                        <td>Rp <?php echo number_format($q['harga_sewa'],0,',','.'); ?></td>
                         <td><?php echo $q['tgl_input']; ?></td>
                        <td><?php echo $q['stok']; ?></td>
                    
                        
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
