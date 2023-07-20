<?php 
    require "../sql/functions.php";

    $key = $_GET["keyword"];
    $row = search($key);
    

?>



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

        <?php if(count($row) == 0): ?>
        <div >
        <h1>

            data tidak di temukan...
        </h1>
        </div>
    <?php endif; ?>