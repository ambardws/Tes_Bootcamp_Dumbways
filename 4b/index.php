<?php
require 'function.php';
// ambil data dari tabel mahasiswa / query data buku
$buku = query("SELECT * FROM book_tb");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <title>Halaman Admin</title>
</head>

<body>
    <div class="container-fluid">
        <h1 class="text-center">Data Buku</h1>
        <hr>
        <a class="btn btn-primary" href="tambah_buku.php" role="button">Add Book</a>
        <a class="btn btn-primary" href="tambah_writer.php" role="button">Add Writer</a>
        <a class="btn btn-primary" href="tambah_category.php" role="button">Add Category</a>
        <br>
        <br>
        <div class="row">
                <?php $i = 1; ?>
                <?php foreach ($buku as $row) : ?>
            <div class="col-sm">
                    <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="img/<?= $row["img"] ?>" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text"><?= $row["name"] ?>.</p>
                        <a href="#" class="btn btn-primary">View Detail</a>
                    </div>
                    </div>
            </div>
                 <?php $i++; ?>
                <?php endforeach ?>
        </div>
      

    
    </div>

</body>

</html>