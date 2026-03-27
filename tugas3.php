<?php 
// Array Function
$mobil = ['BMW','Toyota','Porsche','Tesla', 'Genesis'];
// is_array()
$res = is_array($mobil);
var_dump($res);
// count()
$jumlahArray = count($mobil);
echo "Jumlah mobil: " . $jumlahArray . "\n";
// sort()
sort($mobil);
foreach ($mobil as $key => $val) {
    echo "merek_mobil[" . $key . "] = " . $val . "\n";
}
// shuffle()
shuffle($mobil);
print_r($mobil);
echo "\n\n";
// String
// mengambil data pertama setelah diacak
$nama_mobil = $mobil[1];
// ambil sebagian string
$sub = substr($nama_mobil,2,5);

echo "Nama mobil: " . $nama_mobil . "\n";
echo "Potongan: " . $sub . "\n";
?>