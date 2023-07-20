<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family:"Helvetica", sans-serif;
            font-size:18px;
        }

    </style>
</head>
<body style="background-color:#222; color:white;"> 
    <h1>

    <?php

    // variabel
    // tanda $ harus ada sebelum nama varibel
    echo "Hello world";
    $name = "hasan";
    $lastName = "san";
    echo "HELLO NAMA SAYA $name \n";

    $x = 10;
    $y = 10;
    echo $x == $y;

    echo "<br>";


    // array asosiative
    // mirip object di javascript.
    // 
    $mhs = [
        [
            "nama" => "Hasan",
            "alamat" => "sukarma",
            "nomor" => "08921232",
            "kelas" => "11"
        ],
        [
            "nama" => "Hasan",
            "alamat" => "sukarma",
            "nomor" => "08921232",
            "kelas" => "11"
        ],
        [
            "nama" => "Hasan",
            "alamat" => "sukarma",
            "nomor" => "08921232",
            "kelas" => "11"
        ],
        [
            "nama" => "Hasan",
            "alamat" => "sukarma",
            "nomor" => "08921232",
            "kelas" => "11"
        ],
        [
            "nama" => "Hasan",
            "alamat" => "sukarma",
            "nomor" => "08921232",
            "kelas" => "11"
        ]
    ]
   

    ?>
    </h1>


    <?php foreach($mhs as $item) : ?>
        <ul>
            <li>Name: <?=$item["nama"]?></li>
            <li>alamat: <?=$item["alamat"]?></li>
            <li>nomor: <?=$item["nomor"]?></li>
            <li>kelas: <?=$item["kelas"]  ?></li>
        </ul>
    <?php endforeach; ?>

    <table border="1" cellspacing="0" width='400px' style="text-align:center;">
    <?php
    for($i = 0; $i < 5; $i++){
        echo "<tr>";
        for($j = 0 ; $j < 5; $j++){
            echo "<td>$i,$j</td>";
        }
        echo "</tr>";

    }

    ?>

    </table>

    <button>
        <?php
        function showName(){
            static $num = 0;
            echo $num;
            $num++;
        }
         showName();
         showName();
         showName();
        // var_dump($mhs); 
        // var_dump($_GET());
        echo "<br>";
        // var_dump($_());

        ?>

        Klik
    </button>
    <h1>
    <?php
class Car {
  public $color;
  public $model;
  public function __construct($color, $model) {
    $this->color = $color;
    $this->model = $model;
  }
  public function message() {
    return "My car is a " . $this->color . " " . $this->model . "!";
  }
}

$myCar = new Car("black", "Volvo");
echo $myCar -> message();
echo "<br>";
$myCar = new Car("red", "Toyota");
echo $myCar -> message();
?>
    </h1>



    <!-- <script>
        const name = "Hasan";
        document.writeline(
           `${name}`    )
    </script> -->
</body>
</html>