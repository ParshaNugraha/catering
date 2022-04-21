<?php include('isikonten/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Tambah Kategori</h1>
            <br><br>

            <?php 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
            ?>
            <br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-kolom">
                <tr>
                    <td>Judul: </td>
                    <td>
                        <input type="text" name="title" placeholder="judul kategori">
                    </td>
                </tr>
                <tr>
                    <td>Pilih Gambar : </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td> Tampilkan : </td>
                    <td> 
                    <input type="radio" name="featured" value="Iya">Iya
                    <input type="radio" name="featured" value="Tidak">Tidak
                    </td>
                </tr>
                <tr>
                    <td>Aktifkan :</td>
                    <td>
                    <input type="radio" name="active" value="Iya">Iya
                    <input type="radio" name="active" value="Tidak">Tidak
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="tambahkan" class="btn-kedua">
                    </td>
                </tr>

            </table>
        </form>
        <?php 
            if(isset($_POST['submit']))
            {
                //echo "clicked";
                $title = $_POST['title'];
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "Tidak";
                }
                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $avtive = "Tidak";
                }

                //print_r($_FILES['image']);

                //die();
                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name !="")
                    {

                        $ext = end(explode('.', $image_name));

                        $image_name = "Kategori_Makanan_".rand(000, 999).'.'.$ext;



                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/kategori/".$image_name;

                        $upload = move_uploaded_file($source_path, $destination_path);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='gagal'>Gagal Mengupload Gambar. </div>";
                            header('location:'.SITEURL.'admin/tambah-kategori.php');
                            die();

                        }    
                    }
                }
                else
                {
                    $image_name="";
                }

                    $sql = "INSERT INTO tbl_category SET
                        title='$title',
                        image_name='$image_name',
                        featured='$featured',
                        active='$active'
                    ";

                    $res = mysqli_query($conn, $sql);

                    if($res==true)
                    {
                        $_SESSION['add'] = "<div class='sukses'>Kategori berhasil ditambahkan.</div>";
                        header('location:'.SITEURL.'admin/manage-kategori.php');
                    }
                    else
                    {
                        $_SESSION['add'] = "<div class='gagal'>Kategori gagal ditambahkan.</div>";
                        header('location:'.SITEURL.'admin/tambah-kategori.php');
                    }
            }
        
        ?>
    </div>

</div>

<?php include('isikonten/footer.php');?> 