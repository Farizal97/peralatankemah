    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Booking Status Pengecekan
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Booking Status Pengecekan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Booking Status Pengecekan</h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">     
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Proses</th>
                        <th>Kode</th>
                        <th>Nama Penyewa</th>
                        <th>Tgl Pakai</th>
                        <th>Tgl Kembali</th>
                        <th>Total Bayar</th>
                        <th>Tgl Booking</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT tb_booking.*,tb_booking.tgl_booking as tgli,tb_penyewa.*,tb_alat.* FROM tb_booking join tb_penyewa on tb_booking.id_costumer=tb_penyewa.id_costumer join tb_alat on tb_booking.id_alat=tb_alat.id_alat where tb_booking.stt_booking='Pengecekan' group By kode order by tgl_pakai desc");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;
                        $tt=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(subtotal) AS tot FROM tb_booking WHERE kode='$q[kode]'"));
                       
                       

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                         <td><p>
                          <a href="admin.php?p=list-booking&id=<?php echo $q['kode']; ?>" class="btn btn-warning">Cek Pembokingan</a></p>
                          <p>
                          
                          <a href="./pages/set-lunas.php?id=<?php echo $q['kode']; ?>" class="btn btn-success">Set Lunas</a>
                        </td>
                         <td><?php echo $q['kode']; ?></td>
                        <td><?php echo $q['nama']; ?></td>
                        <td><?php echo $q['tgl_booking']; ?></td>
                        <td><?php echo $q['tgl_kembali']; ?></td>
                        <td>Rp <?php echo number_format($tt['tot'],0,',','.'); ?></td>
                      
                        <td><?php echo $q['tgli']; ?></td>
                         <td><p>
                          <a href="./pages/delete-booking.php?id=<?php echo $q['id_booking']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
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