 <!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="./images/adv.png"/>
    <title>Selamat Datang Di website - Perkemahan</title>
    <meta name="description" content="">

    <!-- CSS FILES -->
    <link rel="stylesheet" href="./plugins/bootstrap/css/bootstrap.min.css"/>
     <!-- Font Awesome -->
       <link rel="stylesheet" href="./plugins/datepicker/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="./plugins/font awesome/font-awesome.min.css">
    <link rel="stylesheet" href="./plugins/user style/css/style.css">
    <link rel="stylesheet" href="./plugins/user style/css/fractionslider.css"/>
    <link rel="stylesheet" href="./plugins/user style/css/style-fraction.css"/>
</head>
<body>
<!--Start Header-->
<header id="header">
    <div id="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div id="logo">
                        <h1><img src="./images/adv.png" alt="Everest"/></h1>
                    </div>
               
                </div>
                <div class="col-sm-9 top-info">
                    <ul>
                        <li><a href="admin" class="my-tweet"><i class="fa fa-user"></i></a></li>
                        
                    </ul>
                    <span class="hidden-xs"><i class="fa fa-phone"></i>Phone: 0822234344558</span>
                    <span class="hidden-xs"><i class="fa fa-envelope"></i>Email: riananurhasanah@gmail.com</span>
                </div>
            </div>
        </div>
    </div>
    <div class="pixel-header">
    
    </div>

    <!-- Navigation
================================================== -->
    <div class="navbar navbar-default navbar-static-top container" role="navigation">
        <div class="row">
            <span class="nav-caption"></span>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php?p=welcome">Home</a></li>
                    <li><a href="index.php?p=sewa-alat">Sewa Alat</a></li>
                    <li><a href="index.php?p=kontak">Kontak</a></li>
                </ul>
                 <ul class="nav navbar-nav navbar-right">
                         <?php 
                          error_reporting(0);
                         session_start();
                         include './koneksi/koneksi.php';

                         if($_SESSION['us']==""){

                        echo'
                         <li><a href="#modal-index" data-toggle="modal" data-target="#modal-index" id="0" class="login">Login</a></li>
                          <li><a href="index.php?p=daftar">Daftar</a></li>';

                            }else{
                               $id=$_SESSION['us'];
                                 $query4=mysqli_query($koneksi,"SELECT * FROM tb_penyewa WHERE id_costumer='$id'");
                                $q=mysqli_fetch_array($query4);
                                echo'
                                <li class="dropdown profil">
                                    <a href="#" class="dropdown-toggle a-profil" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    
                                    <img class="img-profil" src="./images/user.png"/>
                                    
                                      <span>'.$q['nama'].'</span></a>
                                      <ul class="dropdown-menu">
                                        <li><a href="index.php?p=profil"><i class="fa fa-user"></i> Profil</a></li>
                                        <li><a href="index.php?p=pesanan-saya"><i class="fa fa-shopping-cart"></i> Pesanan Tiket</a></li>
                                       
                                        <li><a href="./logout/logout-user.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                     </ul>
                                </li>';
                            }
                                ?>
                          </ul>
            </div>
        </div><!--/.row -->
    </div><!--/.container -->
</header>
 <div class="container">
                  <div class="modal fade" id="modal-index" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-login">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel" style="color: rgb(32,9,88);">Login</h4>
                        </div>
                        <form action="login/login.php" method="post">
                        <div class="modal-body">
                        
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" name="user" class="form-control" id="exampleInputEmail1" placeholder="Username">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                              </div>
                        </div>
                        <div class="modal-footer">
                            <p>
                            <button type="submit" class="btn btn-primary btn-lg btn-login" id="login" data-loading-text="Loading...">Login</button>
                        </p>
                        </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!--End Header-->


      <?php
     $page_dir='pages';
    if(!empty($_GET['p'])){
        $page=scandir($page_dir,0);
        unset($page[0],$page[1]);
        $p=$_GET['p'];
        if(in_array($p.'.php',$page)){
         include($page_dir.'/'.$p.'.php');
        }
        else{
        include ($page_dir.'/404-page.php');
        }
    }
    else{
        include ($page_dir.'/welcome.php');
    }
    ?>
<!--start footer-->
<footer class="footer">
    <div class="container">
        <div class="row">
   
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="widget_title">
                    <h4><span>Peralatan Terbaru</span></h4>
                </div>
                <div class="widget_content">
                    <ul class="links">
                           <?php
                             include './koneksi/koneksi.php';

                    $sql=mysqli_query($koneksi,"SELECT * FROM tb_alat order By tgl_input desc");

                      while($q=mysqli_fetch_array($sql)){

                     ?>
                        <li><a href="index.php?p=single-alat&id=<?php echo $q['id_alat']; ?>"><?php echo $q['nm_alat']; ?></a></li>
                        <?php } ?>
                      
                    </ul>
                </div>
            </div>
             <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="widget_title">
                    <h4><span>Kontak</span></h4>
                </div>
                <div class="widget_content">
                    <p>Anda Dapat menghubungi atau mengunjungi kami melalui kontak dibawah ini .</p>
                    <ul class="contact-details-alt">
                        <li><i class="fa fa-map-marker"></i> <p><strong>Alamat</strong>: Jl. Khatib sulaiman Padang </p></li>
                        <li><i class="fa fa-user"></i> <p><strong>Phone</strong>: 082213233784</p></li>
                        <li><i class="fa fa-envelope"></i> <p><strong>Email</strong>: <a href="mailto:riananurhasanah@gmail.com">riananurhasanah@gmail.com</a></p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--end footer-->

<section class="footer_bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p class="copyright">&copy; Copyright 2020 Riana NurHasanah</p>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="./plugins/jquery/jQuery-2.1.4.min.js"></script>
<script src="./plugins/bootstrap/js/bootstrap.min.js"></script>
            <script src="./plugins/datepicker/js/moment.js"></script>

     <script src="./plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>
     <script type="text/javascript">
      $(function () {
        
        $('#datepicker').datetimepicker({
                                  
          format: 'DD-MM-YYYY',
           sideBySide: true,
          widgetPositioning: {
              horizontal: 'right',
              vertical: 'bottom'
          }
        });

  });
</script>

<script src="./plugins/user style/js/jquery.fractionslider.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="./plugins/user style/js/jquery.smartmenus.min.js"></script>
<script type="text/javascript" src="./plugins/user style/js/jquery.smartmenus.bootstrap.min.js"></script>
    <script type="text/javascript" src="./plugins/user style/js/jquery.magnific-popup.min.js"></script>

<script src="./plugins/user style/js/main.js"></script>

<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="730ba0c5-1231-4bda-b7d5-9f91d3a50df4";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();
</script>

</body>
</html>