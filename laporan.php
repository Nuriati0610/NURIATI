<?php
include 'includes/header.php';
include 'includes/db.php';

// Fungsi untuk mendapatkan nama bulan dari angka
function getNamaBulan($bulan) {
    $nama_bulan = array(
        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
        5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
        9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
    );
    return $nama_bulan[$bulan];
}

// Mendapatkan data penjualan per bulan
$sql = "SELECT 
            YEAR(tanggal) AS tahun, 
            MONTH(tanggal) AS bulan, 
            SUM(jumlah) AS total_galon, 
            SUM(harga) AS total_harga 
        FROM penjualan 
        GROUP BY YEAR(tanggal), MONTH(tanggal)";
$result = $conn->query($sql);
?>
<h2>Laporan Penjualan Per Bulan</h2>
<table border="1">
    <tr>
        <th>Tahun</th>
        <th>Bulan</th>
        <th>Total Galon Terjual</th>
        <th>Total Pendapatan</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["tahun"] . "</td>";
            echo "<td>" . getNamaBulan($row["bulan"]) . "</td>";
            echo "<td>" . $row["total_galon"] . "</td>";
            echo "<td>Rp " . number_format($row["total_harga"], 2, ',', '.') . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
    }
    ?>
</table>
<?php include 'includes/footer.php'; ?>
