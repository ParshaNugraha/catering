<?php include("isikonten/menu.php");?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Tambah Admin</h1>

            <br><br>
            <?php
                 if(isset($_SESSION['tambah']))
                 {
                     echo $_SESSION['tambah'];
                     unset($_SESSION['tambah']);
                 }
            ?>

            <form action="" method="POST">
                <table class="tbl-kolom">
                    <tr>
                        <td>Nama</td>
                        <td>
                            <input type="text" name="Nama" placeholder="Masukan Namamu">
                        </td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>
                            <input type="text" name="username" placeholder="Masukan Usernamemu">
                        </td>
                    </tr>
                    <tr>
                    <td>Password</td>
                        <td>
                            <input type="password" name="password" placeholder="Masukan Passwordmu">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Tambah" class="btn-kedua">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>


<?php include("isikonten/footer.php");?>

<?php 
    //proses value dari form dan menyimpannya ke database
    if(isset($_POST['submit']))
    {
        $Nama = $_POST['Nama'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //password emcryption dengan md5

        $sql = "INSERT INTO tbl_admin SET
           Nama='$Nama',
           username='$username',
           password='$password'
           ";
 

        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res==TRUE)
        {
            //echo "Data berhasil dimasukan";
            $_SESSION['tambah'] = "<div class='sukses'>Admin berhasil ditambahkan. </div>";
            header("location: ".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //echo "Data gagal dimasukan";
            $_SESSION['tambah'] = "<div class='gagal'>Gagal menambahkan Admin. </div>";
            header("location: ".SITEURL.'admin/tambah-admin.php');
        }
    }
?>