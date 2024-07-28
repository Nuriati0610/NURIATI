<?php
include 'includes/header.php';
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $telepon = $_POST["telepon"];

    $sql = "INSERT INTO pelanggan (nama, alamat, telepon) VALUES ('$nama', '$alamat', '$telepon')";
    if ($conn->query($sql) === TRUE) {
        echo "Pelanggan baru berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<h2>Tambah Pelanggan</h2>
<form method="post" action="">
    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama"><br>
    <label for="alamat">Alamat:</label><br>
    <input type="text" id="alamat" name="alamat"><br>
    <label for="telepon">Telepon:</label><br>
    <input type="text" id="telepon" name="telepon"><br>
    <input type="submit" value="Simpan">
</form>

<?php include 'includes/footer.php'; ?>
