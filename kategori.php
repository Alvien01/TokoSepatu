<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] !=true){
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitIn Shoes</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

</head>
<body>
    <!-- membuat header -->
    <header>
        <div class="container">
        <h1><a href="dashboard.php">FitIn Shoes</a></h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="kategori.php">Kategori</a></li>
            <li><a href="produk.php">Produk</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
    </header>

    <!-- membuat konten -->
    <div class="section">
        <div class="container">
            <h3>Kategori Produk</h3>
                <div id="kategori">
                <a href="tambah_kategori.php" class ="button">Tambah Kategori</a>
                </div>
                
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $kategori = mysqli_query($connect, "SELECT * FROM kategori ORDER BY id_kategori ASC");
                            if (mysqli_num_rows($kategori) > 0 ){
                            while ($row = mysqli_fetch_array($kategori)) {
                        ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $row ['nama_kategori']?></td>
                            <td>
                            <a href="edit_kategori.php?id=<?php echo $row ['id_kategori']?>">Edit</a> || <a href="hapus_kategori.php?idk=<?php echo $row ['id_kategori']?>" onclick="return confirm('Konfirmasi ?')">Hapus</a>
                            </td>
                        </tr>
                        <?php }} else { ?>
                            <tr>
                                <td colspan="3">Tidak Ada Data</td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
    
    </div>

    <!-- membuat footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2022 - FitIn Shoes.</small>
        </div>
    </footer>
</body>
</html>