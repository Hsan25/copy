<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET 1</title>
</head>
<body style="background-color:#222; color:#fff;">
    <?php 
    $mhs = [
        [
            "nama" => "Hasan",
            "kelas" => "10",
            "nomor" => "089642816343",
            "alamat" => "jln babakan tarogong",
            "image" => "1.jpg"
        ],
        [
            "nama" => "gojo",
            "kelas" => "10",
            "nomor" => "089642816343",
            "alamat" => "jln babakan tarogong",
            "image" => "2.jpg"
        ],
        [
            "nama" => "Hu Tao",
            "kelas" => "10",
            "nomor" => "089642816343",
            "alamat" => "jln babakan tarogong",
            "image" => "3.jpg"
        ],
        [
            "nama" => "XIAO",
            "kelas" => "10",
            "nomor" => "089642816343",
            "alamat" => "jln babakan tarogong",
            "image" => "4.jpg"
        ],
        [
            "nama" => "TYNXA",
            "kelas" => "10",
            "nomor" => "089642816343",
            "alamat" => "jln babakan tarogong",
            "image" => "5.jpg"
        ],
    ]
    ?>

    <h1>HALAMAN 1</h1>
    <h1>HELLO WORLD</h1>

    <ul>
        <?php foreach($mhs as $item) : ?>
            <li><a href="get2.php?nama=<?= $item["nama"] ?>">
                <?php echo $item["nama"] ?></a>
            </li>
        <?php  endforeach;?>
        <?= "<br>"  ?>
    </ul>

    <ul>
        <form action="get2.php" method="post">
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="username">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="text" name="password" id="password" placeholder="password">
            </li>
            <li>
                <button type="submit" name="submit">KIRIM</button>
            </li>
        </form>

    </ul>
    
</body>
</html>