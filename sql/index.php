
<?php 
    session_start();
    // require
    require "functions.php";

    // cek cookie

    if(isset($_COOKIE["username"])){
        $_SESSION['login'] = true;
        $_SESSION['username'] = $_COOKIE["username"];
    }

    // jika tidak variable ini maka kembali lagi
    if(!isset($_SESSION["login"])){
        header("Location:login.php");
        exit;
    }

    // pagination
    // logic pagination
    
        $pagination = true;
        $jumlahDataPerhalaman = 3;
        $jumlahData = count(fetchdata("SELECT * FROM mahasiswa"));
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
        $halamanAktif =(isset($_GET["page"]))?$_GET["page"]:1;
        $indexData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;
        $row = fetchdata("SELECT * FROM mahasiswa LIMIT $indexData,$jumlahDataPerhalaman");
    
    //  var_dump($indexData);
    // 3 *
    
    // if($_GET["page"] == "showall"){
    //      $pagination = false;
    //      $row = fetchdata("SELECT * FROM mahasiswa");
    //  }


    //  search
     if(isset($_POST["search"])){
        $row = search($_POST["keyword"]);
     }


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL || DATABASE</title>
    <style>
        *{
            font-family: "Helvetica", sans-serif;

        }
        body{
            background-color: #222;
            color: #fff;
            display: grid;
            place-items: center;
            font-family: "Helvetica", sans-serif;
        }


        table{
            min-width: 830px;
        }

        .search-box{
            margin: 20px;
            width: 300px;
            display: flex;

        }

        .search-box input{
            width: 100%;
            padding: 7px;
        }
        .search-box button{
            padding: 7px;

        }
    </style>
</head>
<body>
    
    <a href="logout.php">Logout</a>
    <h1>SELAMAT DATANG <?= $_SESSION["username"];  ?>!!</h1>
    <a href="tambah.php">Tambah data mahasiswa</a>

    <form action="" method="post" class="search-box">
        <input type="text" autocomplete="off" placeholder="search..."
        name="keyword" id="keyword">
        <button type="submit" name="search">Search</button>

       
        <!-- <select name="type" id="type">
            <option value="id" >id</option>
            <option value="nama">nama</option>
            <option value="nrp">NRP</option>
            <option value="email">email</option>
            <option value="jurusan">jurusan</option>
        </select> -->
    </form>

    <br>
       <!-- <a href="?page=showall">Tampilkan semua data</a> -->
    <br>
    <div class="container">
        

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>NRP</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <!-- fetch data -->
        <?php $i = 1; ?>
        <?php foreach($row as $data) : ?>
            <!--  -->
            <?php if(isset($data[0])) return;?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="edit.php?id=<?= $data['id']?>" >Edit</a>  |
                    <a href="hapus.php?id=<?= $data['id']?>"
                    onclick="return confirm('yakin anda ingin menghapus data ini')"
                    >Delete</a>
                </td>
                <td><img src="../img/<?= $data["gambar"]; ?>" alt="" 
                    width="70px" height="70px" ></td>
                    <td><?= $data["nama"];?></td>
                <td><?= $data["nrp"];?></td>
                <td><?= $data["email"];?></td>
                <td><?= $data["jurusan"];?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>    
        </table>
    </div>

    <br>

    <?php if($pagination): ?>
    <div class="box">
        <?php if($halamanAktif > 1) :?>
            <a href="?page=<?=$halamanAktif - 1?>">&laquo;</a>
        <?php endif;?>
        <?php for($i = 1; $i<= $jumlahHalaman; $i++) : ?>
            <?php if($i == $halamanAktif) : ?>
            <a href="?page= <?=$i?>" style="color:red; text-weight:bold;"><?= $i ?></a>
            <?php else: ?>
                <a href="?page=<?=$i?>"><?= $i ?></a>    
            <?php endif; ?>

        <?php endfor; ?>    
        <?php if($halamanAktif < $jumlahHalaman) :?>
            <a href="?page=<?=$halamanAktif + 1?>">&raquo;</a>
        <?php endif;?>
    </div>
    <?php endif; ?>
    
    
    <script src="../js/script.js"></script>
</body>
</html>