<?php
    include('../confiq/constants.php');
 //echo "hapus data";
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //echo"get and value";
        $id = $_GET['id'];
        $image_name =$_GET['image_name'];

        if($image_name !="")
        {
            $path = "../images/kategori/".$image_name;
            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['remove'] = "<div class='gagal'>Gagal Menghapus Gambar Kategori.</div>";
                header('location:'.SITEURL.'admin/manage-kategori.php');
                die();
            }
        }

        $sql = "DELETE FROM tbl_category WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['Hapus']="<div class='sukses'>Kategori Berhasil Dihapus.</div>";
            header('location:'.SITEURL.'admin/manage-kategori.php');
        }
        else
        {
            $_SESSION['Hapus']="<div class='gagal'>Kategori Gagal Dihapus.</div>";
            header('location:'.SITEURL.'admin/manage-kategori.php');
        }
    }
    else
    {
        header('location:'.SITEURL.'admin/manage-kategori.php');
    }
?>