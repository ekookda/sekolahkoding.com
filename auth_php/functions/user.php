<?php
    function register_user($name, $pass) {
        global $link;
    
        // mencegah sql injection
        $name = mysqli_real_escape_string($link, $name);
        $pass = mysqli_real_escape_string($link, $pass);

        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (id, username, password) VALUES (NULL, '$name', '$pass')";

        if(mysqli_query($link, $query)) {
            return true; 
        } else {
            return false;
        }
    }

    function register_cek_nama($name) {
        global $link;

        $name = mysqli_real_escape_string($link, $name);

        $query = "SELECT * FROM users WHERE username='$name'";

        if($result = mysqli_query($link, $query)) {
            if(mysqli_num_rows($result) == 0) return true;
            else return false; 
        }
    }

    function validasi_login($name, $pass) {
        global $link;

        // Mencegah SQL Injection
        $name = mysqli_real_escape_string($link, $name);
        $pass = mysqli_real_escape_string($link, $pass);

        $query = "SELECT * FROM users WHERE username='$name'";

        $exec  = mysqli_query($link, $query);

        if(mysqli_num_rows($exec) == 1):
            $row = mysqli_fetch_assoc($exec);
            
            if(password_verify($pass, $row['password'])){
                echo "Password is valid";
                $_SESSION['user'] = $name;
            } else {
                echo "Password is not valid";
            }
        else:
            echo "Username ".$name." belum terdaftar";   
        endif;
    }
?>
