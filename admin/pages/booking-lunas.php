  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Booking Status Lunas
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Booking Status Lunas</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Booking Status Lunas</h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">     
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
                        <th>Tgl Booking</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT tb_booking.*,tb_booking.tgl_booking as tgli,tb_penyewa.*,tb_alat.* FROM tb_booking join tb_penyewa on tb_booking.id_costumer=tb_penyewa.id_costumer join tb_alat on tb_booking.id_alat=tb_alat.id_alat where tb_booking.stt_booking='Lunas' order by tgl_pakai desc");
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