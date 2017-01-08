<?php include_once('core/init.php'); ?>
<?php include_once('view/header.php'); ?>

<?php 
if(isset($_POST['btn-submit'])) {
    //print_r($_POST);    
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(cek_nama($username)){
        if(validasi_login($username, $password)) {
            echo '<div class="success">berhasil login</div>';
        } else {
            echo '<div class="error">gagal login</div>';
        }
    } else {
        echo '<div class="error">username tidak ada</div>';
    }

}

?>

<form action="login.php" method="post">

    <div class="form-register">
        <label>Username</label>
<br>
        <input type="text" name="username" />
    </div>

    <div class="form-register">
        <label>Password</label>
<br>
        <input type="password" name="password" />
    </div>

    <input type="submit" name="btn-submit" value="Login" />
    
</form>

<?php include_once('view/footer.php'); ?>
