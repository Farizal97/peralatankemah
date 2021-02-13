  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Pembookingan
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">List Pembookingan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Pembookingan Kode Bayar : <b> <?php echo $_GET['id']; ?> </b></h3>   <a style='float: right;' href="./pages/set-lunas.php?id=<?php echo $_GET['id']; ?>" class="btn btn-success">Set Lunas</a>
                </div><!-- /.box-header -->

                <div class="box-body">

                  <div class="table-responsive">     
                  <table class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Costumer</th>
                        <th>Nama Alat</th>
                        <th>Tgl Booking</th>
                        <th>Lama</th>
                        <th>Jumlah</th>
                        <th>SubTotal</th>
                        <th>Tgl Input</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;$total=0;
                    $sql=mysqli_query($koneksi,"SELECT tb_booking.*,tb_booking.tgl_booking as tgli,tb_penyewa.*,tb_alat.* FROM tb_booking join tb_penyewa on tb_booking.id_costumer=tb_penyewa.id_costumer left join tb_alat on tb_booking.id_alat=tb_alat.id_alat where tb_booking.kode='$_GET[id]' order by tgl_pakai desc");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;
                        $total+=$q['subtotal'];

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                         <td><?php echo $q['kode']; ?></td>
                        <td><?php echo $q['nama']; ?></td>
                         <td><?php echo $q['nm_alat']; ?></td>
                        <td><?php echo $q['tgl_pakai']; ?></td>
                        <td><?php echo $q['lama_booking']; ?> Hari</td>
                         <td><?php echo $q['jumlah']; ?></td>
                        <td>Rp <?php echo number_format($q['subtotal'],0,',','.'); ?></td>
                        <td><?php echo $q['tgli']; ?></td>
                        
                      </tr>

                  <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>

                      <td colspan="7">
                        <center>TOTAL BAYAR</center>
                      </td>
                      <td><b>Rp <?php echo number_format($total,0,',','.'); ?></b></td>
                      <td></td>
                    </tr>
                    </tfoot>
                  
                  </table>
                  <h4 class="box-title">List Konfirmasi Pembayaran Kode Bayar : <b> <?php echo $_GET['id']; ?> </b></h4>
                   <table class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                     
                        <th>Kode</th>
                        <th>Nama Penyewa</th>
                        <th>Nama Bank</th>
                        <th>Norek Penyewa</th>
                        <th>Norek Tujuan</th>
                        <th>Jumlah Bayar</th>
                        <th>Bukti Bayar</th>
                        <th>Tanggal Input</th>
                     
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_konfirmasi JOIN tb_penyewa ON tb_konfirmasi.id_costumer=tb_penyewa.id_costumer where tb_konfirmasi.kode='$_GET[id]'");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                      
                        <td><?php echo $q['kode']; ?></td>
                        <td><?php echo $q['nama']; ?></td>
                        <td><?php echo $q['nm_bank']; ?></td>
                        <td><?php echo $q['norek_costumer']; ?></td>
                        <td><?php echo $q['norek_tujuan']; ?></td>
                        <td>Rp <?php echo number_format($q['jlm_bayar'],0,',','.'); ?></td>
                        
                         <td><a href="../images/transaksi/<?php echo $q['bukti_bayar']; ?>" target="_blank"><img src="../images/transaksi/<?php echo $q['bukti_bayar']; ?>" alt="" class="img-thumbnail" style="width: 100px;height: 100px;"></a></td>
                         <td><?php echo $q['tgl_input']; ?></td>
                        
                      </tr>

                  <?php } ?>
                    </tbody>
                  </table>

                </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

            </section><!-- /.content -->
      </div><!-- /.content-wrapper -->