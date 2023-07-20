<?php 

session_start();

// jika tidak variable ini maka kembali lagi
if(!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
}
    require "functions.php";

    // ambil id user yang di terima

        $id = $_GET["id"];

        if(hapusData($id) != -1){
            echo "
            <script>
                alert('DATA BERHASIL DI HAPUS');
                setTimeout( () =>  document.location.href = 'index.php',0);
               
            </script>";
        }else{
            echo "
            <script>
                alert('DATA GAGAL DI HAPUS ')
                document.location.href = 'index.php'
            </script>";
            
        }
    


?>

