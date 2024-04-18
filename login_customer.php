<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | FitIn Shoes</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

</head>
<body id="bg-login">
    <div class="box-login">
        <h2>Login User</h2>
        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-control">
            <input type="submit" name="submit" value="Login" class="button">
            <a href="register.php" class="button">Daftar</a>
        </form>
        <?php
            if(isset($_POST['submit'])){
                session_start();
                include 'db.php';

                $user = mysqli_real_escape_string($connect,$_POST['user']);
                $pass = mysqli_real_escape_string($connect,$_POST['pass']);

                $cek = mysqli_query($connect, "SELECT * FROM customer WHERE username = '".$user."' AND password ='".$pass."'");
                if(mysqli_num_rows($cek)> 0){
                    $p = mysqli_fetch_object($cek);
                    $_SESSION['pengguna']=true;
                    $_SESSION['customer'] = $p;
                    $_SESSION['id'] = $p -> id_customer;
                    echo '<script> window.location="index.php" </script>';
                }else{
                    echo'<script>alert("Username atau Password Salah")</script>';
                }
            }
        ?>
    </div>
</body>
</html>