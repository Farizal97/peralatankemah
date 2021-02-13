<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->
   
    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Alat
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Alat</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Alat</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                error_reporting(0);
                            include '../koneksi/koneksi.php';

                          $auto=rand(00000,99999);
                            $_POST['id']="AL".$auto;

                            if(isset($_POST['b1'])){

                             

                            if(empty($_POST['id']) or empty($_POST['nm']) or empty($_POST['spec'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                                   date_default_timezone_set("Asia/Jakarta");

                                  $tmpf=$_FILES['gambar']['tmp_name'];
                                  $nmf=$_FILES['gambar']['name'];
                             
                                  move_uploaded_file($tmpf,"../images/alat/".$nmf);
                                  $tgl=date('Y-m-d H:i:s');

                                $sql=mysqli_query($koneksi,"INSERT INTO tb_alat values ('$_POST[id]','$_POST[nm]','$_POST[spec]','$_POST[hrg]','$nmf','$tgl','$_POST[stok]','$_SESSION[id]')");

                                   echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Alat berhasil ditambah.
                                  </div>';

                            }
                            }
                            ?>
                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                   
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>ID ALat</label>
                                        <input type="text" name="id" class="form-control" value="<?php echo $_POST[id]; ?>" maxlength="100" readonly>
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                              <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Nama Alat</label>
                                         <input type="text" name="nm" class="form-control" maxlength="100">
                                    </div>
                                      
                                </div>
                            </div>
                              <br>
                               <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Spesifikasi</label>
                                        <textarea name="spec" class="form-control" id="editor1"></textarea>
                                    </div>
                                      
                                </div>
                            </div>
                              <br>
                               <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Foto</label>
                                        <input type="file" name="gambar" class="form-control" maxlength="100" placeholder="Foto">
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                              <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Harga Sewa</label>
                                         <input type="text" name="hrg" class="form-control" maxlength="100">
                                    </div>
                                      
                                </div>
                            </div>
                             <br>
                               <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Stok</label>
                                         <input type="text" name="stok" class="form-control" maxlength="100">
                                    </div>
                                      
                                </div>
                            </div>
                             <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Alat</button>
                                    <a href="admin.php?p=list-alat" class="btn btn-info"><i class="fa fa-table"></i> Lihat List</a>
                                </div>
                            </div>
                        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->

   </div>