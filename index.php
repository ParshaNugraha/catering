<?php include('konten-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Pencarian..." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }

    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Pilih Makanan/Minuman</h2>

            <?php
                $sql = "SELECT * FROM tbl_category WHERE featured='Iya' LIMIT 3";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                            <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    if($image_name=="")
                                    {
                                        echo "<div class='gagal'>Gambar Tidak Ditambahkan.</div>";
                                    }
                                    else
                                    {
                                        ?>
                                            <img src="<?php echo SITEURL; ?>images/kategori/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                            </a>

                        <?php
                    }
                }
                else
                {
                    echo "<div class='gagal'>Kategori tidak ditambahkan.</div>";
                }
            ?>




            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Menu</h2>

            <?php
                $sql2 = "SELECT * FROM tbl_food WHERE active='Iya' AND featured='Iya' LIMIT 6";

                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);

                if($count2>0)
                {
                    while($row=mysqli_fetch_assoc($res2))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $harga = $row['harga'];
                        $deskripsi = $row['deskripsi'];
                        $image_name = $row['image_name'];
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php 
                                        if($image_name=="")
                                        {
                                            echo "<div class='error'>Gambar tidak ada</div>";
                                        }
                                        else
                                        {
                                            ?> 
                                            <img src="<?php echo SITEURL; ?>images/makan/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>
                                    
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="food-price">Rp<?php echo $harga; ?></p>
                                    <p class="food-detail">
                                        <?php echo $deskripsi; ?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Pesan Sekarang</a>
                                </div>
                            </div>                       
                        <?php
                    }
                }
                else
                {
                    echo "<div class='gagal'>Makanan Tidak Tersedia.</div>";
                }
            ?>




            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="<?php echo SITEURL; ?>foods.php">Lihat Semua Menu</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('konten-front/footer.php'); ?>