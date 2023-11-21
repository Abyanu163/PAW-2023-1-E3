<?php 
/* koneksi database */
function connect($servername,$database,$username,$password){
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    return $conn;
}
$conn=connect("localhost","store","root","");

/* AMBIL DATA */
function selectData($query){
    global $conn;
    $stmt = $conn->prepare($query); 
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

/* TAMBAH PRODUK */
function tambahProduk($value){
    global $conn;
    $gambar = upload();
    $suplai = htmlspecialchars($value["suplai"]);
    $kategori = htmlspecialchars($value["kategori"]);
    $nama = htmlspecialchars($value["namaProduk"]);
    $harga = htmlspecialchars($value["harga"]);
    $stok = htmlspecialchars($value["stok"]);
    $deskripsi = htmlspecialchars($value["deskripsi"]);
    $stmt = $conn->prepare("INSERT INTO products(kodeSuplaier,KodeKategori,namaProduk, gambarProduk, hargaProduk, stokProduk, deskripsiProduk)
                        VALUES (:kodeSuplaier,:KodeKategori,:namaProduk, :gambarProduk, :hargaProduk, :stokProduk, :deskripsiProduk)");
    $stmt->bindvalue(":kodeSuplaier", $suplai);
    $stmt->bindvalue(":KodeKategori", $kategori);
    $stmt->bindvalue(":namaProduk", $nama);
    $stmt->bindvalue(":gambarProduk", $gambar);
    $stmt->bindvalue(":hargaProduk", $harga);
    $stmt->bindvalue(":stokProduk", $stok);
    $stmt->bindvalue(":deskripsiProduk", $deskripsi);
    $stmt->execute();
}

/* HAPUS PRODUK */
function hapusProduk($id){
    global $conn;
    $data=selectData("SELECT gambarProduk FROM products WHERE kodeProduk=$id");
    $stmt = $conn->prepare("DELETE FROM products WHERE  kodeProduk =:kodeProduk");
    $stmt->bindvalue(":kodeProduk", $id);
    $stmt->execute();
    unlink('../../img/'.$data[0]["gambarProduk"]);
    return $stmt->rowCount();
}

/* UPLOAD GAMBAR */
function upload(){
    $namaFile=$_FILES['gambar']['name'];
    $tmpName=$_FILES['gambar']['tmp_name'];

    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    $namaFileBaru=uniqid();
    $namaFileBaru .='.';
    $namaFileBaru .= "$ekstensiGambar";

    move_uploaded_file($tmpName,'../../img/'.$namaFileBaru);
    return $namaFileBaru;
};

/* EDIT PRODUK */
function editProduk($data){
    global $conn;
    $id=$data["id"];
    $kategori=$data["kategori"];
    $suplai=$data["suplai"];
    $nama=htmlspecialchars($data["namaProduk"]);
    $harga=htmlspecialchars($data["harga"]);
    $stok=htmlspecialchars($data["stok"]);
    $deskripsi=htmlspecialchars($data["deskripsi"]);
    $gambarLama=$data["gambarLama"];

    if($_FILES["gambar"]["error"]===4){
        $gambar=$gambarLama;
    } else{
        $gambar=upload();
        $oldGambar=selectData("SELECT gambarProduk FROM products WHERE kodeProduk=$id");
        unlink('../../img/'.$oldGambar[0]["gambarProduk"]);
    };
    $query="UPDATE products 
    SET kodeKategori=:kategori, kodeSuplaier=:suplaier, namaProduk=:nama, gambarProduk=:gambar, hargaProduk=:harga, stokProduk=:stok, deskripsiProduk=:deskripsi
    WHERE kodeProduk=:id";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(":id",$id);
    $stmt->bindValue(":kategori",$kategori);
    $stmt->bindValue(":suplaier",$suplai);
    $stmt->bindValue(":nama",$nama);
    $stmt->bindValue(":gambar",$gambar);
    $stmt->bindValue(":harga",$harga);
    $stmt->bindValue(":stok",$stok);
    $stmt->bindValue(":deskripsi",$deskripsi);
    $stmt->execute();
    return $stmt->rowCount();
};


/* TAMBAH SUPLAIER */
function tambahSuplaier($data){
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $no = htmlspecialchars($data["no"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $stmt = $conn->prepare("INSERT INTO suplaier(namaSuplaier, telpSuplaier, alamatSuplaier)
                        VALUES (:namaSuplaier,:telp,:alamat)");
    $stmt->bindvalue(":namaSuplaier", $nama);
    $stmt->bindvalue(":telp", $no);
    $stmt->bindvalue(":alamat", $alamat);
    $stmt->execute();
    return $stmt->rowCount();
}

/* HAPUS SUPLAIER */
function hapusSuplaier($id){
    global $conn;
    $stmt = $conn->prepare("DELETE FROM suplaier WHERE  kodeSuplaier =:kode");
    $stmt->bindvalue(":kode", $id);
    $stmt->execute();
    return $stmt->rowCount();
}

/* EDIT SUPLAIER */
function editSuplaier($data){
    global $conn;
    $id=$data["id"];
    $nama=htmlspecialchars($data["nama"]);
    $nomor=htmlspecialchars($data["nomor"]);
    $alamat=htmlspecialchars($data["alamat"]);
    $query="UPDATE suplaier 
    SET namaSuplaier=:nama, telpSuplaier=:nomor,alamatSuplaier=:alamat
    WHERE kodeSuplaier=:id";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(":id",$id);
    $stmt->bindvalue(":nama",$nama);
    $stmt->bindvalue(":nomor",$nomor);
    $stmt->bindvalue(":alamat",$alamat);
    $stmt->execute();
    return $stmt->rowCount();
}

/*  MEMBUAT ORDER */
function makeOrder($data){
    global $conn;
    $query="SELECT * FROM orders WHERE kodePelanggan={$data['kodePelanggan']}";
    $hasil=selectData($query);
    if($hasil==[]){
        $stmt = $conn->prepare("INSERT INTO orders(kodePelanggan, keterangan)
                                VALUES (:kode,:ket)");
        $stmt->bindvalue(":kode",$data["kodePelanggan"]);
        $stmt->bindValue(":ket","belum");
        $stmt->execute();
        $newData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $newData;
    } else{
        $count=0;
        foreach($hasil as $ch){
            if($ch["keterangan"]=="belum"){
                $count+=1;
                return $ch;
            }
        }
        if($count==0){
            $stmt = $conn->prepare("INSERT INTO orders(kodePelanggan, keterangan)
                                VALUES (:kode,:ket)");
            $stmt->bindvalue(":kode",$data["kodePelanggan"]);
            $stmt->bindValue(":ket","belum");
            $stmt->execute();
            $newData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $newData;
        }
    }
}

/* ADD ORDER */
function addOrderDetail($pesanan,$produk){
    global $conn;
    $harga=selectData("SELECT hargaProduk FROM products WHERE kodeProduk={$produk}");
    $query="INSERT INTO orderdetail(kodeProduk, kodePesanan, subHarga)
            VALUES (:kodeProduk,:kodePesanan,:subHarga)";
    $stmt = $conn->prepare($query);
    $stmt->bindvalue(":kodeProduk", $produk);
    $stmt->bindvalue(":kodePesanan", $pesanan);
    $stmt->bindvalue(":subHarga", $harga[0]["hargaProduk"]);
    $stmt->execute();

    // $stokLama=selectData("SELECT stokProduk FROM products WHERE kodeProduk={$data['kodeProduk']}");
    // $hasil=$stokLama[0]["stokProduk"]-$data["jumlah"];
    // $stokUpdate=$conn->prepare("UPDATE products SET stokProduk=:stokBaru WHERE kodeProduk=:kodeProduk");
    // $stokUpdate->bindvalue(":stokBaru",$hasil);
    // $stokUpdate->bindvalue(":kodeProduk",$data["kodeProduk"]);
    // $stokUpdate->execute();
    // return $stmt->rowCount();
}

/* HAPUS ORDER */
function hapusOrderDetil($idProduk,$idPesanan){
    global $conn;
    $stmt = $conn->prepare("DELETE FROM orderdetail WHERE kodeProduk=:idProduk AND kodePesanan=:idPesan");
    $stmt->bindvalue(":idProduk",$idProduk);
    $stmt->bindvalue(":idPesan",$idPesanan);
    $stmt->execute();
    return $stmt->rowCount();
}

?>