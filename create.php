<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $sid=input($_POST["sid"]);
        $sn=input($_POST["sn"]);
        //$port=input($_POST["port"]);
        $gpon=input($_POST["gpon"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into peserta (sid,sn,gpon) values
		('$sid','$sn','$gpon')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>SID :</label>
            <input type="text" name="sid" class="form-control" placeholder="Masukan SID" required />

        </div>
        <div class="form-group">
            <label>SN :</label>
            <input type="text" name="sn" class="form-control" placeholder="Masukan SN" required/>
    
        </div>
        <div class="form-group">
            <label>GPON :</label>
            <input type="text" name="gpon" class="form-control" placeholder="Masukan GPON" required/>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>