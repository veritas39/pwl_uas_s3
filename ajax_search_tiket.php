<?php
require('koneksi.php');

session_start();

$per_halaman = 7;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$mulai = ($halaman - 1) * $per_halaman;
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

$query = "SELECT id, nama, email, jumlah_tiket, tgl_pemesanan, tgl_kedatangan, total_harga 
FROM tiket
WHERE nama LIKE '%$cari%' OR id = '$cari'
LIMIT $mulai, $per_halaman";

$result = mysqli_query($db_conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($db_conn));
}

// Fetch all rows
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Count total rows for pagination
$query_jumlah = "SELECT COUNT(*) AS total_tiket FROM tiket WHERE nama LIKE '%$cari%' OR id = '$cari'";
$result_jumlah = mysqli_query($db_conn, $query_jumlah);

if (!$result_jumlah) {
    die("Query failed: " . mysqli_error($db_conn));
}

$row_jumlah = mysqli_fetch_assoc($result_jumlah);
$total_tiket = $row_jumlah['total_tiket'];
$total_halaman = ceil($total_tiket / $per_halaman);

// HTML for pagination links
$pagination_html = "<ul class='pagination'>";
for ($i = 1; $i <= $total_halaman; $i++) {
    $pagination_html .= "<li class='page-item'><a class='page-link' href='#' onclick='loadUserData($i)'>$i</a></li>";
}
$pagination_html .= "</ul>";

// Combine rows and pagination links
$response = [
    'rows' => $rows,
    'pagination' => $pagination_html
];

// Bootstrap table for user search results
echo "<table class='table table-hover'>";
echo "<caption>Total: " . $total_tiket . "</caption>";
echo "<thead>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nama</th>";
echo "<th class='d-none'>Email</th>";
echo "<th>Jumlah Tiket</th>";
echo "<th>Tanggal Pemesanan</th>";
echo "<th>Tanggal Kedatangan</th>";
echo "<th>Total Harga</th>";
if ($_SESSION['privilege'] == 'admin') {
    echo "<th>Aksi</th>";
}
echo "</tr>";
echo "</thead>";
echo "<tbody>";

foreach ($rows as $tiket) {
    echo "<tr>";
    echo "<td>{$tiket['id']}</td>";
    echo "<td>{$tiket['nama']}</td>";
    echo "<td class='d-none'>{$tiket['email']}</td>";
    echo "<td>{$tiket['jumlah_tiket']}</td>";
    echo "<td>{$tiket['tgl_pemesanan']}</td>";
    echo "<td>{$tiket['tgl_kedatangan']}</td>";
    echo "<td>{$tiket['total_harga']}</td>";
    if ($_SESSION['privilege'] == 'admin') {
        echo "<td>";
        echo "<a href='detail.php?id={$tiket['id']}' class='btn btn-info btn-sm'>Detail</a>";
        echo "<a href='edit.php?id={$tiket['id']}' class='btn btn-warning btn-sm mx-2'>Edit</a>";
        echo "<a href='hapus.php?id={$tiket['id']}' class='btn btn-danger btn-sm'>Hapus</a>";
        echo "</td>";
    }
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";

// Echo pagination links
echo "<div id='paginationContainer'>$pagination_html</div>";
?>

<script>
    function loadUserData(page) {
        var searchTerm = "<?php echo $cari; ?>";

        $.ajax({
            type: "GET",
            url: "ajax_search_tiket.php",
            data: { halaman: page, cari: searchTerm },
            success: function (response) {
                $("#searchResults").html(response);
            }
        });
    }
</script>