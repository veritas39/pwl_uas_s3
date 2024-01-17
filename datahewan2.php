<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* Your existing styles here */
    </style>
    <title>Data Hewan</title>
</head>
<body>
<section class="container-fluid mb-4">
    <section class="row justify-content-center">
        <section class="">
            <h4 class="text-center font-weight-bold mb-4 py-4"> Data Hewan </h4>

            <form id="searchForm">
                <input type="text" name="cari" id="searchInput" placeholder="Cari Nama & Id">
            </form><br>

            <div id="searchResults"></div>

        </section>
    </section>
</section>

<script>
    $(document).ready(function () {
        // Execute search on keyup event
        $("#searchInput").keyup(function () {
            search();
        });
    });

    function search() {
        var searchTerm = $("#searchInput").val();

        $.ajax({
            type: "GET",
            url: "ajax_search.php",
            data: { cari: searchTerm },
            success: function (response) {
                $("#searchResults").html(response);
            }
        });
    }
</script>

</body>
</html>
