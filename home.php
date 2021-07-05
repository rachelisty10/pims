<?php
session_start();
$uid = $_SESSION['id'];
include "configure.php";

$shop_id = 0;

// Attempt select query execution with order by clause
$sql1 = "SELECT * FROM shop WHERE uid LIKE '$uid'";
if ($result1 = mysqli_query($link, $sql1)) {
    if (mysqli_num_rows($result1) > 0) {
        while ($row1 = mysqli_fetch_array($result1)) {
            $shop_id = $row1['shop_id'];
        }
        // Close result set
        mysqli_free_result($result1);
    }else{
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL= new_intro.php">';
    }
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
    <div class="text-end" style="margin: 20px;">
        <a href="new_med.php" style="padding-top: 2px;padding-bottom: 2px;border-radius: 10px;" class="btn btn-success" type="button">Add new medicine</a>
    </div>
    <div class="table-responsive" style="margin: 20px;">
        <table class="table">
            <thead>
                <tr>
                    <th>medicine name</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Attempt select query execution with order by clause
                $sql = "SELECT * FROM medicine WHERE shop_ui LIKE '$shop_id' ORDER BY medi_status ASC";
                if ($result = mysqli_query($link, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<tr><td>' . $row["medi_name"] . '</td>';
                            echo '<td>' . $row["medi_status"] . '</td></tr>';
                        }
                        // Close result set
                        mysqli_free_result($result);
                    } else {
                        echo "No medicine found.";
                    }
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
                ?>

            </tbody>
        </table>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>