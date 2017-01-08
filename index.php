<?php

// Menyambungkan ke database
$link = mysqli_connect('localhost', 'root', 'R0ckmyta', 'tutorial_sekolahkoding');

// menguji error
if(!$link) {
    die('ada error '. mysqli_connect_error());
}

// memasukkan data ke database
$insert= "INSERT INTO murid(nama, umur, alamat) VALUES ('edy', 25, 'jl semangka')";
mysqli_query($link, $insert);

//$query = 'CREATE DATABASE tutorial_sekolahkoding123';
$alamt = 'jl jaksa';

// menampilkan data dari database
$query = "SELECT * FROM murid";

$hasil = mysqli_query($link, $query);

if(mysqli_num_rows($hasil) > 0) {
    while($data = mysqli_fetch_assoc($hasil)) {
        echo $data['nama']. " " . $data['umur']. " " .$data['alamat']."<br>"; 
   }
}

// menutup koneksi
mysqli_close($link);

?>
