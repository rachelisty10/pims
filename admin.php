<?php
session_start();
include "configure.php";
if ($_SESSION['admin'] != true) {
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL= admin.php">';
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
    <div class="text-end" style="margin: 10px;">
        <a href="create_user.php" class="btn btn-success" style="padding-top: 2px;padding-bottom: 2px;border-radius: 10px;" type="button">create new user</a>
    </div>

    <div style="margin: 30px;">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Shop name</th>
                        <th>shop owner</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        // Attempt select query execution with order by clause
                        $sql = "SELECT shop.shop_name, shop.shop_contact, user.username FROM shop INNER JOIN user ON shop.uid=user.uid";
                        //$sql = "SELECT * FROM shop WHERE shop_ui LIKE '$uid' ORDER BY medi_status ASC";
                        if ($result = mysqli_query($link, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr><td>" . $row['shop_name'] . "</td>";
                                    echo "<td>" . $row['username'] . "</td>";
                                    echo "<td>" . $row['shop_contact'] . "</td>";
                                    echo '<td><a href="#" style="margin-right: 10px;">Disable</a><a href="#">Delete</a></td></tr>';
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
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>