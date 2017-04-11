<?php
session_start();
if ($_SESSION["admin"] != true){
    $host  = $_SERVER['HTTP_HOST'];
    $uri   ="/Webdev/public_html/protected/view";
    $extra = 'admin.php';
    header("Location: http://$host$uri/$extra");
    exit;
}
?>
<html>
<head>
    <?php include '../protected/view/parts/head.php'; ?>
</head>
<?php include '../protected/view/parts/header.php'; ?>
<body>
<ul class="nav navbar-nav">
    <li><a href="pagemanagement.php">Page Management</a></li>
    <li><a href="imagegallery.php">Image Gallery</a></li>
    <li><a href="bookmanagement.php">Book Management</a></li>
    <li><a href="membermanagement.php">Member Management</a></li>
    <li><a href="bookloans.php">Book Loans</a></li>
</ul>
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include '../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../protected/view/parts/footer.php'; ?>
</html>


