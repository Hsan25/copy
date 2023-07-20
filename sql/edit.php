<?php 
        session_start();

        // jika tidak variable ini maka kembali lagi
        if(!isset($_SESSION["login"])){
            header("Location:login.php");
            exit;
        }

    require "functions.php";

    $id = $_GET["id"];

    $data = fetchdata("SELECT * FROM mahasiswa WHERE id = $id")[0];
    // var_dump($data["nama"]);


    if(isset($_POST["submit"])){
    if(editData($_POST) != -1){
        echo"<script>
        alert('DATA BERHASIL DI UBAH');
        document.location.href = 'index.php'
        </script>";
    }else{
        echo"<script>
        alert('DATA GAGAL DI UBAH');
        </script>";

    }


 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT Data Mahasiswa</title>
    <style>
        *{
            font-family: sans-serif;
        }
        body{
            background-color: #222;
            color: #fff;
            display: grid;
            place-items: center;
            
        }

        form ul{
            display: grid;
            gap: 1rem;
            list-style: none;
        }

        form ul li{
            display: flex;
            justify-content: space-between;
        }

        form ul li label{
            position: relative;
            margin-right: 20px;
            width: 100%;
        }

        form ul li label:after {
            content: ":";
            display: inline-block;
            position: absolute;
            right: -10px;
            font-weight: bold;

        }

        
        form > input{
            font-size: 16px;
        }

        button{
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h1>UBAH DATA MAHASISWA</h1>
    <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" required 
                value="<?= $data["id"];?>">
                <input type="hidden" name="gambarLama" value="<?=$data["gambar"]?>">
        <ul>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required 
                value="<?= $data["nama"];?>">
            </li>
            <li>
                <label for="nrp">nrp </label>
                <input type="text" name="nrp" id="nrp" required
                 value="<?= $data["nrp"]?>" >
            </li>
            <li>
                <label for='email'>email </label> 
                 <input type='text' name='email' id='email' 
                 value="<?= $data["email"]?>">
            </li>
            <li>
                <label for='jurusan'>jurusan </label> 
                 <input type='text' name='jurusan' id='jurusan' required
                 value="<?= $data["jurusan"]?>">
            </li>
            <li>
                <label for='gambar'>gambar</label> 
                <input type='file' name='gambar' id='gambar'>
                <img src="../img/<?=$data["gambar"] ?>" alt="" id="image" 
                width="50px" height="50px" >
            </li>
            <li>
                <button type="submit" name="submit">UBAH DATA</button>
            </li>
        </ul>
    </form>

    <script>
        // for img change
        const img = document.querySelector("#image");
        const input = document.querySelector("#gambar");
        input.addEventListener("change", () => {
            img.src = URL.createObjectURL(input.files[0]);
        });

    </script>
</body>
</html>