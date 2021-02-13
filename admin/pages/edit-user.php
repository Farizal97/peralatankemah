<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

    <div class="content-wrapper">
  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Admin
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="home.php"> Home</a></li>
            <li class="active">Admin</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
  <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form edit Admin Data</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
               <?php 
                            include '../koneksi/koneksi.php';

                           

                            if(isset($_POST['b1'])){

                            if(empty($_POST['id']) or empty($_POST['nm'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                                

                                if($_POST['pas_lama']==$_POST['pas']){
                                  $pass=$_POST['pas'];
                                }else{
                                  $pass=md5($_POST['pas']);
                                }
                              
                                $sql=mysqli_query($koneksi,"UPDATE tb_admin SET nama='$_POST[nm]',username='$_POST[user]',password='$pass',level='$_POST[level]' where id_admin='$_POST[id]'");

                                
                            

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Data berhasil diedit.
                                  </div>';
                            }
                            }
                            ?>
              <div class="col-lg-6">

                     <form id="contactForm" action="" method="post" enctype="multipart/form-data">
                      <?php 
                        
                        $q=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tb_admin where id_admin='$_GET[id]'"));
                      ?>
                     <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>BP</label>
                                        <input type="text" name="id" class="form-control" maxlength="100" value="<?php echo $q['id_admin']; ?>" placeholder="ID Admin" readonly>
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Nama</label>
                                   <input type="text" name="nm" class="form-control" maxlength="100" value="<?php echo $q['nama']; ?>" placeholder="Nama Admin">
                                      </div>
                                      
                                </div>
                            </div>
                             <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Username</label>
                                   <input type="text" name="user" class="form-control" maxlength="100" value="<?php echo $q['username']; ?>" placeholder="Username">
                                      </div>
                                      
                                </div>
                            </div>
                             <br>
                             <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Password</label>
                                <input type="hidden" name="pas_lama" class="form-control" maxlength="100" value="<?php echo $q['password']; ?>" placeholder="Password">
                                   <input type="password" name="pas" class="form-control" maxlength="100" value="<?php echo $q['password']; ?>" placeholder="password">
                                      </div>
                                      
                                </div>
                            </div>
                              <br>
                                <div class="row">
                                <div class="form-group">
                                <div class="col-lg-12 ">
                                <label>Level</label>
                              <select class="form-control" name="level">
                                <option>-Level-</option>
                                <option value="Author" <?php echo $q['level']=="Author" ? "Selected" : ""; ?>>Author</option>
                                <option value="Admin" <?php echo $q['level']=="Admin" ? "Selected" : ""; ?>>Admin</option>
                              </select>
                                      </div>
                                      
                                </div>
                            </div>
                              <br>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-success"><i class="fa fa-save"></i> Edit Admin</button>
                                    <a href="admin.php?p=list-user" class="btn btn-info"><i class="fa fa-table"></i> Lihat List</a>
                                </div>
                            </div>
                        </form>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

     </section><!-- /.content -->

   </div>