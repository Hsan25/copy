<?php 
    session_start();

        // jika tidak variable ini maka kembali lagi
        if(isset($_SESSION["login"])){
            header("Location:index.php");
            exit;
        }
    require "functions.php";
    // cek apakah tombol signup di tekan
    if(isset($_POST["login"])){
        $username = $_POST["username"];
        // var_dump($password);die;
        $password = $_POST["password"];     
        $query = "SELECT * FROM users WHERE
                    username = '$username'";

        // validasi username
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) === 1){

            $data = mysqli_fetch_assoc($result);
            // validasi password
            if(password_verify($password,$data["password"])){

                // buat session
                // varible session akan di simpan di server
                $_SESSION["login"] = true;
                $_SESSION["username"] = $username;

                // buat cookie
                // varible cookie akan di simpan di client / web user
                if(isset($_POST["remember"])){
                  // supaya client jika dalam 24 jam
                  // tidak usah login lagi..
                  setcookie("username",$data["username"],time()+60*60*24);
                }


                echo "<script>
                    alert('LOGIN BERHASIL');
                    window.location.href = 'index.php';
                    </script>";
                exit;
            }else{
                echo "<script>
                alert('USERNAME ATAU PASSWORD SALAH');
                </script>";
            }
            
        }else{
            echo "<script>
            alert('USERNAME ATAU PASSWORD SALAH');
            </script>";

        }
    }

?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN || PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body style="background-color: #222; color:white;" >
    <form action=""  method="post" class="container w-25 mt-5" >      
        <div class="mb-3 row">
          <label for="username" class="col-sm-3 col-form-label ">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="username" id="username" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="inputPassword" minlength="6" required>
          </div>
        </div>
        <div class="mb-2 row">
          <div class="col-sm-1">
            <input type='checkbox' name='remember' id='remember' >
          </div>
          <label  class="col-sm-5" for='remember'>Remember me</label> 
        </div>
        <div class="mb-3 row">
            <button class="btn btn-primary" type="submit" name="login">Login</button>
        </div>
        <div class="mb-3 row">
            <a href="signup.php?action=signup"  class="btn btn-primary">signUp</a>
        </div>


</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>