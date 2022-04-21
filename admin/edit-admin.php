<?php include('isikonten/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Edit</h1>

            <br><br>

            <?php 
                $id=$_GET['id'];

                $sql="SELECT * FROM tbl_admin WHERE id=$id";

                $res=mysqli_query($conn, $sql);

                if($res==true)
                {
                    $count = mysqli_num_rows($res);

                    if($count==1)
                    {
                        //echo "Admin tersedia";
                        $row=mysqli_fetch_assoc($res);

                        $Nama = $row['Nama'];
                        $username = $row['username'];
                    }
                    else
                    {
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
            ?>

        <form action="" method="POST">

        <table class="tbl-kolom">
            <tr>
                <td>Nama</td>
                <td>
                    <input type="text" name="Nama" value="<?php echo $Nama; ?>">
                </td>
            </tr>
            <tr>
                <td>Username</td>
                <td>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="edit" class="btn-kedua">
                </td>
            </tr>

        </table>
        </form>
    </div>
</div>

<?php

    if(isset($_POST['submit']))
    {
        //echo "button clicked";
        $id = $_POST['id'];
        $Nama= $_POST['Nama'];
        $username = $_POST['username'];

        $sql = "UPDATE tbl_admin SET
        Nama = '$Nama',
        username = '$username'
        WHERE id='$id'
        ";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['update'] = "<div class='sukses'> Edit berhasil.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else{
            $_SESSION['update'] = "<div class='gagal'> Edit gagal.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }

?>

<?php include('isikonten/footer.php');?>