<?php 
    // koneksi ke database
    $conn = mysqli_connect("localhost","root","","db_book");

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }


function tambah_writer($data) {
    global $conn;
    $name = htmlspecialchars($data["name"]);
    $query = "INSERT INTO writer_tb
    VALUES
    ('','$name')
    ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambah_category($data) {
    global $conn;
    $name = htmlspecialchars($data["name"]);
    
    $query = "INSERT INTO category_tb
    VALUES
    ('','$name')
    ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
       
function tambah($data) {
    global $conn;
    $name = htmlspecialchars($data["name"]);
    $penulis_id = htmlspecialchars($data["writer_id"]);
    $category_id = htmlspecialchars($data["category_id"]);
    $tahun = htmlspecialchars($data["publication_year"]);


    // upload gambar
    $img = upload();
    if ( !$img ) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO book_tb
    VALUES
    ('','$name','$category_id','$penulis_id','$tahun','$img')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    }

    function upload() {
    $namaFile = $_FILES['img']['name'];
    $ukuranFile = $_FILES['img']['size'];
    $error = $_FILES['img']['error'];
    $tmpName = $_FILES['img']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if ( $error === 4 ) {
        echo "<script>
                alert('Silahkan Upload Gambar terlebih dahulu');
            </script>
        ";
        return false;
    }

    // cek apakh yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('File tidak sesuai [hanya gambar]');
            </script>
        ";
        return false;
    }

    // cek jika ukuranya terlalu besar
    if ( $ukuranFile > 1000000 ) {
        echo "<script>
                alert('File Maksimal 1mb');
            </script>
        ";
        return false;
    }

    // lolos pengecekan gambar siap di upload
    // generate nama gambar baru, agar nama gambar di database tidak sama satu dengan yang lain
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;

    }


?>