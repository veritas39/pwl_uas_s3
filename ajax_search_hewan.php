<?php
require('koneksi.php');

session_start();

$per_halaman = 7;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$mulai = ($halaman - 1) * $per_halaman;
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

$query = "SELECT id, nama, jenis, spesies, warna, umur
FROM hewan
WHERE Nama LIKE '%$cari%' OR id = '$cari'
LIMIT $mulai, $per_halaman";

$result = mysqli_query($db_conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($db_conn));
}

// Fetch all rows
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Count total rows for pagination
$query_jumlah = "SELECT COUNT(*) AS total_hewan FROM hewan WHERE Nama LIKE '%$cari%' OR id = '$cari'";
$result_jumlah = mysqli_query($db_conn, $query_jumlah);

if (!$result_jumlah) {
    die("Query failed: " . mysqli_error($db_conn));
}

$row_jumlah = mysqli_fetch_assoc($result_jumlah);
$total_hewan = $row_jumlah['total_hewan'];
$total_halaman = ceil($total_hewan / $per_halaman);

// HTML for pagination links
$pagination_html = "<ul class='pagination'>";
for ($i = 1; $i <= $total_halaman; $i++) {
    $pagination_html .= "<li class='page-item'><a class='page-link' href='#' onclick='loadData($i)'>$i</a></li>";
}
$pagination_html .= "</ul>";

// Combine rows and pagination links
$response = [
    'rows' => $rows,
    'pagination' => $pagination_html
];

// Bootstrap table for search results
echo "<table class='table table-hover'>";
echo "<caption>Total: " . $total_hewan . "</caption>";
echo "<thead>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nama</th>";
echo "<th>Jenis</th>";
echo "<th>Spesies</th>";
echo "<th>Warna</th>";
echo "<th>Umur</th>";
if ($_SESSION['privilege'] == 'admin') {
    echo "<th>Aksi</th>";
}
echo "</tr>";
echo "</thead>";
echo "<tbody>";

foreach ($rows as $hewan) {
    echo "<tr>";
    echo "<td>{$hewan['id']}</td>";
    echo "<td>{$hewan['nama']}</td>";
    echo "<td>{$hewan['jenis']}</td>";
    echo "<td>{$hewan['spesies']}</td>";
    echo "<td>{$hewan['warna']}</td>";
    echo "<td>{$hewan['umur']}</td>";
    if ($_SESSION['privilege'] == 'admin') {
        echo "<td>";
        echo "<a href='detailhewan.php?id={$hewan['id']}' class='btn btn-info btn-sm'>Detail</a>";
        echo "<a href='edithewan.php?id={$hewan['id']}' class='btn btn-warning btn-sm mx-2'>Edit</a>";
        echo "<a href='hapushewan.php?id={$hewan['id']}' class='btn btn-danger btn-sm'>Hapus</a>";
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
    function loadData(page) {
        var searchTerm = "<?php echo $cari; ?>";

        $.ajax({
            type: "GET",
            url: "ajax_search_hewan.php",
            data: { halaman: page, cari: searchTerm },
            success: function (response) {
                $("#searchResults").html(response);
            }
        });
    }
</script>
