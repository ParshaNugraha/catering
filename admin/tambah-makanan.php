<?php include('isikonten/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Tambah Makanan/Minuman</h1>
    

        <br><br>
        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        
        
        ?>


        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl=kolom">
            <tr>
             <td>Judul: </td>
             <td>
             <input type="text" name="title" placeholder=" judul makanan">
             </td>
            </tr>
            <tr>
                <td>Deskripsi: </td>
                <td>
                    <textarea name="deskripsi" cols="30" rows="5" placeholder=" deskripsi makanan"></textarea>
                </td>
            </tr>
            <tr>
                    <td>Harga: </td>
                    <td>
                        <input type="number" name="harga" >
                    </td>                
            </tr>
            <tr>
                    <td>Pilih Gambar: </td>
                    <td>
                    <input type="file" name="image">
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
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php

                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="0">Kategori Tidak Ditemukan</option>
                                    <?php
                                }
                            
                            ?>




                         
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tampilkan: </td>
                    <td>
                        <input type="radio" name="featured" value="Iya">Iya
                        <input type="radio" name="featured" value="Tidak">Tidak
                    </td>
                </tr>
                <tr>
                    <td>Aktifkan: </td>
                        <td>
                            <input type="radio" name="active" value="Iya">Iya
                            <input type="radio" name="active" value="Tidak">Tidak
                        </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Tambahkan" class="btn-kedua">
                    </td>
                </tr>
        </table>
        
        </form>

        <?php

                if(isset($_POST['submit']))
                {
                    $title = $_POST['title'];
                    $deskripsi = $_POST['deskripsi'];
                    $harga = $_POST['harga'];
                    $category = $_POST['kategori'];

                    if(isset($_POST['featured']))
                    {
                        $featured = $_POST['featured'];
                    }
                    else
                    {
                        $featured = "No";
                    }

                    if(isset($_POST['active']))
                    {
                        $active = $_POST['active'];
                    }
                    else
                    {
                        $active = "No";
                    }

                    if(isset($_FILES['image']['name']))
                    {
                        $image_name = $_FILES['image']['name'];

                        if($image_name!="")
                        {
                            $ext = end(explode('.', $image_name));

                            $image_name = "Nama-Makanan-".rand(0000,9999).".".$ext;

                            $src = $_FILES['image']['tmp_name'];

                            $dst = "../images/makan/".$image_name;

                            $upload = move_uploaded_file($src, $dst);

                            if($upload==false)
                            {
                                $_SESSION['upload'] = "<div class='gagal'>Gagal Mengupload Gambar.</div>";
                                    header('location:'.SITEURL.'admin/tambah-makanan.php');
                                die();
                            }


                        }
                    }
                    else
                    {
                        $image_name = "";
                    }

                    $sql2 = "INSERT INTO tbl_food SET
                    title = '$title',
                    deskripsi = '$deskripsi',
                    harga = $harga,
                    image_name = '$image_name',
                    category_id = $category,
                    featured = '$featured',
                    active = '$active'
                ";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2 == true)
                    {
                        $_SESSION['tambah'] = "<div class='sukses'>Berhasil Menambahkan.</div>";
                        header('location:'.SITEURL.'admin/manage-makanan.php');
                    }
                    else
                    {
                        $_SESSION['tambah'] = "<div class='gagal'>Gagal Menambahkan.</div>";
                        header('location:'.SITEURL.'admin/manage-makanan.php');
                    }
                }

        ?>
    </div>
</div>
<?php include('isikonten/footer.php');?>