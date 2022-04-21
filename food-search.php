<?php include('konten-front/menu.php') ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php 
                $search = $_POST['search'];
            
            ?>

                 <h2>Pencarian<a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>


        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
        <h2 class="text-center">Makanan atau Minuman</h2>

            <?php
                 

                $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR deskripsi LIKE '%$search%'";
                
                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $deskripsi = $row['deskripsi'];
                        $harga = $row['harga'];
                        $image_name = $row['image_name'];
                        ?>
                                <div class="food-menu-box">
                                    <div class="food-menu-img">
                                        <?php 
                                        if($image_name=="")
                                        {
                                            echo "<div class='gagal'>Gambar Tidak Tersedia.</div>";
                                        }
                                        else
                                        {
                                            ?>
                                                <img src="<?php echo SITEURL; ?>images/makan/<?php echo $image_name; ?>" class="img-responsive img-curve">
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

                                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                                    </div>
                                </div>
                        <?php
                    }
                }   
                else
                {
                    echo "<div class='gagal'>Makanan/Minuman Tidak Ditemukan.</div>";
                }
            ?>




            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('konten-front/footer.php'); ?>