<?php
include 'includes/header.php';
include 'includes/db.php';

$sql = "SELECT penjualan.id, pelanggan.nama, penjualan.jumlah, penjualan.harga FROM penjualan INNER JOIN pelanggan ON penjualan.pelanggan_id = pelanggan.id";
$result = $conn->query($sql);
?>
<h2>Daftar Penjualan</h2>
<a href="tambah_penjualan.php">Tambah Penjualan</a>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Jumlah Galon</th>
        <th>Harga</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["nama"]."</td><td>".$row["jumlah"]."</td><td>".$row["harga"]."</td></tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
    }
    ?>
</table>
<?php include 'includes/footer.php'; ?>
