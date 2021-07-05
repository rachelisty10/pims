<?php
session_start();
include "configure.php";
$uid = $_SESSION['id'];
$shop_id=0;

 // Attempt select query execution with order by clause
 $sql1 = "SELECT * FROM shop WHERE uid LIKE '$uid'";
 if ($result1 = mysqli_query($link, $sql1)) {
     if (mysqli_num_rows($result1) > 0) {
         while ($row1 = mysqli_fetch_array($result1)) {
             $shop_id = $row1['shop_id'];
        }
        // Close result set
        mysqli_free_result($result1);
    }
}

if (isset($_POST['send_med'])) {
    $med_name = mysqli_real_escape_string($link, $_REQUEST['med_name']);
    $check_med = mysqli_real_escape_string($link, $_REQUEST['check_med']);

    $sql = "INSERT INTO medicine (medi_name, medi_status, shop_ui) VALUES (?,?,?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssi", $med_name, $check_med, $shop_id);

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
            <h5 class="mb-0">User information</h5>
        </div>
        <div class="card-body">

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2" style="margin-top: 10px;">
                    <div class="col">
                        <label class="form-label">medicine name</label>
                        <input type="text" class="form-control" name="med_name" placeholder="medicine name" required="">
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select name="check_med" class="form-control" id="exampleFormControlSelect1">
                                <option>Available</option>
                                <option>Out of stock</option>
                            </select>
                        </div>
                    </div>

                    <div style="margin: 10px;" class="col">
                        <input name="send_med" type="submit" class="btn btn-danger" style="border-radius: 10px;" value="save">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>