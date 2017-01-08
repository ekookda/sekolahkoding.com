<?php require_once("core/init.php"); ?>

<?php require_once("view/header.php"); ?>

<?php
if(isset($_POST['submit'])) {
    //print_r($_POST); die();
    $name = $_POST['username'];
    $pass = $_POST['password'];

    if(!empty(trim($name)) && !empty(trim($pass))){
        if(register_cek_nama($name)){
            if(register_user($name, $pass)) {
                echo "Berhasil";
            } else {
                echo "Gagal ".mysqli_error($link);
            }
        } else {
            echo "User sudah terdaftar";
        }        
    } else {
        echo "Tidak boleh kosong!";
    }
}
?>

<!-- Form Register -->
<form action="register.php" method="post">
    <div class="form-register">
        <label>Nama</label><br>
        <input type="text" name="username" />
    </div>
    
    <div class="form-register"> 
        <label>Password</label><br>
        <input type="password" name="password" />
    </div>

    <input type="submit" name="submit" value="Daftar" />

</form>

<?php require_once("view/footer.php"); ?>
