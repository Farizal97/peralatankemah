  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laporan Alat
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">Laporan Alat</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Laporan Alat</h3>  
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
                          <div class="col-md-1"><a href="./pages/cetak-alat.php?tanggal1=<?php echo $_POST['tanggal1']; ?>&&tanggal2=<?php echo $_POST['tanggal2']; ?>" target="_blank" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</a>
                          </div>
                          <?php } ?>
                      </form>
                      </div>
                    </div>
                  </div>
                   
                <div class="box-body">
                  <div class="table-responsive">
              
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
                        <th>ID Admin</th>
                    
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                       if(isset($_POST['b1'])){

                               $sql=mysqli_query($koneksi,"SELECT * FROM tb_alat where date(tgl_input) between '$_POST[tanggal1]' and '$_POST[tanggal2]'");

                        }else{

                              $sql=mysqli_query($koneksi,"SELECT * FROM tb_alat order by tgl_input desc");
                                 
                        }
                   

                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><a href="../images/alat/<?php echo $q['ft_alat']; ?>" target="_blank"><img src="../images/alat/<?php echo $q['ft_alat']; ?>" alt="" class="img-thumbnail" style="width: 100px;height: 100px;"></a></td>
                         <td><?php echo $q['id_alat']; ?></td>
                        <td><?php echo $q['nm_alat']; ?></td>
                   
                        <td><div class="ket"><?php echo $q['spesifikasi']; ?></div></td>
                        <td>Rp <?php echo number_format($q['harga_sewa'],0,',','.'); ?></td>
                         <td><?php echo $q['tgl_input']; ?></td>
                        <td><?php echo $q['stok']; ?></td>
                        <td><?php echo $q['id_admin']; ?></td>
                        
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
