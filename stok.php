<?php
include 'includes/header.php';
include 'includes/db.php';

$sql = "SELECT * FROM stok";
$result = $conn->query($sql);
?>
<h2>Daftar Stok</h2>
<a href="tambah_stok.php">Tambah Stok</a>
<table border="1">
    <tr>
        <th>No</th>
        <th>Jumlah</th>
        <th>Tanggal</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["jumlah"]."</td><td>".$row["tanggal"]."</td></tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
    }
    ?>
</table>
<?php include 'includes/footer.php'; ?>
