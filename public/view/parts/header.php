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
            <?php if (basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) == "index.php") { ?>
                <a class="navbar-brand" href="../webdev/index.php"><span
                            class="glyphicon glyphicon-book"></span> SWD Library</a>
            <?php } else if (basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) == "webdev"){ ?>
                <a class="navbar-brand" href="index.php"><span
                            class="glyphicon glyphicon-book"></span> SWD Library</a>
            <?php } else { ?>
                <a class="navbar-brand" href="../../index.php"><span
                            class="glyphicon glyphicon-book"></span> SWD Library</a>
            <?php } ?>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php if (basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) == "index.php"){ ?>
                <ul class="nav navbar-nav">
                    <li><a href="../webdev/index.php">Home <span class="sr-only">(current)</span></a></li>
                    <li><a href="../webdev/public/view/about.php">About Us</a></li>
                    <li><a href="../webdev/public/view/contact.php">Contact Us</a></li>
                    <li><a href="../webdev/public/view/search.php">Search Library</a></li>
                </ul>
            <?php } else if (basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) == "webdev") { ?>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
                    <li><a href="public/view/about.php">About Us</a></li>
                    <li><a href="public/view/contact.php">Contact Us</a></li>
                    <li><a href="public/view/search.php">Search Library</a></li>
                </ul>
            <?php } else { ?>
                <ul class="nav navbar-nav">
                    <li><a href="../../index.php">Home <span class="sr-only">(current)</span></a></li>
                    <li><a href="../view/about.php">About Us</a></li>
                    <li><a href="../view/contact.php">Contact Us</a></li>
                    <li><a href="../view/search.php">Search Library</a></li>
                </ul>
            <?php } ?>
            <ul class="nav navbar-nav navbar-right">
                <?php if (basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) == "index.php"){ ?>
                    <?php
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    if (!empty($_SESSION) && in_array("admin", $_SESSION)) {
                        if ($_SESSION["admin"] == true){ ?>
                        <li><a href="public/view/admin.php"> Dashboard</a></li>
                    <?php } } else { ?>
                        <li><a href="public/view/admin.php"> Admin Login</a></li>
                    <?php } ?>
                    <?php
                    if (!empty($_SESSION) && in_array("admin", $_SESSION)) {
                        if ($_SESSION["admin"] == true) {
                            echo "<li><a href='protected/action/logout.php'>Logout</a></li>";
                        }
                    }?>
                <?php } else if (basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']) == "webdev"){ ?>
                    <?php
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    if (!empty($_SESSION) && in_array("admin", $_SESSION)) {
                        if ($_SESSION["admin"] == true){ ?>
                            <li><a href="public/view/admin.php"> Dashboard</a></li>
                        <?php } } else { ?>
                        <li><a href="public/view/admin.php"> Admin Login</a></li>
                    <?php } ?>
                    <?php
                    if (!empty($_SESSION) && in_array("admin", $_SESSION)) {
                        if ($_SESSION["admin"] == true){
                            echo "<li><a href='protected/action/logout.php'>Logout</a></li>";
                        }
                    } ?>
                <?php } else { ?>
                    <?php
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    if (!empty($_SESSION) && in_array("admin", $_SESSION)) {
                        if ($_SESSION["admin"] == true){ ?>
                            <li><a href="admin.php"> Dashboard</a></li>
                        <?php } } else { ?>
                        <li><a href="admin.php"> Admin Login</a></li>
                    <?php } ?>
                    <?php
                    if (!empty($_SESSION) && in_array("admin", $_SESSION)) {
                        if ($_SESSION["admin"] == true){
                            echo "<li><a href='../../protected/action/logout.php'>Logout</a></li>";
                        }
                    } ?>
                <?php } ?>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>