<?php
include 'includes/header.php';
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pelanggan_id = $_POST["pelanggan_id"];
    $jumlah = $_POST["jumlah"];
    $harga = $_POST["harga"];

    $sql = "INSERT INTO penjualan (pelanggan_id, jumlah, harga) VALUES ('$pelanggan_id', '$jumlah', '$harga')";
    if ($conn->query($sql) === TRUE) {
        echo "Penjualan baru berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql_pelanggan = "SELECT id, nama FROM pelanggan";
$result_pelanggan = $conn->query($sql_pelanggan);
?>

<h2>Tambah Penjualan</h2>
<form method="post" action="">
    <label for="pelanggan_id">Pelanggan:</label><br>
    <select id="pelanggan_id" name="pelanggan_id">
        <?php
        if ($result_pelanggan->num_rows > 0) {
            while($row = $result_pelanggan->fetch_assoc()) {
                echo "<option value='".$row["id"]."'>".$row["nama"]."</option>";
            }
        }
        ?>
    </select><br>
    <label for="jumlah">Jumlah Galon:</label><br>
    <input type="number" id="jumlah" name="jumlah"><br>
    <label for="harga">Harga:</label><br>
    <input type="number" id="harga" name="harga"><br>
    <input type="submit" value="Simpan">
</form>

<?php include 'includes/footer.php'; ?>
