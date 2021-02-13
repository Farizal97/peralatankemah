<!--start wrapper-->
    <section class="wrapper">
        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>Mendaftar</h2>
                           
                        </div>
                        <nav id="breadcrumbs">
                            <ul>
                                <li>You are here:</li>
                                <li><a href="index.php">Home</a></li>
                                <li>Daftar</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="content contact">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="dividerHeading">
                            <h4><span>Daftar</span></h4>
                        </div>
                       <?php 
                            include './koneksi/koneksi.php';

                             $auto=rand(000000,999999);
                            $_POST['id']="US".$auto;

                            if(isset($_POST['b1'])){



                            if(empty($_POST['nik']) or empty($_POST['nm']) or empty($_POST['email']) or empty($_POST['user']) or empty($_POST['pas'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';
                          
                            }else{

                                $pas=md5($_POST['pas']);

                                $sql=mysqli_query($koneksi,"INSERT INTO tb_penyewa values ('$_POST[id]','$_POST[nik]','$_POST[nm]','$_POST[jekel]','$_POST[hp]','$_POST[alamat]','$_POST[email]','user.png',NOW())");

                                $sql=mysqli_query($koneksi,"INSERT INTO tb_user values ('$_POST[id]','$_POST[user]','$pas')");
                            
            				
            						if(!$sql) {
            							 echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
            												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            												  <span aria-hidden="true">×</span></button>
            												  <strong>Error!</strong> Gagal melakukan pendaftaran.
            												  </div>';
            							
            						} else {
            							 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
            												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            												  <span aria-hidden="true">×</span></button>
            												  <strong>Sukses!</strong> Pendaftaran anda berhasil ,Silahkan login dengan <b>username</b> dan <b>password</b> yang anda daftarkan.
            												  </div>';
            						}
		
                            }
                            }
                            ?>
                        <form id="contactForm" action="" method="post">
                              <div class="row">
                                <div class="form-group">
                                   
                                    <div class="col-md-12 ">
                                        <input type="text" id="name" name="nik" class="form-control" maxlength="100" data-msg-required="Please enter your Nik." value="" placeholder="NIK" >
                                    </div>
                                    
                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                   
                                    <div class="col-md-12 ">
                                        <input type="text" id="name" name="nm" class="form-control" maxlength="100" data-msg-required="Please enter your Nama." value="" placeholder="Nama lengkap" >
                                    </div>
                                    
                                
                                </div>
                            </div>
                               <div class="row">
                                <div class="form-group">
                                  
                                     <div class="col-md-12">
                                        <input type="text" id="hp" name="hp" class="form-control" maxlength="100" data-msg-required="Please enter the nomor telepon." value="" placeholder="Nomor Telepon">
                                    </div>
                                
                                </div>
                            </div>
                         
                             <div class="form-group" id="jk3">
                          
                                    <div class="col-md-12 ">
                                       <label class="radio-inline">
                                          <input type="radio" name="jekel" id="inlineRadio1" value="Laki-laki"> Laki-laki
                                        </label>
                                        <label class="radio-inline">
                                          <input type="radio" name="jekel" id="inlineRadio2" value="Perempuan"> Perempuan
                                        </label>
                                    
                                
                                    </div>
                                </div>
                                <br>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" id="user" name="email" class="form-control" maxlength="100" data-msg-required="Please enter the username." value="" placeholder="Email">
                                    </div>
                                     
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
                                    </div>
                                     
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                  
                                     <div class="col-md-12">
                                        <input type="text" id="user" name="user" class="form-control" maxlength="100" data-msg-required="Please enter the Username." value="" placeholder="Username">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                  
                                     <div class="col-md-12">
                                        <input type="password" id="pas" name="pas" class="form-control" maxlength="100" data-msg-required="Please enter the password." value="" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" name="b1" data-loading-text="Loading..." class="btn btn-default btn-lg" value="Daftar">
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="sidebar">
                            <div class="widget_info">
                                <div class="dividerHeading">
                                    <h4><span>Petunjuk Pendaftaran</span></h4>
                                    </div>
                                <p><i class="fa fa-angle-double-right"></i> Isilah data anda dengan lengkap sesuai dengan data diri anda yang sebenarnya.</p><br>
                                
                                <p><i class="fa fa-angle-double-right"></i> Setelah anda mendaftar anda akan bisa langsung untuk memesan tiket atau pun mengirim paket.</p><br>
                                <p><i class="fa fa-angle-double-right"></i> Jika data anda tidak sesuai dengan yang sebenarnya maka kami tidak akan memproses pemesanan anda.</p><br>
                                 <p><i class="fa fa-angle-double-right"></i> Untuk informasi lebih lanjut silahkan anda hubungi kami lelalui kontak kami,atau anda juga dapat mengunjungi kami melalui alamat kami ,Terimakasih.</p>
                                
                               
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </section>
    <!--end wrapper-->