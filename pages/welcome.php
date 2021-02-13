<!--start wrapper-->
<section class="wrapper">
<div class="slider-wrapper">
    <div class="slider">
        <div class="fs_loader"></div>
           <?php

             include './koneksi/koneksi.php';

             $no=1;

             $sql=mysqli_query($koneksi,"SELECT * FROM tb_alat order By tgl_input desc");

            while($q=mysqli_fetch_array($sql)){

                $isi_berita = strip_tags($q['spesifikasi']); 
                $isi = substr($isi_berita,0,50); 
                $isi = substr($isi_berita,0,strrpos($isi," "));

                $judul_berita = strip_tags($q['nm_alat']); 
                $judul = substr($judul_berita,0,50); 
                $judul = substr($judul_berita,0,strrpos($judul," "));

                if($no++==1){

            ?>

        <div class="slide">

            <img src="./images/fraction-slider/base.jpg" width="1920" height="auto" data-in="fade" data-out="fade" />

            <img src="./images/alat/<?php echo $q['ft_alat']; ?>" width="500" height="auto" data-position="60,1200" data-in="bottomLeft" data-out="fade" style="width:auto; height:auto" data-delay="500">

            <p class="slide-heading" data-position="130,380" data-in="top"  data-out="left" data-ease-in="easeOutBounce" data-delay="700"><?php echo $judul; ?> ...</p>

            <div class="sub-line" data-position="230,380" data-in="right" data-out="left" data-delay="1500"><?php echo $isi; ?> ...</div>

            <a href="index.php?p=single-alat&id=<?php echo $q['id_alat']; ?>" class="btn btn-default btn-lg" data-position="330,380" data-in="bottom" data-out="bottom" data-delay="2000">Selengkapnya</a>
        </div>

            <?php }elseif($no++==2){ ?>

        <div class="slide">

            <img src="./images/fraction-slider/base.jpg" width="1920" height="auto" data-in="fade" data-out="fade" />

            <img src="./images/alat/<?php echo $q['ft_alat']; ?>" width="500" height="auto" data-position="60,1200" data-in="bottomRight" data-out="fade" style="width:auto; height:auto" data-delay="500">

            <p class="slide-heading" data-position="130,380" data-in="bottom"  data-out="left" data-ease-in="easeOutBounce" data-delay="700"><?php echo $judul; ?> ...</p>

            <div class="sub-line" data-position="230,380" data-in="right" data-out="left" data-delay="1500"><?php echo $isi; ?> ...</div>

            <a href="index.php?p=single-alat&id=<?php echo $q['id_alat']; ?>"  class="btn btn-default btn-lg" data-position="330,380" data-in="bottom" data-out="bottom" data-delay="2000">Selengkapnya</a>
        </div>

         <?php }else{ ?>

        <div class="slide">

            <img src="./images/fraction-slider/base.jpg" width="1920" height="auto" data-in="fade" data-out="fade" />

            <img src="./images/alat/<?php echo $q['ft_alat']; ?>" width="500" height="auto" data-position="60,1200" data-in="topLeft" data-out="fade" style="width:auto; height:auto" data-delay="500">

            <p class="slide-heading" data-position="130,380" data-in="bottom"  data-out="left" data-ease-in="easeOutBounce" data-delay="700"><?php echo $judul; ?> ...</p>

            <div class="sub-line" data-position="230,380" data-in="right" data-out="left" data-delay="1500"><?php echo $isi; ?> ...</div>

            <a href="index.php?p=single-alat&id=<?php echo $q['id_alat']; ?>"  class="btn btn-default btn-lg" data-position="330,380" data-in="bottom" data-out="bottom" data-delay="2000">Selengkapnya</a>
        </div>

        <?php } } ?>
      
    </div>
