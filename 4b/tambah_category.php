<?php

require 'function.php';
$bukuPenulis = query("SELECT * FROM writer_tb");


// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {
    

    // cek apakah data berhasil di tambahkan atau tidak
    if( tambah_category($_POST) > 0 )
    {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'index.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href = 'index.php';
            </script>
            ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <link rel="stylesheet" href="style.css">
    <title>Tambah Data Kategori</title>
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center">Tambah Data Writer</h1>
            <!-- <div class="fieldset"> -->
            <div class="card" style="width: 70%; margin: 0 auto;">
                <div div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group col-md-12">
                            <label for="tahun">Kategori</label>
                            <input type="text" class="form-control" placeholder="Masukkan Tahun" name="name" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary ml-3">Submit</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>