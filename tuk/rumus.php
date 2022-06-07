<?php 
function luas_persegi($sisi){
    $hasil = $sisi * $sisi;
    return $hasil;
}
function luas_segitiga($a,$t){
    $hasil = ($a*$t)/2;
    return $hasil;
}

function persegi(){
    echo '
    <p>Sisi Persegi</p>
        <input type="number" name="sisi" id="">
        <button type="submit" name="hitung_persegi">Hitung</button>
    
    ';
}

function segitiga(){
    echo '
    <p>Alas</p>
        <input type="number" name="alas" id="">
    <p>Tinggi</p>
        <input type="number" name="tinggi" id="">
        <button type="submit" name="hitung_segitiga">Hitung</button>
    
    ';
}
?>