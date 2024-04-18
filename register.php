<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | FitIn Shoes</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

</head>
<body id="bg-login">
    <div class="box-login">
        <h2>Register</h2>
        <form action="" method="POST">
            <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control">
            <input type="text" name="user" placeholder="Username" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-control">
            <input type="text" name="alamat" placeholder="Alamat" class="input-control">
            <input type="submit" name="submit" value="Register" class="button">
            
        </form>
        <?php
            if(isset($_POST['submit'])){
                session_start();
                include 'db.php';

                $nama       = $_POST['nama'];
                $username   = $_POST['user'];
                $password   = $_POST['pass'];
                $alamat     = $_POST['alamat'];

                $insert = mysqli_query($connect,"INSERT INTO customer VALUES(
                    null,

                    '".$nama."',
                    '".$username."',
                    '".$password."',
                    '".$alamat."'
                    )");

                if($insert){
                    echo '<script>alert("Register Berhasil")</script>';
                    echo '<script>window.location="login_Customer.php"</script>';
                    
                }else{
                    echo 'gagal'.mysqli_error($connect);
                }
            }
        ?>
    </div>
</body>
</html>