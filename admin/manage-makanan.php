<?php include('isikonten/menu.php');?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Makanan</h1>
            <br/><br><br>
                <!--tombol penambahan admin-->
                <a href="<?php echo SITEURL; ?>admin/tambah-makanan.php" class="btn-primary">Tambah Makanan</a>
            <br/><br/><br>

            <?php 
            if(isset($_SESSION['tambah']))
            {
                echo $_SESSION['tambah'];
                unset($_SESSION['tambah']);
            }
            if(isset($_SESSION['hapus']))
            {
                echo $_SESSION['hapus'];
                unset($_SESSION['hapus']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['akses']))
            {
                echo $_SESSION['akses'];
                unset($_SESSION['akses']);
            }

        
        
        ?>
                <table class="tbl-full">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Tampilkan</th>
                        <th>Aktifkan</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        $sql = "SELECT * FROM tbl_food";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                        $sn=1;

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];
                                $harga = $row['harga'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td>Rp <?php echo $harga; ?></td>
                                        <td>
                                            <?php
                                                if($image_name=="")
                                                {
                                                    echo "<div class='gagal'>Gambar Tidak Ditambahkan.</div>";
                                                }
                                                else
                                                {
                                                    ?>
                                                    <img src="<?php echo SITEURL;?>images/makan/<?php echo $image_name; ?>" width="200px">
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/edit-makanan.php?id=<?php echo $id; ?>" class="btn-kedua">Edit</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-makanan.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-ketiga">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<tr><td colspan='7' class='gagal'> Makanan tidak ditambahkan </td></tr>";
                        }
                    ?>

                </table>
        </div>
    </div>

<?php include('isikonten/footer.php');?>