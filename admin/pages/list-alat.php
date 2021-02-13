  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Alat
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">List Alat</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data List Alat</h3>  
                </div><!-- /.box-header -->
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
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_alat order by tgl_input desc");
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
                         <td><p>
                          <a href="admin.php?p=edit-alat&id=<?php echo $q['id_alat']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a></p>
                          <a href="./pages/delete-alat.php?id=<?php echo $q['id_alat']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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