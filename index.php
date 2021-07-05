<?php
session_start();
include "configure.php";
$status_now = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($link, $_REQUEST['name']);
    $status_now = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>medicin search</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">PIMS</a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="account.php">Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div>
        <h1 class="display-5 text-center">Welcome PIMS</h1>
        <p class="lead text-center" style="font-size: 15px;">Please enter name of the medicine below to search</p>
    </div>
    <div class="d-flex justify-content-center" style="margin: 50px;">
        <!-- Start: Search Input (responsive) -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <div class="d-lg-flex justify-content-lg-center mt-5 mt-md-0 search-area">
                <i class="fas fa-search float-start search-icon"></i>
                <input name="name" class="float-start float-sm-end custom-search-input" type="search" placeholder="Type medicine name" autocomplete="on" required="" name="medi_name">
            </div>
        </form>
        <!-- End: Search Input (responsive) -->
    </div>

    <?php
    if ($status_now) {
        echo ' <div style="margin: 30px;">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Shop name</th>
                        <th>Medicine name</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>more information</th>
                    </tr>
                </thead>
                <tbody>';

        // Attempt select query execution with order by clause
        $sql = "SELECT * FROM medicine INNER JOIN shop ON shop.shop_id=medicine.shop_ui WHERE medi_name  LIKE '$name' ORDER BY medi_status ASC";
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    if($row["medi_status"] == "Available"){
                        echo '<tr>
                        <td>' . $row["shop_name"] . '</td>
                        <td>' . $row["medi_name"] . '</td>
                        <td>' . $row["shop_address"] . '</td>
                        <td>' . $row["shop_contact"] . '</td>
                        <td>' . $row["shop_more"] . '</td>
                        </tr>';
                    }
                   
                }
                // Close result set
                mysqli_free_result($result);
            } else {
                echo "No medicine found.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
    ?>
    </tbody>
    </table>
    </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>