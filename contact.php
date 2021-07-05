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
    <?php
    include "navbar.php";
    ?>
    <div class="card" style="margin: 10px;">
        <div class="card-header">
            <h5 class="mb-0">User information</h5>
        </div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2" style="margin-top: 10px;">
                <div class="col"><label class="form-label">Firstname</label><input type="text" class="form-control" name="Firstname" placeholder="Firstname"></div>
                <div class="col"><label class="form-label">Surname</label><input type="text" class="form-control" name="Surname" placeholder="Surname"></div>
            </div>
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2" style="margin-top: 10px;">
                <div class="col"><label class="form-label">Username</label><input type="text" class="form-control" name="username" placeholder="username"></div>
                <div class="col"><label class="form-label">Email</label><input type="text" class="form-control" inputmode="email" name="Email" placeholder="Email"></div>
            </div>
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2" style="margin-top: 10px;">
                <div class="col"><label class="form-label">Phone number</label><input type="text" class="form-control" name="Phone number" placeholder="Phone number"></div>
                <div class="col"><label class="form-label">Shop address</label><input type="text" class="form-control" name="Shop address" placeholder="Shop address"></div>
            </div>
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2" style="margin-top: 10px;">
                <div class="col"><label class="form-label">More information</label><input type="text" class="form-control" name="More information" placeholder="More information"></div>
                <div class="col"><label class="form-label">Shop name</label><input type="text" class="form-control" name="Shop name" placeholder="Shop name"></div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col text-end"><button class="btn btn-primary" type="button">Save information</button></div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>