<?php
    if(isset($_POST['logout'])){

        session_regenerate_id();
        unset($_COOKIE);
        session_destroy();
        session_unset();
        header("location:login.php");
    }
?>