</div>
<!--End Slider-->
        <section class="feature_bottom">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-12 col-md-12 col-sm-12 wow fadeInUp">
                        <div class="dividerHeading">
                            <h4><span>Peralatan Kemah</span></h4>
                        </div>
                        <div class="row">
                            <?php
                             include './koneksi/koneksi.php';
                             error_reporting(0);

                                 // Cek apakah terdapat data pada page URL
                $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

                $limit = 6; // Jumlah data per halamanya

                // Buat query untuk menampilkan daa ke berapa yang akan ditampilkan pada tabel yang ada di database
                $limit_start = ($page - 1) * $limit;

                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_alat LIMIT ".$limit_start.",".$limit );

                     $no = $limit_start + 1;

                      while($q=mysqli_fetch_array($sql)){

                        $isi_berita = strip_tags($q['spesifikasi']); 
                $isi = substr($isi_berita,0,150); 
                $isi = substr($isi_berita,0,strrpos($isi," "));

                     ?>
                                  <div class="col-lg-4 col-md-6 col-sm-6 rec_blog">
                                <div class="blogPic">
                                    <img alt="" src="./images/alat/<?php echo $q['ft_alat']; ?>">
                                    <div class="blog-hover">
                                        <a class="hover-zoom mfp-image" href="./images/alat/<?php echo $q['ft_alat']; ?>">
                                            <span class="icon">
                                                <i class="fa fa-search"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="blogDetail">
                                    <div class="blogTitle">
                                        <a href="index.php?p=single-alat&id=<?php echo $q['id_alat']; ?>">
                                            <h2><?php echo $q['nm_alat']; ?></h2>
                                        </a>
                                        <span class="harga-alt">
                                           
                                            <b>Rp <?php  echo number_format($q['harga_sewa'],0,".",".");  ?> </b> 
                                        </span>/ hari
                                    </div>
                                    <div class="blogContent">
                                        <p><?php echo $isi; ?> ...</p>
                                    </div>
                                   
                                     <div class="blogButton">
                                        <a href="index.php?p=single-alat&id=<?php echo $q['id_alat']; ?>" class="btn btn-default"> Selangkapnya</a>
                                    </div>
                                    
                                </div>
                            </div>
                                <?php $no++; } ?>

                        </div>
                    </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                            <ul class="pagination pull-left mrgt-0">
                                <?php
            if ($page == 1) { // Jika page adalah pake ke 1, maka disable link PREV
            ?>
                <li class="disabled"><a href="#">First</a></li>
                <li class="disabled"><a href="#">&laquo;</a></li>
            <?php
            } else { // Jika buka page ke 1
                $link_prev = ($page > 1) ? $page - 1 : 1;
            ?>
                <li><a href="index.php?p=welcome&&page=1">First</a></li>
                <li><a href="index.php?p=welcome&&page=<?php echo $link_prev; ?>">&laquo;</a></li>
            <?php
            }
            ?>

            <!-- LINK NUMBER -->
            <?php

            // Buat query untuk menghitung semua jumlah data
            $sql2 = mysqli_query($koneksi,"SELECT * FROM tb_alat");
            $get_jumlah = mysqli_num_rows($sql2);

             if($get_jumlah==0){
                
                $jumlah_page==0;
            }
            else{
            $jumlah_page = $get_jumlah / $limit; // Hitung jumlah halamanya
        }
            $jumlah_number = 5; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
            $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1; // Untuk awal link member
            $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number

            for ($i = $start_number; $i <= $end_number; $i++) {
                $link_active = ($page == $i) ? 'class="active"' : '';
            ?>
                <li <?php echo $link_active; ?>><a href="index.php?p=welcome&&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php
            }
            ?>

            <!-- LINK NEXT AND LAST -->
            <?php
            // Jika page sama dengan jumlah page, maka disable link NEXT nya
            // Artinya page tersebut adalah page terakhir
            if ($page == $jumlah_page) { // Jika page terakhir
            ?>
                <li class="disabled"><a href="#">&raquo;</a></li>
                <li class="disabled"><a href="#">Last</a></li>
            <?php
            } else { // Jika bukan page terakhir
                $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
            ?>
                <li><a href="index.php?p=welcome&&page=<?php echo $link_next; ?>">&raquo;</a></li>
                <li><a href="index.php?p=welcome&&page=<?php echo $jumlah_page; ?>">Last</a></li>
            <?php
            }
            ?>
                            </ul>
                        </div>
                </div>
            </div>
        </section>

</section>