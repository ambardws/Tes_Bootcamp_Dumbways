<?php

require 'function.php';
$bukuPenulis = query("SELECT * FROM writer_tb");
$bukuCategory = query("SELECT * FROM category_tb");

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {
    // cek apakah data berhasil di tambahkan atau tidak
    if( tambah($_POST) > 0 )
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
    <title>Tambah Data Buku</title>
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center">Tambah Data Buku</h1>
            <!-- <div class="fieldset"> -->
            <div class="card" style="width: 70%; margin: 0 auto;">
                <div div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group col-md-12">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" placeholder="Masukkan Judul" name="name" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="penulis">Penulis</label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="writer_id">
                                <option selected>Choose...</option>
                                <?php foreach ($bukuPenulis as $row) : ?>
                                <option value="<?= $row["id"] ?>"><?= $row["name"] ?></option>
                                <?php endforeach ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="penulis">Category</label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="category_id">
                                <option selected>Choose...</option>
                                <?php foreach ($bukuCategory as $row) : ?>
                                <option value="<?= $row["id"] ?>"><?= $row["name"] ?></option>
                                <?php endforeach ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="tahun">Tahun</label>
                            <input type="text" class="form-control" placeholder="Masukkan Tahun" name="publication_year" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control" placeholder="Masukkan Gambar" name="img" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary ml-3">Submit</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>