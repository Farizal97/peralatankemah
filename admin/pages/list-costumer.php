  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Penyewa
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">List Penyewa</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data List Penyewa</h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">     
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
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_penyewa JOIN tb_user ON tb_penyewa.id_costumer=tb_user.id_costumer");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><a href="../images/<?php echo $q['ft']; ?>" target="_blank"><img src="../images/<?php echo $q['ft']; ?>" alt="" class="img-thumbnail" style="width: 100px;height: 100px;"></a></td>
                         <td><?php echo $q['id_costumer']; ?></td>
                        <td><?php echo $q['nik']; ?></td>
                        <td><?php echo $q['nama']; ?></td>
                        <td><?php echo $q['jekel']; ?></td>
                        <td><?php echo $q['nohp']; ?></td>
                        <td><div class="ket"><?php echo $q['alamat']; ?></div></td>
                        <td><?php echo $q['email']; ?></td>
                        <td><?php echo $q['tgl_daftar']; ?></td>
                         <td><?php echo $q['username']; ?></td>
                         <td><p>
                          <a href="admin.php?p=edit-costumer&id=<?php echo $q['id_costumer']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a></p>
                          <a href="./pages/delete-costumer.php?id=<?php echo $q['id_costumer']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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