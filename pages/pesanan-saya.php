
    <section class="wrapper">
        <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>Pesanan Saya</h2>
                           
                        </div>
                        <nav id="breadcrumbs">
                            <ul>
                                <li>You are here:</li>
                                <li><a href="index.php">Home</a></li>
                                <li>Pesan saya</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="content contact">
          <div class="container">
                <div class="row sub_content">
                     <div class="eve-tab sidebar-tab">
                                <ul id="myTab" class="nav nav-tabs">
                                    <li class="active"><a href="#Pesanan" data-toggle="tab">Pesanan</a></li>
                                    <li class=""><a href="#Transaksi" data-toggle="tab">Histori Pesanan</a></li>
                                </ul>

                                <div id="myTabContent" class="tab-content clearfix">
                                <div class="tab-pane fade active in" id="Pesanan">
                           <div class="table-responsive">
                    <table id="example1" class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Alat</th>
                        <th>Tanggal Booking</th>
                        <th>Jumlah</th>
                        <th>Lama Booking</th>
                        <th>SubTotal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                     <?php
                     
                     $id=$_SESSION['us'];
                    
                      $no=0;$sub=0;$kode=0;$tobay=0;$stt="";
                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_booking,tb_alat WHERE tb_booking.id_alat=tb_alat.id_alat and tb_booking.id_costumer='$id' and tb_booking.stt_booking <> 'Lunas' and tb_booking.stt_booking <> 'Cancel'");
                    $n=mysqli_num_rows($sql);

                    if($n=="0"){
                       echo'<tr>
                        <td colspan="8"><br>Anda tidak memiliki pembookingan. <br></td></tr>';
                        }

                    while($q=mysqli_fetch_array($sql)){
                      $no++;
                      $stt=$q['stt_booking'];
                      $sub+=$q['subtotal'];
                      $kode=$q['kode'];
                      $tobay=$sub+$kode;
                      $bwaktu=$q['batas_waktu'];
                      $kd=$q['id_booking'];
                     
                
                      
                      ?>
                      <tr>
                        <td><br><?php echo $no; ?> <br></td>
                        <td><br><?php echo $q['nm_alat']; ?> <br></td>
                        <td><br><?php echo date('d M Y',strtotime($q['tgl_pakai'])); ?> <br></td>
                        <td><br><?php echo $q['jumlah']; ?></td>
                        <td><br><?php echo $q['lama_booking']; ?> Hari<br></td>
                        <td><br><?php echo $q['subtotal']; ?></td>
                        <td><br><?php if($stt=="Pending") echo "<span class='label label-info'>".$stt."</span>"; else echo "<span class='label label-warning'>".$stt."</span>"; ?> <br></td>

                        <?php if($stt=="Pending"){ ?>
                        <td><br><a href="./pages/cancel-pemesanan.php?&kd=<?php echo $kd; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin membatalkan pemesanan ini.?');"><i class="fa fa-close"></i></a></br></td>

                        <?php } ?>
                       </tr>

                      <?php } ?>
                      <tr>
                      <td colspan="4"></td> 
                         <td colspan="1"><b>Sub Total</b></td> 
                         <td colspan="3" style="font-size: 14px;"><b> Rp <?php  echo number_format($sub,0,".",".");  ?></b></td> 
                      </tr>
                       <tr>
                      <td colspan="4"></td> 
                         <td colspan="1"><b>Kode Bayar</b></td> 
                         <td colspan="3" style="font-size: 12px;"><b><?php echo $kode; ?></b></td> 
                      </tr>
                      <tr>
                      <td colspan="4"></td> 
                         <td colspan="1"><b>Total Pembayaran</b></td> 
                         <td colspan="3" style="font-size: 16px;"><b>Rp <?php  echo number_format($tobay,0,".",".");  ?></b></td> 
                      </tr>

                        <?php if($stt=="Pending") { ?>
                      <tr>
                         <td colspan="8"><a href="index.php?p=checkout" class="btn btn-default btn-lg" style="float: right;">Checkout</a></td> 
                      </tr>
                      <?php } ?>
                      <?php if($stt=="Checkout") { ?>
                      <tr>
                          <td colspan="7">Batas Pembayaran: 
                          <span style="color: #ea2c2c; font-weight: bold;"> 
                            <?php
                            date_default_timezone_set("Asia/Jakarta");
                            $awal=date_create($bwaktu);
                            $akhir=date_create();
                            $diff=date_diff($awal,$akhir);

                            echo $diff->h .' jam  ';
                            echo $diff->i .' menit. ';
                            ?>
                          </td>

                        </span>
                           
                         <td><a href="index.php?p=konfirmasi-pesan&kd=<?php echo $kode; ?>" class="btn btn-default btn-lg">Sudah Membayar</a></td> 
                      </tr>
                      <?php } ?>
                     <tbody>
                    <tfoot>
                      <tr>
                        <td>
                          <a href="index.php?p=sewa-alat" class="btn btn-default"> <i class="fa fa-arrow-left"></i> Booking Alat lainnya</a>
                        </td>

                      </tr>
                    </tfoot>
                  </table>
                </div>
                   </div> 

                  <!--  TAB TRANSAKSI  -->
                   <div class="tab-pane fade" id="Transaksi">
  <div class="table-responsive">
                      <table id="example1" class="table table-hover">
                      
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Tanggal Booking</th>
                        <th>Total Bayar</th>
                        <th>Jumlah Booking</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                     <?php
                     
                     $id=$_SESSION['us'];
                    
                      $no=0;
                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_booking,tb_alat WHERE tb_booking.id_alat=tb_alat.id_alat and tb_booking.id_costumer='$id' and tb_booking.stt_booking='Lunas' group by tb_booking.kode order by tb_booking.tgl_booking desc");
                     $n=mysqli_num_rows($sql);

                    if($n=="0"){
                       echo'<tr>
                        <td colspan="8"><br>Anda tidak memiliki histori pembookingan. <br></td></tr>';
                        }

                    while($q=mysqli_fetch_array($sql)){
                      $no++;
                      $jml=mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tb_booking WHERE kode='$q[kode]'"));
                       $ta=mysqli_fetch_array(mysqli_query($koneksi,"SELECT SUM(subtotal) AS tot FROM tb_booking WHERE kode='$q[kode]'"));
             
                     $stt=$q['stt_booking'];
                      $tot=$ta['tot'];

                   
                     

                  ?>
                      <tr>
                        <td><br><?php echo $no; ?> <br></td>
                        <td><br><?php echo $q['kode']; ?> <br></td>
                        <td><br><?php echo date('d M Y',strtotime($q['tgl_pakai'])); ?> <p></td>
                        
                        <td><br>Rp <b><?php echo number_format($tot,0,".","."); ?></b><br></td>
                        <td><br><?php echo $jml; ?><br></td>
                        <td><br><?php if($stt=="Lunas") echo "<span class='label label-success'>".$stt."</span>"; else echo "<span class='label label-danger'>".$stt."</span>"; ?> <br></td>

                        <?php if($stt=="Lunas"){ ?>
                                <td><br><a href="pages/cetak-pesanan-saya.php?&kd=<?php echo $q['kode']; ?>" class="btn btn-warning btn-sm" target="_blank"><i class="fa fa-print"></i></a></br></td>
                             
                        <?php }else{ ?>
                        <td><br></br></td>
                
                        <?php } ?>
                       </tr>

                      <?php } ?>
                      <tr>
                     
                     <tbody>
                    
                  </table>
                </div>
                   </div>
                        </div>  
                        <br>
                  <div class="alert alert-info alert-dismissible fade in" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">×</span></button>
                                  <strong>  Silahkan lakukan transfer atau kirim lewat rekening bank kami dibawah ini dan pastikan mengirim dengan nomor rekening yang benar serta total bayar sesuai dengan yang ada diatas sampat 3 digit terakhir .
                                  </div>
                
                               <blockquote class='default' style="font-size: 16px;">
                               <i class="fa fa-credit-card"></i> Bank BRI
                               <hr style="border: 1px solid #1abc9c;">
                               <h2> 04939284723</h2>
                               </blockquote>
                          
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!--end wrapper