
<!-- ----------------------- code masih pelu di kembangkan ------------------------- -->
<?php 
    

    //connet ke database
    // mysqli_connect(lokasi, username,password, nama database);
    $conn = mysqli_connect("localhost", "root", "", "phpdasar"); 
    // var_dump($conn);
    function fetchdata($query){

        // kenapa pake keyword global ? supaya varible conn yang ada di global
        // bisa di pake di sini..
        // bisa di amsusikan bahwa global dan yang ada di function itu beda dimensi..
        // jadi kita harus memberitahu mesinnya bahwa conn yang di maksudkan adlah
        // conn yang ada di globall
        global $conn;
        $result = mysqli_query( $conn , $query);
        // ambil data tabelnya dari database
        // var_dump($result);
    
        // fecth / ambil data dari tabel dan simpan datanya ke varible row
        $row = [];

        while($data = mysqli_fetch_assoc($result)){
            $row[] = $data;
        }
        return $row;

    }
    

    // tambah data ke data base
    function tambahData($data,$name_file){
        global $conn;
        $nama = htmlspecialchars($data["nama"]);
        $nrp = htmlspecialchars($data["nrp"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

        $gambar = $name_file;

        // query untuk menambahkan data ke database
        // parameter VALUES() harus berutan sesuai tabel;
        $query = "INSERT INTO mahasiswa
                    VALUES
                    ('','$nama','$nrp','$email','$jurusan','$gambar')";
        mysqli_query($conn, $query);

       return mysqli_affected_rows($conn);
    }
    
    function hapusData($id){
        global $conn;
        // hapus file image

        // hapus file dari yang ada di forder img
        // unlink() berfungsi untuk menghapus file..
        $name_file = mysqli_query($conn, "SELECT gambar FROM mahasiswa WHERE id = $id");
        $name_file = mysqli_fetch_assoc($name_file)["gambar"];
        
        deleteFile($name_file);
        
        // hapus data di database sesuai id
        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id ");
        // ketika prosesnya gagal pasti nilainya -1
        // ini cuma  untuk memverifikasi bahwa apakah ada perubahan dalam table atau tidak
        return mysqli_affected_rows($conn);

    }

    // edit data
    function editData($data){
        global $conn;
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $nrp = htmlspecialchars($data["nrp"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

        // cek apakah user mau ganti image atau tidak
        $gambarLama = htmlspecialchars($data["gambarLama"]);
        if($_FILES["gambar"]["error"] === 4){
            $gambar = $gambarLama;
        }else{
            deleteFile($gambarLama);
            $gambar = upload();

        }

        // var_dump($gambar); die;

    //    query update / ubah data di my sql
    //    harus sesuai urutan yang ada di table
        $query = "UPDATE mahasiswa SET 
                    id = $id,
                    nama = '$nama',
                    nrp = '$nrp',
                    email = '$email',
                    jurusan = '$jurusan',
                    gambar = '$gambar'
                    WHERE id = $id";

        mysqli_query($conn, $query);

       return mysqli_affected_rows($conn);
    }


    // search data
    // search data yang ada di database

    function search($keyword){
        global $conn;
        
        // syntax LIKE berfungsi jika keyword pertamanya a dia akan menampilkan semua
        // data yang di awali dengan a tidak peduli apa yang di depannya;
        // keyword % berfungsi sebagai mendekati contoh:
        // kita mau search Hu tao atau id = 1341241;
        // maka kita bisa tao atau 241 atau sesuatu yang mendekati atau mengandung ;
        // maka data yang mendekati akan muncul...
        $query = "SELECT * FROM mahasiswa WHERE
                    nama LIKE '%$keyword%' OR            
                    nrp LIKE '%$keyword%' OR             
                    email LIKE '%$keyword%' OR            
                    jurusan LIKE '%$keyword%'             
                    ";
        $result = mysqli_query($conn,$query);
        $row = [];
        while($data = mysqli_fetch_assoc($result)){
            $row[] = $data;
        }
        
        return $row;
        
    }


    // upload file
    function upload(){
        // var_dump($_FILES["gambar"]["name"]);
        $nameFile = $_FILES["gambar"]["name"];
        $sizeFile = $_FILES["gambar"]["size"];
        $tmpFile = $_FILES["gambar"]["tmp_name"];

        // validasi file
        // validasi ektensi

        // pecahkan string
        $nameFile = explode(".",$nameFile);
        $ektensiFile = strtolower(end($nameFile));
        var_dump($ektensiFile);

        // lalu validasi
        $ekstensiValid = ["jpg","jpeg","png"];
        if(!in_array($ektensiFile,$ekstensiValid)){
            echo "<script>
            alert('yang anda masukkan bukan gambar')
            </script>";
            return false;       
        }

        // generate nama file baru agar tidak ada yang sama namanya
        $new_name_file = uniqid().'.'.$ektensiFile;

        // validasi size
        if( $sizeFile > 2000000){
            echo "<script>
            alert('ukuran file terlalu besar');
            </script>";
        }else{
            // upload image..
           move_uploaded_file($tmpFile, '../img/'.$new_name_file);
        }

        return $new_name_file;
    }


    // hapus file
    function deleteFile($fileName){
        $path = "../img/";
        $file = $path .=$fileName;
        unlink($file);
    }


    // signup
    function signup($data){
        global $conn;

        $username = htmlspecialchars($data["username"]);
        $email = htmlspecialchars($data["email"]);
        $password = htmlspecialchars($data["password"]);
        // $no_telp = htmlspecialchars($data["no-telp"]);

        // enkripsi password 
        $password = password_hash($password,PASSWORD_DEFAULT);

        // validasi username
        // apakah username ini udah di pakai atau belum
        $select = "SELECT username FROM users WHERE username = '$username'";
        $result2 = mysqli_query($conn, $select);
        if(mysqli_fetch_assoc($result2)){
            echo "<script>
            alert('USERNAME SUDAH DI PAKAI');
            </script>";
            return;
        }

        $query = "INSERT INTO users 
                    VALUES
                    ('','$username','$email','$password', '')";

        $result = mysqli_query($conn,$query);
        // mysqli_fetch_assoc($result);

        return mysqli_affected_rows($conn);
    }

?>


