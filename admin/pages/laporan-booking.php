  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laporan Booking
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Laporan Booking</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Laporan Booking</h3>  
                </div><!-- /.box-header -->
                    <div class="box-header">
                    <div class="row">
                      <div class="col-md-12">
                      <form action="#" method="post">
                       
                        <div class="col-md-4">
                          <div class="input-group">

                            <input type="text" class="form-control" name="tanggal1" value="<?php if(empty($_POST['tanggal1'])){echo "";}else{echo $_POST['tanggal1'];} ?>" placeholder="Tanggal" id="datepicker1">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group">
                            <input type="text" class="form-control" name="tanggal2" value="<?php if(empty($_POST['tanggal2'])){echo "";}else{echo $_POST['tanggal2'];} ?>" placeholder="Tanggal" id="datepicker2">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          </div>
                          </div>
                          <div class="col-md-1"><button type="submit" name="b1" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                          </div>
                          <?php if(!empty($_POST['tanggal1']) and !empty($_POST['tanggal1'])) { ?>
                          <div class="col-md-1"><a href="./pages/cetak-booking.php?tanggal1=<?php echo $_POST['tanggal1']; ?>&&tanggal2=<?php echo $_POST['tanggal2']; ?>" target="_blank" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</a>
                          </div>
                          <?php } ?>
                      </form>
                      </div>
                    </div>
                  </div>
                   
                <div class="box-body">
                  <div class="table-responsive">
              
                   <div class="table-responsive">     
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Penyewa</th>
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
                      $no=0;
                       if(isset($_POST['b1'])){

                               $sql=mysqli_query($koneksi,"SELECT tb_booking.*,tb_booking.tgl_booking as tgli,tb_penyewa.*,tb_alat.* FROM tb_booking left join tb_penyewa on tb_booking.id_costumer=tb_penyewa.id_costumer left join tb_alat on tb_booking.id_alat=tb_alat.id_alat where tb_booking.stt_booking='Lunas' and date(tb_booking.tgl_pakai) between '$_POST[tanggal1]' and '$_POST[tanggal2]'");

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
                        <td><?php echo $q['tgl_pakai']; ?></td>
                        <td><?php echo $q['lama_booking']; ?> Hari</td>
                         <td><?php echo $q['jumlah']; ?></td>
                        <td>Rp <?php echo number_format($q['subtotal'],0,',','.'); ?></td>
                        <td><?php echo $q['tgli']; ?></td>
                       
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
