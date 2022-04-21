
<?php include('isikonten/menu.php');?>

        <div class="main-content">
        <div class="wrapper">
                <h1>Admin</h1>
            <br/>
            <?php
                 if(isset($_SESSION['tambah']))
                 {
                     echo $_SESSION['tambah'];
                     unset($_SESSION['tambah']);
                 }
                 if(isset($_SESSION['delete']))
                 {
                     echo $_SESSION['delete'];
                     unset($_SESSION['delete']);
                 }
                 if(isset($_SESSION['update']))
                 {
                     echo $_SESSION['update'];
                     unset($_SESSION['update']);
                 }
                 if(isset($_SESSION['user-not-found']))
                 {
                     echo $_SESSION['user-not-found'];
                     unset($_SESSION['user-not-found']);
                 }
                 if(isset($_SESSION['pass-tidak-sama']))
                 {
                     echo $_SESSION['pass-tidak-sama'];
                     unset($_SESSION['pass-tidak-sama']);
                 }
                 if(isset($_SESSION['ganti-pass']))
                 {
                     echo $_SESSION['ganti-pass'];
                     unset($_SESSION['ganti-pass']);
                 }
            ?>
            <br/><br/><br/>
                <!--tombol penambahan admin-->
                <a href="tambah-admin.php" class="btn-primary">Tambah Admin</a>
            <br/><br/><br>
                <table class="tbl-full">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>

                    <?php 
                        $sql = "SELECT * FROM tbl_admin ";
                        $res = mysqli_query($conn, $sql);
                        if($res==TRUE)
                        {
                            $count = mysqli_num_rows($res);

                            $No=1;

                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    $id=$rows['id'];
                                    $Nama=$rows['Nama'];
                                    $username=$rows['username'];

                                    ?>
                                                        <tr>
                        <td><?php echo $No++; ?></td>
                        <td><?php echo $Nama; ?></td>
                        <td><?php echo $username; ?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/ganti-password.php?id=<?php echo $id; ?>" class='btn-primary'>Ganti Password</a>
                            <a href="<?php echo SITEURL; ?>admin/edit-admin.php?id=<?php echo $id; ?>" class="btn-kedua">Edit</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-ketiga">Delete</a>
                        </td>
                    </tr>
                                    <?php

                                }
                            }else{

                            }
                        }
                    ?>
 
                </table>

            <div class="clearfix"></div>

        </div>
    </div>

<?php include('isikonten/footer.php');?>