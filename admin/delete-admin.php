<?php 

include('../confiq/constants.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    $res = mysqli_query($conn, $sql);

if($res==true)
{
    //echo "Admin berhasil dihapus";
    $_SESSION['delete'] = "<div class= 'sukses'>Admin berhasil dihapus.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}else{
    //echo "Gagal menghapus Admin";
    $_SESSION['delete'] = "<div class= 'gagal'>gagal menghapus Admin.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}

?>