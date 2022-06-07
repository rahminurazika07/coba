<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    include 'koneksi.php';
    include 'rumus.php';?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <?php 
        $sql3 = mysqli_query($koneksi,"SELECT COUNT(bangun_data) as jum FROM hitung GROUP BY bangun_data")or die(mysqli_error($koneksi));
        $persen = mysqli_fetch_assoc($sql3);
        $nilai = $persen['jum']/100;
        echo $nilai." % ";
        ?>
        <button type="submit" name="persegi">Persegi</button>
        <button type="submit" name="segitiga">Segitiga</button>
        <?php 
        if(isset($_POST['persegi'])){
            persegi();
        }elseif (isset($_POST['segitiga'])) {
            segitiga();
        }
        ?>
    </form>

    <?php 
    if(isset($_POST['hitung_persegi'])){
        echo "<br>";
        $hasil = luas_persegi($_POST['sisi']);
        $sql = mysqli_query($koneksi,"INSERT INTO hitung VALUES('','Persegi','$hasil')") or die(mysqli_error($koneksi));

        $sql1 = mysqli_query($koneksi,"SELECT * FROM hitung where bangun_data='Persegi'")or die(mysqli_error($koneksi));
        $data='';
        
        while ($dt=mysqli_fetch_array($sql1)) {
            $data.= date('Y-m-d').' Nama Bangun Data : '.$dt['bangun_data'].' Dengan Luas '.$dt['luas'].' | '; 
        }
        
        $nama       = trim('Persegi');  
        $namafile = "$nama.txt";  
        $isi      = trim($data);  
        $file = fopen($namafile,"w");  
        fwrite($file,$isi);  
        fclose($file);  
        echo "<h2>Hasil Penyimpanan Data</h2>";  
        echo "<hr>";  
        echo "Hasil : <a href='$namafile'> $namafile </a>";
    } elseif (isset($_POST['hitung_segitiga'])){
        echo "<br>";
        $hasil = luas_segitiga($_POST['alas'], $_POST['tinggi']);
        $sql = mysqli_query($koneksi,"INSERT INTO hitung VALUES('','Segitiga','$hasil')") or die(mysqli_error($koneksi));

        $sql1 = mysqli_query($koneksi,"SELECT * FROM hitung where bangun_data='Segitiga'")or die(mysqli_error($koneksi));
        $data='';
        
        while ($dt=mysqli_fetch_array($sql1)) {
            $data.= date('Y-m-d').' Nama Bangun Data : '.$dt['bangun_data'].' Dengan Luas '.$dt['luas'].' | '; 
        }
        $nama       = trim('Segitiga');  
        $namafile = "$nama.txt";  
        $isi      = trim($data);  
        $file = fopen($namafile,"w");  
        fwrite($file,$isi);  
        fclose($file);  
        echo "<h2>Hasil Penyimpanan Data</h2>";  
        echo "<hr>";  
        echo "Hasil : <a href='$namafile'> $namafile </a>";
    }
    
    ?>
</body>
</html>