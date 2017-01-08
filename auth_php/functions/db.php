<?php
define('EOL',"<br>");

$link = mysqli_connect('localhost','root','R0ckmyta','tutorial_sekolahkoding');

if(!$link) {
    echo "Koneksi ke database gagal".mysqli_connect_error().EOL; 
}

//mysqli_close($link);

?>
