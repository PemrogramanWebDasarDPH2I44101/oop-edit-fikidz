<?php
    require("class.php");
    $nim = $_GET['nim'];
    $result = $kalkulator->view_data($nim);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <input type="hidden" value="<?php echo $row['nim'];?>" name="nim">
    <form action="class.php" method="post">
        Nama<input type="text" name="nama" value="<?php echo $row['nama'];?>"><br>
        NIM<input type="text" name="nim" value="<?php echo $row['nim'];?>"><br>
        Kelas<input type="text" name="kelas" value="<?php echo $row['kelas'];?>"><br>
        Tanggal Lahir<input type="date" name="tgllahir" value="<?php echo $row['tgllahir'];?>"><br>
        Pilih Operasi
        <select name="operasi">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <br>
        <input type="submit" value="Kirim">
    </form>
</body>
</html>