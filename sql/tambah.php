<?php 

session_start();

// jika tidak variable ini maka kembali lagi
if(!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
}
    require "functions.php";
    if(isset($_POST["submit"])){
        if(tambahData($_POST,upload()) != -1){
        
        echo"<script>
        alert('DATA BERHASIL DI TAMBAHKAN');
        document.location.href = 'index.php'
        </script>";
    }else{
        echo"<script>
        alert('DATA GAGAL DI TAMBAHKAN');
        </script>";
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
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
            display: grid;
            /* justify-content: space-evenly; */
        }

        form ul li label{
            position: relative;
            margin-right: 20px;
            /* width: 100%; */
            /* flex: 1; */
        }

        form ul li label:after {
            content: ":";
            display: inline-block;
            position: absolute;
            /* right: -10px; */
            font-weight: bold;

        }

        
        form > input{
            font-size: 16px;
            
        }
 
        #image{
            min-width: 50px;
            height: 0;

        }

        button{
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h1>TAMBAH DATA MAHASISWA</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required >
            </li>
            <li>
                <label for="nrp">nrp </label>
                <input type="text" name="nrp" id="nrp" required >
            </li>
            <li>
                <label for='email'>email </label> 
                 <input type='text' name='email' id='email' >
            </li>
            <li>
                <label for='jurusan'>jurusan </label> 
                 <input type='text' name='jurusan' id='jurusan' required>
            </li>
            <li>
                <img src="" alt="" id="image">
                <label for='gambar'>gambar</label> 
                <input type='file' name='gambar' id='gambar' required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah</button>
            </li>
        </ul>
    </form>

    <script>
        // for img change
        const img = document.querySelector("#image");
        const input = document.querySelector("#gambar");
        input.addEventListener("change", () => {
            img.src = URL.createObjectURL(input.files[0]);
            img.style.height = "50px";
        })

    </script>
</body>
</html>