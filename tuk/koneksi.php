<?php 
$koneksi = mysqli_connect('localhost','root','','tuk') or die(mysqli_erorr($koneksi));
if(!$koneksi){
    echo "Koneksi Gagal";
}
?>