<nav class="navbar navbar-light navbar-expand-md">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">PIMS</a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
            <span class="visually-hidden">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navcol-1">
            <ul class="navbar-nav">
                <li class="nav-item" style="margin-right: 5px;">
                <a class="nav-link" href="#"><a class="btn btn-danger" role="button" style="padding-top: 2px;padding-bottom: 2px;border-radius: 10px;" href="index.php">Home</a></a>
                </li>
                <li class="nav-item">
                    <?php
                    if ($_SESSION['loggedin']) {
                        echo '<a class="nav-link" href="#"><a class="btn btn-danger" role="button" style="padding-top: 2px;padding-bottom: 2px;border-radius: 10px;" href="signuot.php">Sign out</a></a>';
                    } else {
                        echo '<a class="nav-link" href="#"><a class="btn btn-danger" role="button" style="padding-top: 2px;padding-bottom: 2px;border-radius: 10px;" href="login.php">Login</a></a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>