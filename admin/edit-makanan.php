<?php include('isikonten/menu.php');?>

<?php 
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql2 = "SELECT * FROM tbl_food WHERE id=$id";

        $res2 = mysqli_query($conn, $sql2);

        $row2 = mysqli_fetch_assoc($res2);

        $title = $row2['title'];
        $deskripsi = $row2['deskripsi'];
        $harga = $row2['harga'];
        $current_image = $row2['image_name'];
        $current_category = $row2['category_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];
    }
    else
    {
        header('location:'.SITEURL.'admin/manage-food.php');
    }


?>
<div class="main-content">
<div class="wrapper">
        <h1>Edit Makanan/Minuman</h1>
         
        <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
        ?>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-kolom">
            
                <tr>
                    <td>Nama</td>
                    <td>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Deskripsi: </td>
                    <td>
                        <textarea name="deskripsi" cols="30" rows="5"><?php echo $deskripsi; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Harga: </td>
                    <td>
                        <input type="number" name="harga" value="<?php echo $harga; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Gambar</td>
                    <td>
                        <?php 
                            if($current_image == "")
                            {
                                echo "<div class='gagal'>Gambar Tidak Tersedia.</div>";
                            }
                            else
                            {
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/makan/<?php echo $current_image; ?>" width="200px">
                                <?php
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td> </td>
                    <td>
                    
                    </td>
                </tr>
                <tr>
                    <td>Kategori: </td>
                    <td>
                        <select name="kategori">
                        <?php 
                            $sql = "SELECT * FROM tbl_category WHERE active='Iya'";

                            $res = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($res);

                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];
                                
                                    //echo "<option value='$category_id'>$category_title</option>";
                                    ?>
                                    <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                    <?php
                                    
                                }
                            }
                            else
                            {
                                echo "<option value='0'>Kategori Tidak Tersedia.</option>";
                            }
                        
                        ?>


                            <option value="0">test kategori</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tampilkan: </td>
                    <td>
                        <input <?php if($featured=="Iya") {echo "checked";} ?> type="radio" name="featured" value="Iya">Iya
                        <input <?php if($featured=="Tidak") {echo "checked";} ?>  type="radio" name="featured" value="Tidak">Tidak
                    </td>
                </tr>
                <tr>
                    <td>Aktifkan </td>
                    <td>
                        <input  <?php if($active=="Iya") {echo "checked";} ?> type="radio" name="active" value="Iya">Iya
                        <input  <?php if($active=="Tidak") {echo "checked";} ?> type="radio" name="active" value="Tidak">Tidak
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                        <input type="submit" name="submit" value="Edit" class="btn-kedua">
                    </td>
                </tr>
            
            </table>
        </form>

        <?php 
            if(isset($_POST['submit']))
            {
                //echo "Button ditekan";
                $id = $_POST['id'];
                $title = $_POST['title'];
                $deskripsi = $_POST['deskripsi'];
                $harga = $_POST['harga'];
                $current_image = $_POST['current_image'];
                $category = $_POST['kategori'];

                $featured = $_POST['featured'];
                $active = $_POST['active'];

                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name !="")
                    {
                        $ext = end(explode('.', $image_name));

                        $image_name = "Nama-Makanan-".rand(0000, 9999).'.'.$ext;



                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/makanan/".$image_name;

                        $upload = move_uploaded_file($source_path, $destination_path);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='gagal'>Gagal Mengupload Gambar. </div>";
                            header('location:'.SITEURL.'admin/manage-makanan.php');
                            die();

                        }
                        if($current_image!="")
                        {
                            $remove_path = "../images/makanan/".$current_image;

                            $remove = unlink($remove_path);
    
                            if($remove==false)
                            {
                                $_SESSION['gagal-hapus'] = "<div class='gagal'>Gagal Menghapus Gambar Lama.</div>";
                                header('location:'.SITEURL.'admin/manage-makanan.php');
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


                $sql3 = "UPDATE tbl_food SET
                    title = '$title',
                    deskripsi = '$deskripsi',
                    harga = $harga,
                    image_name = '$image_name',
                    category_id = '$category',
                    featured = '$featured',
                    active = '$active'
                    WHERE id=$id
                
                ";

                $res3 = mysqli_query($conn, $sql3);

                if($res3==true)
                {
                    $_SESSION['update'] = "<div class='sukses'>Berhasil mengedit.</div>";
                }
                else
                {
                    $_SESSION['update'] = "<div class='gagal'>Gagal Mengedit.</div>";
                }
            }
        
        ?>
</div>
</div>


<?php include('isikonten/footer.php');?>