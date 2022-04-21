<?php 
    if(!isset($_SESSION['user']))
    {
        $_SESSION['tidak-login'] = "<div class='gagal text-center'>Mohon login untuk mengakses panel admin.</div>";

        header('location:'.SITEURL.'admin/login.php');
    }
?>