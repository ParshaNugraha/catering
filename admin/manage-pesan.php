<?php include('isikonten/menu.php');?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Pesanan</h1>

            <br/><br/>

            <?php 
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>

            <br><br>

                <table class="tbl-full">
                    <tr>
                        <th>No</th>
                        <th>Makanan/Minuman</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Waktu Pemesanan</th>
                        <th>Status</th>
                        <th>Nama Customer</th>
                        <th>Kontak</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>

                    <?php 
                        $sql = "SELECT * FROM tbl_pesan ORDER BY id DESC";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                        $sn = 1;

                        if($count>0)
                        {
                            while($row = mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $food = $row['makanan'];
                                $harga = $row['harga'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $order_date = $row['waktu_pesan'];
                                $status = $row['status'];
                                $customer_name = $row['nama_customer'];
                                $customer_contact = $row['kontak_customer'];
                                $customer_email = $row['email_customer'];
                                $customer_address = $row['alamat_customer'];

                                ?> 
                                    <tr>
                                        <td><?php echo $sn++;?></td>
                                        <td><?php echo $food;?></td>
                                        <td><?php echo $harga;?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td><?php echo $order_date; ?></td>

                                        <td>
                                        <?php 
                                            if($status=="Dipesan")
                                            {
                                                echo "<label>$status</label>";
                                            }
                                            elseif($status=="Disiapkan")
                                            {
                                                echo "<label style='color: orange;'>$status</label>";
                                            }
                                            elseif($status=="Sedang dikirim")
                                            {
                                                echo "<label style='color: blue;'>$status</label>";
                                            }
                                            elseif($status=="Terkirim")
                                            {
                                                echo "<label style='color: green;'>$status</label>";
                                            }
                                            elseif($status=="Batal")
                                            {
                                                echo "<label style='color: red;'>$status</label>";
                                            }

                                        ?>
                                        </td>

                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_contact; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $customer_address; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL;?>admin/update.php?id=<?php echo $id ?>" class="btn-kedua">Update</a>
                                        </td>
                                    </tr>                               
                                <?php
                            }
                        }
                        else
                        {
                            echo "<tr><td colspan='12' class='gagal'>Pesanan tidak tersedia</td></tr>";
                        }
                    ?>


                    
                </table>
        </div>
    </div>

<?php include('isikonten/footer.php');?>