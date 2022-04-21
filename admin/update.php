<?php include('isikonten/menu.php');?>
<div class="main-content">
<div class="wrapper">
        <h1>Update Pesanan</h1>
        <br><br>

        <?php
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];

                $sql = "SELECT * FROM tbl_pesan WHERE id=$id";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);
                    $food = $row['makanan'];
                    $harga = $row['harga'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                    $custom_name = $row['nama_customer'];
                    $custom_contact = $row['kontak_customer'];
                    $custom_email = $row['email_customer'];
                    $custom_address = $row['alamat_customer'];

                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-pesan.php');
                }
            }
            else
            {
                header('location:'.SITEURL.'admin/manage-pesan.php');
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-kolom">
                <tr>
                    <td>Nama Makanan/Minuman</td>
                    <td><b> <?php echo $food; ?> </b></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><b>Rp <?php echo $harga; ?> </b></td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td>
                        <input type="number" name="qty" value="<?php echo $qty; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Dipesan"){echo "selected";}?> value="Dipesan">Dipesan</option>
                            <option <?php if($status=="Disiapkan"){echo "selected";}?> value="Disiapkan">Disiapkan</option>
                            <option <?php if($status=="Sedang dikirim"){echo "selected";}?> value="Sedang dikirim">Sedang dikirim</option>
                            <option <?php if($status=="Terkirim"){echo "selected";}?> value="Terkirim">Terkirim</option>
                            <option <?php if($status=="Batal"){echo "selected";}?> value="Batal">Batal</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Nama Customer: </td>
                    <td>
                        <input type="text" name="nama_customer" value="<?php echo $custom_name ?>">
                    </td>
                </tr>
                <tr>
                    <td>Kontak Customer: </td>
                    <td>
                        <input type="text" name="kontak_customer" value="<?php echo $custom_contact ?>">
                    </td>
                </tr>
                <tr>
                    <td>Email Customer: </td>
                    <td>
                        <input type="text" name="email_customer" value="<?php echo $custom_email ?>">
                    </td>
                </tr>
                <tr>
                    <td>Alamat Customer: </td>
                    <td>
                       <textarea name="alamat_customer" id="" cols="30" rows="5"><?php echo $custom_address ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="harga" value="<?php echo $harga; ?>">
                        <input type="submit" name="submit" value="Update Pesanan" class="btn-kedua">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_POST['submit']))
            {
                //echo "kilk";
                $id=$_POST['id'];
                $harga=$_POST['harga'];
                $qty = $_POST['qty'];

                $total = $harga * $qty;

                $status = $_POST['status'];

                $custom_name = $_POST['nama_customer'];
                $custom_contact = $_POST['kontak_customer'];
                $custom_email = $_POST['email_customer'];
                $custom_address = $_POST['alamat_customer'];

                $sql2 = "UPDATE tbl_pesan SET
                    qty = $qty,
                    total = $total,
                    status = '$status',
                    nama_customer = '$custom_name',
                    kontak_customer = '$custom_contact',
                    email_customer = '$custom_email',
                    alamat_customer = '$custom_address'
                    WHERE id=$id
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    $_SESSION['update'] = "<div class='sukses'>Berhasil Mengupdate Pesanan.</div>";
                    header('location:'.SITEURL.'admin/manage-pesan.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='gagal'>Gagal Mengupdate Pesanan</div>";
                    header('location:'.SITEURL.'admin/manage-pesan.php');
                }

            }
        ?>

    </div>
</div>


<?php include('isikonten/footer.php');?>