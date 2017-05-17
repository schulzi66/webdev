<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../webdev/index.php"><span
                        class="glyphicon glyphicon-book"></span> SWD Library</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="../webdev/index.php">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="../view/about.php">About Us</a></li>
                <li><a href="../view/contact.php">Contact Us</a></li>
                <li><a href="../view/search.php">Search Library</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (!isset($_SESSION)) {
                    session_start();
                }
                if (!empty($_SESSION) && in_array("admin", $_SESSION) && $_SESSION["admin"] == true) { ?>
                    <li><a href="view/admin.php"> Dashboard</a></li>
                <?php } else { ?>
                    <li><a href="view/admin.php"> Admin Login</a></li>
                <?php } ?>
                <?php
                if (!empty($_SESSION) && in_array("admin", $_SESSION) && $_SESSION["admin"] == true) {
                    echo "<li><a href='../protected/action/logout.php'>Logout</a></li>";
                } ?>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>