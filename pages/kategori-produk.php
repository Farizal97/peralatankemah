<!--start wrapper-->
<section class="wrapper">
 <section class="page_head">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="page_title">
                            <h2>Produk</h2>
                              <?php
                             include './koneksi/koneksi.php';

                    $sql2=mysqli_query($koneksi,"SELECT * FROM kategori_barang where kd_kategori='$_GET[id]'");

                      $q2=mysqli_fetch_array($sql2);

                     ?>
                            <span class="sub_heading">Kategori <b><?php echo $q2['nm_kategori']; ?></b></span>
                        </div>
                        <nav id="breadcrumbs">
                            <ul>
                                <li>You are here:</li>
                                <li><a href="index.php">Home</a></li>
                                <li>Produk</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
<!--End Slider-->
        <section class="feature_bottom">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-12 col-md-12 col-sm-12 wow fadeInUp">
                        <div class="dividerHeading">
                            <h4><span>Produk</span></h4>
                        </div>
                        <div class="row">

                            <?php

                             include './koneksi/koneksi.php';
                            

                                 // Cek apakah terdapat data pada page URL
                $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

                $limit = 9; // Jumlah data per halamanya

                // Buat query untuk menampilkan data ke berapa yang akan ditampilkan pada tabel yang ada di database
                $limit_start = ($page - 1) * $limit;

                    $sql=mysqli_query($koneksi,"SELECT * FROM data_barang where kd_kategori='$_GET[id]' LIMIT ".$limit_start.",".$limit );

                     $no = $limit_start + 1;

                      while($q=mysqli_fetch_array($sql)){

                     ?>
                                  <div class="col-lg-4 col-md-6 col-sm-6 rec_blog">
                                <div class="blogPic">
                                    <img alt="" src="./images/product/<?php echo $q['ft']; ?>">
                                    <div class="blog-hover">
                                        <a class="hover-zoom mfp-image" href="./images/product/<?php echo $q['ft']; ?>">
                                            <span class="icon">
                                                <i class="fa fa-search"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="blogDetail">
                                    <div class="blogTitle">
                                        <a href="#">
                                            <h2><?php echo $q['nm_barang']; ?></h2>
                                        </a>
                                        <span>
                                            <i class="fa fa-money"></i>
                                            <b>Rp <?php echo number_format($q['harga'],0,".","."); ?></b>
                                        </span>
                                    </div>
                                    <div class="blogContent">
                                        <p><?php echo $q['ket']; ?></p>
                                    </div>
                                   
                                     <div class="blogButton">
                                        <a href="index.php?p=single-produk&id=<?php echo $q['kd_barang']; ?>" class="btn btn-primary"> Selangkapnya</a>
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
                <li><a href="index.php?p=produk&&page=1">First</a></li>
                <li><a href="index.php?p=produk&&page=<?php echo $link_prev; ?>">&laquo;</a></li>
            <?php
            }
            ?>

            <!-- LINK NUMBER -->
            <?php

            // Buat query untuk menghitung semua jumlah data
            $sql2 = mysqli_query($koneksi,"SELECT * FROM data_barang where kd_kategori = '$_GET[id]' ");
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
                <li <?php echo $link_active; ?>><a href="index.php?p=produk&&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
                <li><a href="index.php?p=produk&&page=<?php echo $link_next; ?>">&raquo;</a></li>
                <li><a href="index.php?p=produk&&page=<?php echo $jumlah_page; ?>">Last</a></li>
            <?php
            }
            ?>
                            </ul>
                        </div>
                </div>
            </div>
        </section>

</section>