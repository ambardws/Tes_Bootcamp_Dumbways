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


function tambah($data) {
    global $conn;
    $name = htmlspecialchars($data["name"]);
    $penulis_id = htmlspecialchars($data["writer_id"]);
    $category_id = htmlspecialchars($data["category_id"]);
    $tahun = htmlspecialchars($data["publication_year"]);
    $img = htmlspecialchars($data["img"]);

     // query insert data
     $query = "INSERT INTO buku
     VALUES
     ('','$name','$penulis_id','$category_id','$tahun','$img')
     ";
 
     mysqli_query($conn, "$query");
 
     return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
    return mysqli_affected_rows($conn);
}


?>