<?php
require_once "../controller/SessionController.php";

SessionController::validateAdminSession();
?>
<html>
<head>
    <?php include '../protected/view/parts/head.php'; ?>
</head>
<?php include '../protected/view/parts/header.php'; ?>
<body>
<div class="" data-placeholder-label="Header">
    <div class="">
        <div class="">
            <div class="heading"><h1>SWD LIBRARY</h1>
            </div>
        </div>
        <div class="form-container container">
            <ul class="nav navbar-nav">
                <li><a href="pagemanagement.php">Page Management</a></li>
                <li><a href="imagegallery.php">Image Gallery</a></li>
                <li><a href="bookmanagement.php">Book Management</a></li>
                <li><a href="membermanagement.php">Member Management</a></li>
                <li><a href="bookloans.php">Book Loans</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include '../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../protected/view/parts/footer.php'; ?>
</html>


