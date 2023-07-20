
<?php 
            session_start();

            // jika tidak variable ini maka kembali lagi
            if(!isset($_SESSION["login"]) && !isset($_GET["action"])){
                header("Location:login.php");
                exit;
            }
    require "functions.php";
    // cek apakah tombol signup di tekan
    if(isset($_POST["signup"])){
        if(signup($_POST) > 0){
            echo"<script>
            alert('AKUN TELAH DI BUAT, SILAHKAN LOGIN ');
            window.location.href = 'login.php';
            </script>";
        }else{
            echo"<script>
            alert('MOHON ISI FORM DENGAN  BENAR');
            </script>";
        }
    }

?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body style="background-color: #222; color:white;" >
    <form action=""  method="post"  class="container w-50 mt-5" >
        
        <div class="mb-3 row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="username" id="inputPassword">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="inputPassword" class="col-sm-2 col-form-label">email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="email" id="inputPassword">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="inputPassword" minlength="6">
          </div>
        </div>
        <div class="mb-3 row">
            <button class="btn btn-primary" type="submit" name="signup">Signup</button>
        </div>

</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>