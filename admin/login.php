<?php include('../confiq/constants.php');?>

<html>
    <head>
        <title>Login - Catering system</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="log_in">
            <h1 class="text-center">Login</h1>
            <br>


                <form action="" method="POST" class="text-center">
                    Username <br>
                    <input type="text" name="username" placeholder="masukan username"><br><br>
                    Password <br>
                    <input type="password" name="password" placeholder="masukan password"><br><br>

                    <input type="submit" name="submit" value="Login" class="btn-primary">
                </form>
                <br>
                <?php
                if(isset($_SESSION['login']))
               {
                 echo $_SESSION['login'];
                 unset($_SESSION['login']);
                }
                if(isset($_SESSION['tidak-login']))
                {
                    echo $_SESSION['tidak-login'];
                    unset($_SESSION['tidak-login']);
                }
            ?>
            <br>
            <p class="text-center">Catering Order</p>
            
        </div>


    </body>

</html>

<?php
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";

        $res = mysqli_query($conn, $sql);


        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['login'] = "<div class='sukses'>Login Berhasil.</div>";
            $_SESSION['user'] = $username;
            header('location:'.SITEURL.'admin/');
        }else{
            $_SESSION['login'] = "<div class='gagal text-center'>Username dan Password tidak cocok.</div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>