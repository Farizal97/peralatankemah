<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="shortcut icon" href="../../images/icn.png"/>
   <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">
   <script src="../../plugins/bootstrap/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="../../plugins/font awesome/font-awesome.min.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak Data Penyewa</title>
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
          
    <h4><b>LAPORAN DATA PENYEWA</b></h4>
    <h5><b>ADVENTURE OUTDOOOR</b></h5>
    <p>Jl. Khatib Sulaiman Padang, STMIK INDONESIA PADANG ,Handphone : 082123123126 </p>

          </td>
        </tr>

    </table>

  <div style="width:100%;float: left;">
 <div style="border-bottom: 2px solid #555;padding:10px 0;margin-bottom: 20px;"></div>
 <center>Per Tahun : <b><?php echo date('Y'); ?></b></center>
 <br>
  </div>

  <div style="width: 100%;float: left">

                   <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                       <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>ID</th>
                        <th>Nik</th>
                        <th>Nama</th>
                        <th>Jekel</th>
                        <th>NoHP</th>
                         <th>Alamat</th>
                        <th>Email</th>
                       
                        <th>Tanggal Daftar</th>
                        <th>Username</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include '../../koneksi/koneksi.php'; 
                      $no=0;
                       if(isset($_POST['b1'])){

                               $sql=mysqli_query($koneksi,"SELECT * FROM tb_penyewa JOIN tb_user ON tb_penyewa.id_costumer=tb_user.id_costumer where date(tgl_daftar) between '$_GET[tanggal1]' and '$_GET[tanggal2]'");

                        }else{

                               $sql=mysqli_query($koneksi,"SELECT * FROM tb_penyewa JOIN tb_user ON tb_penyewa.id_costumer=tb_user.id_costumer");
                                 
                        }
                   

                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                     <tr>
                        <td><?php echo $no; ?></td>
                        <td><a href="../../images/<?php echo $q['ft']; ?>" target="_blank"><img src="../../images/<?php echo $q['ft']; ?>" alt="" class="img-thumbnail" style="width: 100px;height: 100px;"></a></td>
                         <td><?php echo $q['id_costumer']; ?></td>
                        <td><?php echo $q['nik']; ?></td>
                        <td><?php echo $q['nama']; ?></td>
                        <td><?php echo $q['jekel']; ?></td>
                        <td><?php echo $q['nohp']; ?></td>
                        <td><div class="ket"><?php echo $q['alamat']; ?></div></td>
                        <td><?php echo $q['email']; ?></td>
                        <td><?php echo $q['tgl_daftar']; ?></td>
                         <td><?php echo $q['username']; ?></td>
                      
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
