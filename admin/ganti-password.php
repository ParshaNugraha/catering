<?php include('isikonten/menu.php');?>

 <div class="main-content">
     <div class="wrapper">
         <h1>Ganti Password</h1>
         <br><br>

            <?php 
                if(isset($_GET['id']))
                {
                    $id=$_GET['id'];
                }
            ?>

        <form action="" method="POST">

            <table class="tbl-kolom">
                <tr>
                    <td>Password Sekarang: </td>
                    <td>
                        <input type="password" name="old_password" placeholder="password sekarang">
                    </td>
                </tr>
                <tr>
                    <td>Password Baru: </td>
                    <td>
                        <input type="password" name="new_password" placeholder="password baru">
                    </td>
                </tr>
                <tr>
                    <td>Konfirmasi</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="konfirmasi password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="ganti password" class="btn-kedua">
                    </td>
                </tr>
            </table>

        </form>

     </div>
 </div>

<?php 

    if(isset($_POST["submit"]))
    {
        //echo "clicked";
        $id=$_POST['id'];
        $old_password = md5($_POST['old_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$old_password'";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $count= mysqli_num_rows($res);

            if($count==1)
            {
                //echo "user found";
                if($new_password==$confirm_password)
                {
                    //echo "Password cocok";
                    $sql2 = "UPDATE tbl_admin SET
                        password='$new_password'
                        WHERE id=$id
                    ";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==true)
                    {
                        $_SESSION['ganti-pass'] = "<div class='sukses'>berhasil mengganti password. </div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
                    }else{
                        $_SESSION['ganti-pass'] = "<div class='gagal'>gagal mengganti password. </div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }else{
                    $_SESSION['pass-tidak-sama'] = "<div class='gagal'>password tidak cocok. </div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }else{
                $_SESSION['user-not-found'] = "<div class='gagal'>user tidak ditemukan. </div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }

    }

?>


<?php include('isikonten/footer.php');?>