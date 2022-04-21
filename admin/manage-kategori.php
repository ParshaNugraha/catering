<?php include('isikonten/menu.php');?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Kategori</h1>
            <br/><br>
            <?php 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['remove']))
                {
                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
                }
                if(isset($_SESSION['Hapus']))
                {
                    echo $_SESSION['Hapus'];
                    unset($_SESSION['Hapus']);
                }
                if(isset($_SESSION['no-kategori']))
                {
                    echo $_SESSION['no-kategori'];
                    unset($_SESSION['no-kategori']);
                }
                if(isset($_SESSION['edit']))
                {
                    echo $_SESSION['edit'];
                    unset($_SESSION['edit']);
                }
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
                if(isset($_SESSION['gagal-hapus']))
                {
                    echo $_SESSION['gagal-hapus'];
                    unset($_SESSION['gagal-hapus']);
                }
            ?>

                <!--tombol penambahan admin-->
                <br><br><br>
                <a href="<?php echo SITEURL; ?>admin/tambah-kategori.php" class="btn-primary">Tambah Kategori</a>
            <br/><br/><br>
                <table class="tbl-full">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Tampilkan</th>
                        <th>Aktifkan</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                    
                        $sql = "SELECT * FROM tbl_category";

                        $res = mysqli_query($conn , $sql);

                        $count = mysqli_num_rows($res);

                        $sn=1;

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?>
                     <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $title; ?></td>

                        <td>
                        <?php 
                        
                                if($image_name!="")
                                {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/kategori/<?php echo $image_name; ?>" width="200px">
                                    <?php
                                }
                                else
                                {
                                    echo "<div class='gagal'>Gambar tidak ditambahkan.</div>";
                                }
                        
                        ?>
                        
                        </td>
                        
                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/edit-kategori.php?id=<?php echo $id; ?>" class="btn-kedua">Edit kategori</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-kategori.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-ketiga">Hapus kategori</a>
                        </td>
                    </tr>
                                <?php

                            }
                        }
                        else
                        {
                            ?>
                            <tr>
                                <td colspan="6"><div class="gagal">Kategori Tidak DItambahkah</div></td>
                            </tr>
                            <?php
                        }

                    ?>


                </table>
        </div>
    </div>

<?php include('isikonten/footer.php');?>