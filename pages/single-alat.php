<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

<section class="wrapper">
          <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>Detail Alat</h2>
                            
                        </div>
                        <nav id="breadcrumbs">
                            <ul>
                                <li>You are here:</li>
                                <li><a href="index.php">Home</a></li>
                                <li>Detail & Booking</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="content blog">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                         <div class="widget widget_categories">
                                <div class="widget_title">
                                    <h4><span>Detail Alat</span></h4>
                                    </div>
                             
                            </div>
                         <?php
                             include './koneksi/koneksi.php';

                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_alat where id_alat='$_GET[id]'");

                    $q=mysqli_fetch_array($sql);

                     ?>
                        <div class="blog_single">
                            <article class="post">
                                <figure class="post_img">
                                    <a href="./images/alat/<?php echo $q['ft_alat']; ?>" target="_blank">
                                        <img class="img-thumbnail img-single" src="./images/alat/<?php echo $q['ft_alat']; ?>" alt="blog post">
                                    </a>
                                </figure>
                              
                                <div class="post_content">
                                    <div class="post_meta">
                                        <h2>
                                            <a href="#"><?php echo $q['nm_alat']; ?></a>
                                        </h2>
                                    
                                         <div class="metaInfo">
                                             <span><i class="fa fa-money"></i> Harga Sewa:  <b class="harga-alt">Rp <?php  echo number_format($q['harga_sewa'],0,".",".");  ?> </b></span>/Hari
                                            
                                        </div>
                                    </div>
                                    <p><?php echo $q['spesifikasi']; ?></p>
                                </div>
                            
                            </article>
                        </div>  

                    </div>
                    <div class="col-xs-12 col-md-5  col-lg-5 col-sm-5  col-sm-5">
                        <div class="sidebar">
                            
                            <div class="widget widget_categories">
                                <div class="widget_title">
                                    <h4><span>BOOKING</span></h4>
                                    </div>
                                    <?php 
                                
                            include './koneksi/koneksi.php';

                          $auto=rand(000000,999999);
                            $_POST['id']="BK".$auto;

                            if(isset($_POST['b1'])){

                             if(empty($_SESSION[us])){
                                 echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Upsss!</strong> Anda Harus Login terlebih dahulu.
                                  </div>';
                             }elseif(empty($_POST['tgl']) or empty($_POST['jml']) or empty($_POST['lama'])){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Uppss!</strong> Harap Isi Form Semuanya.
                                  </div>';

                            }else{

                                   date_default_timezone_set("Asia/Jakarta");
                                   $tgl = date('Y-m-d H:i:s');
                                  $tgl1 = date('Y-m-d',strtotime($_POST['tgl']));
                                  $tgl2 = date('Y-m-d', strtotime('+'.$_POST['lama'].' days', strtotime($tgl1)));

                                $sql=mysqli_query($koneksi,"INSERT INTO `tb_booking`(`id_booking`, `id_alat`, `id_costumer`, `tgl_pakai`, `lama_booking`, `tgl_kembali`, `jumlah`, `subtotal`, `stt_booking`, `batas_waktu`, `kode`, `tgl_booking`) VALUES ('$_POST[id]','$_POST[ida]','$_SESSION[us]','$tgl1','$_POST[lama]','$tgl2','$_POST[jml]','$_POST[sub]','Pending',NULL,NULL,'$tgl')");

                                   echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Alat Berhasil dibooking.
                                  </div>';
                                  echo "<meta http-equiv=refresh content=0;url=index.php?p=pesanan-saya>";

                            }
                            }
                            ?>
                               <form id="contactForm" action="#" method="post" enctype="multipart/form-data">
                   
                              <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Tanggal Booking</label>
                                      <div class="input-group date" style="padding-bottom: 5px;">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                          <input type="text" name="tgl" class="form-control" placeholder="Tanggal" id="datepicker">
                                          </div>
                                    </div>
                                </div>
                            </div>
                              <br>
                                 <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="row">
                                        <div class="col-md-6">
                                         <label>Jumlah Booking</label>
                                              <input type="number" name="jml" class="form-control" placeholder="Jumlah Booking" id="jml">
                                          </div>
                                        <div class="col-md-6">
                                         <label>Lama Booking</label>
                                            <div class="input-group date" style="padding-bottom: 5px;">
                                          
                                              <input type="number" name="lama" onkeyup="hiju()" onfocus="hiju()" onchange="hiju()" onclick="hiju()" class="form-control" placeholder="Lama Booking" id="lama">
                                                <div class="input-group-addon">Hari</div>
                                              </div>
                                            </div>
                                           </div>
                                          </div>
                                    </div>
                                      
                                </div>
                                <input type="hidden" name="hrg" id="hrg" value="<?php echo $q['harga_sewa']; ?>">
                                <input type="hidden" name="ida" id="ida" value="<?php echo $q['id_alat']; ?>">
                               <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                     <label>Sub Total</label>
                                          <input type="text" name="sub" id="ta" class="form-control" placeholder="Sub Total" readonly>
                                    </div>
                                      
                                </div>
                            </div>
                            <br>
                            <script type="text/javascript">
                                  function hiju() {
                                    var hrg=document.getElementById('hrg').value;
                                    var jml= document.getElementById('jml').value;
                                    var lama= document.getElementById('lama').value;
                                    var ta= lama*jml*hrg;
                                     document.getElementById('ta').value = ta;
                                  }
                            </script>
                           <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="b1" class="btn btn-lg btn-default"><i class="fa fa-shopping-cart"></i> Booking</button>
                                   
                                </div>
                            </div>
                        </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
