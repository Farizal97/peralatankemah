  <!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Konfirmasi
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li class="active">List Konfirmasi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
    <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data List Konfirmasi</h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">     
                  <table id="example1" class="table table-bordered table-striped">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Aksi</th>
                        <th>Kode</th>
                        <th>Nama Penyewa</th>
                        <th>Nama Bank</th>
                        <th>Norek Penyewa</th>
                        <th>Norek Tujuan</th>
                        <th>Jumlah Bayar</th>
                        <th>Bukti Bayar</th>
                        <th>Tanggal Input</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       include './../koneksi/koneksi.php'; 
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_konfirmasi JOIN tb_penyewa ON tb_konfirmasi.id_costumer=tb_penyewa.id_costumer");
                      while($q=mysqli_fetch_array($sql)){
                        $no++;

                     ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                         <td><p>
                        
                          <a href="admin.php?p=list-booking&id=<?php echo $q['kode']; ?>" class="btn btn-warning">Cek Pembokingan</a></p>
                          <p>
                        </td>
                        <td><?php echo $q['kode']; ?></td>
                        <td><?php echo $q['nama']; ?></td>
                        <td><?php echo $q['nm_bank']; ?></td>
                        <td><?php echo $q['norek_costumer']; ?></td>
                        <td><?php echo $q['norek_tujuan']; ?></td>
                        <td>Rp <?php echo number_format($q['jlm_bayar'],0,',','.'); ?></td>
                        
                         <td><a href="../images/transaksi/<?php echo $q['bukti_bayar']; ?>" target="_blank"><img src="../images/transaksi/<?php echo $q['bukti_bayar']; ?>" alt="" class="img-thumbnail" style="width: 100px;height: 100px;"></a></td>
                         <td><?php echo $q['tgl_input']; ?></td>
                         <td><p>
                          
                          <a href="./pages/delete-konfirmasi.php?id=<?php echo $q['id_konfirmasi']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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