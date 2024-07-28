<?php
include 'includes/header.php';
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlah = $_POST["jumlah"];

    $sql = "INSERT INTO stok (jumlah) VALUES ('$jumlah')";
    if ($conn->query($sql) === TRUE) {
        echo "Stok baru berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<h2>Tambah Stok</h2>
<form method="post" action="">
    <label for="jumlah">Jumlah:</label><br>
    <input type="number" id="jumlah" name="jumlah"><br>
    <input type="submit" value="Simpan">
</form>

<?php include 'includes/footer.php'; ?>
