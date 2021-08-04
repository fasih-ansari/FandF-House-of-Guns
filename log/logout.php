<?php
	session_start();
    if(session_destroy()){
        echo "<script type='text/javascript'> alert ('you are now logged out!! ') </script>";       
    } 
    //  header("location: login.php");
?>