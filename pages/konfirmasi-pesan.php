    <section class="wrapper">
        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>Konfirmasi Pembayaran</h2>
                           
                        </div>
                        <nav id="breadcrumbs">
                            <ul>
                                <li>You are here:</li>
                                <li><a href="index.php">Home</a></li>
                                <li>Konfirmasi</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="content about">
            <div class="container">
                <div class="row sub_content">
                     <div class="eve-tab sidebar-tab">
                                <ul id="myTab" class="nav nav-tabs">
                                    <li class="active"><a href="#Pesanan" data-toggle="tab">Konfirmasi Pembayaran</a></li>
                                   
                                </ul>

                                <div id="myTabContent" class="tab-content clearfix">
                                    <div class="tab-pane fade active in" id="Pesanan">
                                     
                                  <div class="col-md-12">
                                    <form method="post" action="#" enctype="multipart/form-data">

                                     <?php 
                           

                            $auto=rand(1111111,9999999);
                            $_POST['id']="KK".$auto;

                            $kode=rand();

                            

                            if(isset($_POST['b1'])){

                              $tmpf=$_FILES['bukti_pembayaran']['tmp_name'];
                                  $nmf=$_FILES['bukti_pembayaran']['name'];
                              
                            if(empty($_POST['rekening_pengirim']) or empty($_POST['jumlah_pembayaran']) or empty($nmf)){

                            echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Error!</strong> Data tidak boleh ada yang kosong.
                                  </div>';

                            }else{

                              date_default_timezone_set("Asia/Jakarta");

                                
                                  move_uploaded_file($tmpf,"./images/transaksi/".$nmf);

                                  $tgl=date('Y-m-d H:i:s');

                                $sql=mysqli_query($koneksi,"INSERT INTO `tb_konfirmasi`(`id_konfirmasi`, `kode`, `id_costumer`, `norek_costumer`, `norek_tujuan`, `nm_bank`, `jlm_bayar`, `bukti_bayar`, `tgl_input`) VALUES ('$_POST[id]','$_POST[kode]','$_SESSION[us]','$_POST[rekening_pengirim]','$_POST[rekening_tujuan]','$_POST[nmb]','$_POST[jumlah_pembayaran]','$nmf','$tgl')");
                                
                                 $sql2=mysqli_query($koneksi,"UPDATE tb_booking SET batas_waktu=NULL,stt_booking='Pengecekan' WHERE kode='$_GET[kd]'");

                                 echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>Sukses!</strong> Pemesanan anda berhasil dikonfirmasi, silahkan tunggu sesaat kami sedang melakukan pengecekan transaksi anda.
                                  </div>';
                                  echo "<meta http-equiv=refresh content=1;url=index.php?p=pesanan-saya>";
                            }
                            }
                            ?>
                                     
                                      <input type="hidden" name="kode" value="<?php echo $_GET['kd']; ?>">
                                        <div class="col-md-6">
                                      
                                      <div class="form-group">
                                        <label for="rekening_pengirim" class="control-label">Nama Bank</label>
                                        
                                        <select name="nmb" class="form-control">
                                          <option value="">-Pilih-</option>
                                          <option value="Bank Bri">BANK BRI</option>
                                          <option value="Bank Bni">BANK BNI</option>
                                          <option value="Bank Nagari">BANK MANDIRI</option>
                                          <option value="Bank Bca">BANK BCA</option>
                                          <option value="Bank Btn">BANK BTN</option>
                                        </select>
                                        <span>* Nomor rekening anda waktu melakukan pembayaran, jika tidak ada kosongkan saja.</span>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      
                                      <div class="form-group">
                                        <label for="rekening_pengirim" class="control-label">Nomor Rekening Pengirim</label>
                                        
                                        <input id="rekening_pengirim" type="text" class="form-control" name="rekening_pengirim" value="">
                                        <span>* Nomor rekening anda waktu melakukan pembayaran, jika tidak ada kosongkan saja.</span>
                                      </div>
                                    </div>
                                      <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="rekening_pengirim" class="control-label">Nomor Rekening Tujuan</label>
                                        
                                        <input id="rekening_pengirim" type="text" class="form-control" name="rekening_tujuan" value="9871983712" readonly>
                                        <span>* Nomor rekening tujuan anda melakukan pembayaran.</span>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="jumlah_pembayaran" class="control-label">Jumlah Pembayaran</label>
                                        
                                        <input id="jumlah_pembayaran" type="text" class="form-control" name="jumlah_pembayaran" value="" required autofocus>
                                        <span>* Jumlah anda melakukan pembayaran hingga 3 digit terakhir.</span>
                                      
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="bukti_pembayaran" class="control-label">Bukti Pembayaran</label>
                                        
                                        <input id="bukti_pembayaran" type="file" class="form-control" name="bukti_pembayaran" value="" required autofocus>
                                        <span>* Format support jpeg, jpg, png, gif ukuran maksimal 1 mb.</span>
                                       
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <button type="submit" name="b1" class="btn btn-default btn-lg ">
                                      <i class="fa fa-send"></i> Kirim
                                      </button>
                                    </div>
                                   
                                  </form>
                                  </div>
                                    
                                   
                                </div>
                            </div>
              
                </div>
             
            </div>
        </section>
    </section>
