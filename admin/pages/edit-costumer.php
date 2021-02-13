<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->
   
    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Penyewa
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Penyewa</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Penyewa</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php 
                            include '../koneksi/koneksi.php';

                            $id=$_GET['id'];

                            if(isset($_POST['b1'])){

                            if(empty($_POST['jk']) or empty($_POST['nm'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                              date_default_timezone_set("Asia/Jakarta");

                              if($_POST['pas_lama']==$_POST['pas']){
                                  $pass=$_POST['pas'];
                                }else{
                                  $pass=md5($_POST['pas']);
                                }

                                $sql=mysqli_query($koneksi,"UPDATE tb_penyewa SET nik='$_POST[nik]',nama='$_POST[nm]',jekel='$_POST[jk]',nohp='$_POST[hp]',alamat='$_POST[alm]',email='$_POST[em]' where id_costumer='$id'");

                                 $sql=mysqli_query($koneksi,"UPDATE tb_user SET username='$_POST[user]',password='$pass' where id_costumer='$id'");
                              
                                

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Penyewa berhasil diedit.
                                  </div>';
                            }
                            }
                            ?>
                      
                         <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                           <?php 
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_penyewa JOIN tb_user ON tb_penyewa.id_costumer=tb_user.id_costumer WHERE tb_penyewa.id_costumer='$id'"));
                      ?>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>ID</label>
                                        <input type="text" name="id" class="form-control" maxlength="100" value="<?php echo $q['id_costumer']; ?>" readonly="">
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>NIK</label>
                                        <input type="text" name="nik" class="form-control" maxlength="100" value="<?php echo $q['nik']; ?>">
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Nama</label>
                                        <input type="text" name="nm" class="form-control" maxlength="100" value="<?php echo $q['nama']; ?>">
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Jenis Kelamin</label>
                                         <br>
                                        <input type="radio" name="jk" id="radio" value="Laki-laki" <?php if($q['jekel']=="Laki-laki") echo "checked"; else echo ""; ?>/> Laki-Laki <input type="radio" name="jk" id="radio2" value="Perempuan" <?php if($q['jekel']=="Perempuan") echo "checked"; else echo ""; ?>/> Perempuan
                                    </div>
                                      
                                </div>
                            </div>
                              <br>
                            <br>
                               <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>ALamat</label>
                                        <textarea name="alm" class="form-control"><?php echo $q['alamat']; ?></textarea>
                                    </div>
                                      
                                </div>
                            </div>
                              <br>
                               <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Nomor HP</label>
                                        <input type="text" name="hp" class="form-control" value="<?php echo $q['nohp']; ?>">
                                    </div>
                                      
                                </div>
                            </div>
                             
                             <br>
                               <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Email</label>
                                        <input type="text" name="em" value="<?php echo $q['email']; ?>" class="form-control">
                                    </div>
                                      
                                </div>
                            </div>
                             
                             <br>
                           
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>USERNAME</label>
                                        <input type="text" name="user" value="<?php echo $q['username']; ?>" class="form-control">
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>PASSWORD</label>
                                         <input type="password" class="form-control" id="inputSkills" name="pas" value="<?php echo $q['password']; ?>" placeholder="Password">
                      <input type="hidden" class="form-control" id="inputSkills" name="pas_lama" value="<?php echo $q['password']; ?>" placeholder="Password">
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Penyewa</button>
                                    <a href="admin.php?p=list-costumer" class="btn btn-info"><i class="fa fa-table"></i> Lihat List</a>
                                </div>
                            </div>
                        </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->

   </div>