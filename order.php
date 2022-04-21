<?php include('konten-front/menu.php'); ?>

    <?php
        if(isset($_GET['food_id']))
        {
            $food_id = $_GET['food_id'];

            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count==1)
            {
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $harga = $row['harga'];
                $image_name = $row['image_name'];

            }
            else
            {
                header('location:'.SITEURL);
            }
        } 
        else
        {
            header('location:'.SITEURL);
        }
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Isi data dibawah untuk mengkonfirmasi pesanan anda.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Makanan/Minuman yang terpilih</legend>

                    <div class="food-menu-img">
                        <?php 
                            if($image_name=="")
                            {
                                echo "<div class='gagal'>Gambar tidak tersedia.</div>";
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
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="makanan" value="<?php echo $title; ?>">
                        <p class="food-price">Rp<?php echo $harga; ?></p>
                        <input type="hidden" name="harga" value="<?php echo $harga; ?>">

                        <div class="order-label">Jumlah</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Rincian Pengiriman</legend>
                    <div class="order-label">Nama</div>
                    <input type="text" name="full-name" placeholder="Masukan Nama Anda" class="input-responsive" required>

                    <div class="order-label">Nomor HP</div>
                    <input type="tel" name="contact" placeholder="isi no HP anda" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="isi email anda" class="input-responsive" required>

                    <div class="order-label">Alamat</div>
                    <textarea name="address" rows="10" placeholder="isi alamat secara detail" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 
                if(isset($_POST['submit']))
                {
                    $food = $_POST['makanan'];
                    $harga = $_POST['harga'];
                    $qty = $_POST['qty'];

                    $total = $harga * $qty;

                    $order_date = date("Y-m-d h:i:sa");

                    $status = "Dipesan";

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];

                    $sql2 = "INSERT INTO tbl_pesan SET
                        makanan = '$food',
                        harga = $harga,
                        qty = $qty,
                        total = $total,
                        waktu_pesan = '$order_date',
                        status = '$status',
                        nama_customer = '$customer_name',
                        kontak_customer = '$customer_contact',
                        email_customer = '$customer_email',
                        alamat_customer = '$customer_address'
                    ";

                    //echo $sql2; die();

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==true)
                    {
                        $_SESSION['order'] = "<div class='sukses text-center'>Pesanan Berhasil Dibuat.</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        $_SESSION['order'] = "<div class='gagal text-center'>Pesanan Gagal Dibuat.</div>";
                        header('location:'.SITEURL);
                    }
                }
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('konten-front/footer.php'); ?>