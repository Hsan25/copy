
<?php 
// check apakah ada data yang di kirim
// if(!isset($_GET["nama"])){
//     header("Location: get1.php");
//     exit;
// }

?>
<!-- HELLO WORLD -->
<!-- HELLO WORLD -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET & POST</title>
</head>
<body>
    <h1>SELAMAT DATANG <?= $_POST["username"] ?></h1>
    <a href="get1.php">KEMBALI</a>
</body>
</html>