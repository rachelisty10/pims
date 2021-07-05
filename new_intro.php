<?php
session_start();
$uid = $_SESSION['id'];
include "configure.php";

if (isset($_POST['send_information'])) {
    $shop_name = mysqli_real_escape_string($link, $_REQUEST['shop_name']);
    $shop_contact = mysqli_real_escape_string($link, $_REQUEST['shop_contact']);
    $Shop_address = mysqli_real_escape_string($link, $_REQUEST['Shop_address']);
    $Shop_info = mysqli_real_escape_string($link, $_REQUEST['Shop_info']);

    $sql = "INSERT INTO shop (uid, shop_name, shop_contact, shop_address, shop_more) VALUES (?,?,?,?,?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        $shop = 1;
        mysqli_stmt_bind_param($stmt, "issss", $uid, $shop_name, $shop_contact, $Shop_address, $Shop_info);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to login page
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL= home.php">';
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "head.php";
?>

<body>
    <?php
    include "navbar.php";
    ?>
    <div class="card" style="margin: 10px;">
        <div class="card-header">
            <h5 class="mb-0">Shop information</h5>
        </div>
        <div class="card-body">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <div class="row row-cols-xxl-1" style="margin-top: 10px;">
                    <div class="col">
                        <label class="form-label">Shop name</label>
                        <input type="text" class="form-control" name="shop_name" placeholder="Shop name" />
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2" style="margin-top: 10px;">
                    <div class="col">
                        <label class="form-label">Shop contact</label>
                        <input type="text" class="form-control" required name="shop_contact" placeholder="Shop contact" />
                    </div>
                    <div class="col">
                        <label class="form-label">Shop address<br /></label>
                        <input type="text" class="form-control" required name="Shop_address" placeholder="Shop address" />
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col">
                        <label class="form-label">More information about shop address<br /></label>
                        <textarea class="form-control" name="Shop_info"></textarea>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2" style="margin-top: 10px;">
                    <div class="col">
                        <input name="send_information" type="submit" class="btn btn-danger" value="Save">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>