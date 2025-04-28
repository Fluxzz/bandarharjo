<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  include('/bandarharjo/partials/header.php');
  include_once('/bandarharjo/authentication/auth-check.php');
  include('/bandarharjo/koneksi.php');

$query = "SELECT * FROM pengaduan ORDER BY created_at DESC";
$result = $conn->query($query);
?>

<style>
.container {
    max-width: 1000px;
    margin: 40px auto;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}
.form h2 {
    text-align: center;
    margin-bottom: 20px;
}
table {
    width: 100%;
    border-collapse: collapse;
}
th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: center;
}
th {
    background-color: #4CAF50;
    color: white;
}
img {
    width: 80px;
    height: auto;
    border-radius: 6px;
}
</style>

<div class="container">
    <h2>Daftar Pengaduan</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telp</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['no_telp']) . "</td>";
                    echo "<td style='text-align: left;'>" . nl2br(htmlspecialchars($row['deskripsi'])) . "</td>";

                    if (!empty($row['gambar'])) {
                        echo "<td><img src='/uploads/" . htmlspecialchars($row['gambar']) . "'></td>";
                    } else {
                        echo "<td>-</td>";
                    }

                    echo "<td>" . date('d-m-Y H:i', strtotime($row['created_at'])) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Belum ada pengaduan.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include('/bandarharjo/partials/footer.php');
?>
