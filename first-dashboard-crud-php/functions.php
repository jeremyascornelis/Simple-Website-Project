<?php

//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "uts_12415");

//query
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = []; 
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data) {
    global $conn;

    $nama = htmlspecialchars(stripslashes($data["nama"]));
    $email = htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $telp = htmlspecialchars($data["no_telp"]);
    $peran = htmlspecialchars($data["peran"]);

    //cek konfirmasi password
    if($password !== $password2) {
        echo "
                <script>
                    alert('Konfirmasi password tidak sesuai');
                </script>
            ";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //menambah pengguna baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$nama', '$email', '$telp', '$password',  '$peran')");

    return mysqli_affected_rows($conn);
}

//cari produk
function cariProduk($keyword) {
    $query = "SELECT * FROM barang
                WHERE
              nama LIKE '%$keyword%' OR
              jml_stok LIKE '%$keyword%' OR
              harga LIKE '%$keyword%'
            ";

    return query($query);
}

//tambah Produk
//tambah data Produk
function tambahProduk($data) {
    global $conn;

    $namaProduk = htmlspecialchars($data["nama_produk"]);
    $jumlah = $data["jml_stok"];
    $harga = htmlspecialchars($data["harga"]);

    $gambar = uploadProduk();

    // var_dump($gambar);

    if(!$gambar) {
        return false;
    }

    $query = "INSERT INTO barang VALUES
                ('', '$namaProduk', '$harga', '$gambar', '$jumlah')
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

} 

//upload produk
function uploadProduk() {
    $namaFile = $_FILES['gambar_produk']['name'];
    $ukuranFile = $_FILES['gambar_produk']['size'];
    $error = $_FILES['gambar_produk']['error'];
    $tmpName = $_FILES['gambar_produk']['tmp_name'];

    if($error === 4) {
        echo "<script>
            alert('Pilih gambar terlebih dahulu!'); 
        </script>
        ";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('Yang anda upload bukan gambar!'); 
        </script>
        ";
        return false;
    }

    if($ukuranFile > 2000000) {
        echo "<script>
            alert('ukuran gambar terlalu besar!'); 
        </script>
        ";
        return false;
    }

    //generate nama baru, bila ada gambar dg nama sama
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, './imgBarang/' . $namaFileBaru);

    return $namaFileBaru;
}


//ubah produk
function ubahProduk($data) {
    global $conn;

    $id = $data["id"];
    $namaProduk = htmlspecialchars($data["nama_produk"]);
    $jumlah = $data["jumlah"];
    $harga = htmlspecialchars($data["harga"]);

    $gambarLama = htmlspecialchars($data["gambarLama"]);

    //cek user pilih gambar baru atau tidak
    if($_FILES["gambar_produk"]['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadProduk();
    }  

    $query = "UPDATE barang SET
                nama = '$namaProduk',
                harga = '$harga',
                gambar = '$gambar',
                jml_stok = '$jumlah'
              WHERE kode_barang = $id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//hapusProduk
function hapusProduk($id) {
    global $conn;

    $file = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM barang WHERE kode_barang=$id"));
    unlink('./imgBarang/'. $file["gambar"]);

    mysqli_query($conn, "DELETE FROM barang WHERE kode_barang=$id");

    return mysqli_affected_rows($conn);
}

//USER

//tambah data Pengguna (Admin)
function tambahPengguna($data) {
    global $conn;

    $nama = strtolower(stripslashes($data["nama"]));
    $email = htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $telp = htmlspecialchars($data["telp"]);
    $peran = htmlspecialchars($data["peran"]);

    //cek konfirmasi password
    if($password !== $password2) {
        echo "
                <script>
                    alert('Konfirmasi password tidak sesuai');
                </script>
            ";
        return false;
    }
    

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('', '$nama', '$email', '$telp', '$password',  '$peran')");

    return mysqli_affected_rows($conn);
}

//hapus pengguna
function hapusPengguna($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM user WHERE kode_user = $id");

    return mysqli_affected_rows($conn);
}

//ubah Pengguna
//ubah data pengguna
function ubahPengguna($data) {
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars(stripslashes($data["nama"]));
    $email = htmlspecialchars($data["email"]);
    $telp = htmlspecialchars($data["telp"]);
    $peran = htmlspecialchars($data["peran"]);

    $query = "UPDATE user SET
                nama = '$nama',
                email = '$email',
                telp = '$telp',
                peran = '$peran'
             WHERE kode_user = $id
            ";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//cari Pengguna
//cari admin
function cariPengguna($keyword) {
    $query = "SELECT * FROM user
                WHERE
              nama LIKE '%$keyword%' OR
              email LIKE '%$keyword%' OR
              telp LIKE '%$keyword%' OR
              peran LIKE '%$keyword%'
            ";

    return query($query);
}