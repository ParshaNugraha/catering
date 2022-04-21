<?php 
    include('../confiq/constants.php');
        //echo "sada";

    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        //echo "proses";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path = "../images/makan/".$image_name;

            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['upload'] = "<div class='gagal'>Gagal Menghapus Gambar.</div>";
                header('location:'.SITEURL.'admin/manage-makanan.php');
                die();
            }
        }

        $sql = "DELETE FROM tbl_food WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['hapus'] = "<div class='sukses'>Berhasil Menghapus.</div>";
            header('location:'.SITEURL.'admin/manage-makanan.php');
        }
        else
        {
            $_SESSION['hapus'] = "<div class='gagal'>Gagal Menghapus.</div>";
            header('location:'.SITEURL.'admin/manage-makanan.php');
        }
    }
    else
    {
        //echo "redirect";
        $_SESSION{'akses'} = "<div class='gagal'>Akses tidak sah.</div>";
        header('location:'.SITEURL.'admin/manage-makanan.php');
    }
?>