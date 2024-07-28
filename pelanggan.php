<?php
include 'includes/header.php';
include 'includes/db.php';

$sql = "SELECT * FROM pelanggan";
$result = $conn->query($sql);
?>
<h2>Daftar Pelanggan</h2>
<a href="tambah_pelanggan.php">Tambah Pelanggan</a>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Telepon</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["nama"]."</td><td>".$row["alamat"]."</td><td>".$row["telepon"]."</td></tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
    }
    ?>
</table>
<?php include 'includes/footer.php'; ?>
