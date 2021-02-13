<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

<?php
session_start();
include './../koneksi/koneksi.php';

    $username = $_POST['username'];
    $password = md5($_POST['password']);


        $sql = "select * from tb_admin where username='".$username."' and password='".$password."'";
        $query = mysqli_query($koneksi,$sql) or die (mysqli_error());
        $row = mysqli_num_rows($query);
        // jika $row > 0 atau username dan password ditemukan
        if($row > 0){
            $cid=mysqli_fetch_array($query);
            $_SESSION['id']=$cid['id_admin'];
            $_SESSION['isLoggedIn']='login';
            $_SESSION['nama']=$cid['nama'];
            $_SESSION['foto']=$cid['ft'];
            $_SESSION['level']=$cid['level'];
            header('Location: ../admin/admin.php');
        }else{
          echo "<script type='text/javascript'>
            alert('Username Atau Password Anda Salah..!');
            </script>";
        echo "<script> window.history.back(); </script>";
    }
    
?>