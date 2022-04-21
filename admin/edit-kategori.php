<?php include('isikonten/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Edit Kategori</h1>

            <br><br>
    <?php 
        if(isset($_GET['id']))
        {
            //echo "sadwdsadaw";
            $id = $_GET['id'];

            $sql = "SELECT * FROM tbl_category WHERE id=$id";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count==1)
            {
                $row= mysqli_fetch_assoc($res);
                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
            }
            else
            {
                $_SESSION['no-kategori'] = "<div class='gagal'>Kategori Tidak Ditemukan.</div>";
                header('location:'.SITEURL.'admin/manage-kategori.php');
            }
        }
        else
        {
            header('location:'.SITEURL.'admin/manage-kategori.php');
        }
    
    ?>


        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-kolom">
                <tr>
                    <td>Judul:</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Gambar Lama:</td>
                    <td>
                        <?php
                            if($current_image !="")
                            {
                                ?>
                                <img src="<?php echo  SITEURL; ?>images/kategori/<?php echo $current_image; ?>" width="200px">
                                <?php
                            }
                            else
                            {
                                echo "<div class='gagal'>Gambar Tidak Ditambahkan.</div>";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Gambar baru: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Tampilkan: </td>
                    <td>
                        <input <?php if($featured=="Iya")echo "checked";?> type="radio" name="featured" value="Iya">Iya
                        <input <?php if($featured=="Tidak")echo "checked";?> type="radio" name="featured" value="Tidak">Tidak
                    </td>
                </tr>
                <tr>
                    <td>Aktifkan: </td>
                    <td>
                        <input <?php if($active=="Iya")echo "checked";?> type="radio" name="active" value="Iya">Iya
                        <input <?php if($active=="Tidak")echo "checked";?> type="radio" name="active" value="Tidak">Tidak
                    </td>
                </tr>
                <tr>
                    <td>
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Edit Kategori" class="btn-kedua">
                    </td>
                </tr>
            </table>
        </form>

        <?php 
            if(isset($_POST['submit']))
            {
                //echo "wadsdaw";
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

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
                            header('location:'.SITEURL.'admin/manage-kategori.php');
                            die();

                        }
                        if($current_image!="")
                        {
                            $remove_path = "../images/kategori/".$current_image;

                            $remove = unlink($remove_path);
    
                            if($remove==false)
                            {
                                $_SESSION['gagal-hapus'] = "<div class='gagal'>Gagal Menghapus Gambar Lama.</div>";
                                header('location:'.SITEURL.'admin/manage-kategori.php');
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                }
                else
                {
                    $image_name = $current_image;
                }


                $sql2 = "UPDATE tbl_category SET
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                    WHERE id=$id
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    $_SESSION['edit'] = "<div class='sukses'>Berhasil Mengedit Kategori.</div>";
                    header('location:'.SITEURL.'admin/manage-kategori.php');
                }
                else
                {
                    $_SESSION['edit'] = "<div class='gagal'>Gagal Mengedit Kategori.</div>";
                    header('location:'.SITEURL.'admin/manage-kategori.php');
                }
                
            }
        
        ?>

    
    </div>
</div>


<?php include('isikonten/footer.php');?>