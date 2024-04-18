<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | FitIn Shoes</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
    <div class="box-login">
        <h2>Login</h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-control">
            <input type="submit" name="submit" value="Login" class="button">
        </form>
        <?php
            if(isset($_POST['submit'])){
                session_start();
                include 'db.php';

                $user = $_POST['user'];
                $pass = $_POST['pass'];

                $cek = mysqli_query($connect, "SELECT * FROM karyawan WHERE username = '".$user ."' AND password = '".$pass."'");
                if (mysqli_num_rows($cek) > 0){
                    $panggil = mysqli_fetch_object($cek);
                    $_SESSION['status_login'] = true;
                    $_SESSION['admin_toko'] = $panggil;
                    $_SESSION['id'] = $panggil->id_karyawan;
                    echo '<script>window.location="dashboard.php"</script>';
                }else {
                    echo '<script>alert("Username atau Password salah")</script>';
                }
            }
        ?>
    </div>
</body>
</html>