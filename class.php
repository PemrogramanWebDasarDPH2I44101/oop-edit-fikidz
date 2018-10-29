<?php
class Kalkulator{
    private $conn;

    public function Kalkulator(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "tugasoop";       
        $this->conn = mysqli_connect($servername, $username, 
                           $password, $db);                        
    }    

    public function tambah(){
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $kelas = $_POST['kelas'];
        $tgllahir = $_POST['tgllahir'];
        $sql    = "INSERT INTO mahasiswa(nama, nim, kelas, tgllahir) 
                    VALUES ('$nama','$nim','$kelas', '$tgllahir')";
        mysqli_query($this->conn, $sql);   

    }   

    public function kurang(){        
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $sql    = "DELETE FROM mahasiswa WHERE nim=$nim";        
        mysqli_query($this->conn, $sql);

    }

    public function bagi(){
        $sql    = "SELECT * FROM mahasiswa";        
        return mysqli_query($this->conn, $sql);
    }
    public function view_data($nim){
            $sql = "SELECT * FROM mahasiswa where nim = '$nim'";
            return mysqli_query($this->conn,$sql);

    }
    public function update(){
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $kelas = $_POST['kelas'];
        $tgllahir = $_POST['tgllahir'];
         
        $sql ="UPDATE mahasiswa SET nama = '$nama', nim = '$nim', kelas = '$kelas', tgllahir = '$tgllahir' where nim='$nim'";

    }

}
@$operasi = $_POST["operasi"];
$kalkulator = new Kalkulator();
if($operasi == "+"){
    $kalkulator->tambah();
    echo "Berhasil Ditambahkan";
}
if($operasi == "-"){
    $kalkulator->kurang();
    echo "Berhasil Dihapus";
}
if($operasi == "/"){
    $result = $kalkulator->bagi();
    require_once("data.php");
}
if($operasi == "*"){
    $result = $kalkulator->update();
    require_once("data.php");
}
?>