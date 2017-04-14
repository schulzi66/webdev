<?php
session_start();
if ($_SESSION["admin"] != true) {
    $host = $_SERVER['HTTP_HOST'];
    $uri = "/Webdev/public_html/protected/view";
    $extra = 'admin.php';
    header("Location: http://$host$uri/$extra");
    exit;
}
?>
<html>
<head>
    <?php include '../../protected/view/parts/head.php'; ?>
</head>
<?php include '../../protected/view/parts/header.php'; ?>
<body>
    <div class="container">
        <!-- TODO: ImageGallery Overview (possibility to show / hide galleries)
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Gallery
                <span class="caret"></span></button>
            <ul id="imageGalleryDropdown" class="dropdown-menu">
                <?php
                $galeryNames = ImageGalleryController::getGalleryNames();
                foreach ($galeryNames as $name) { ?>
                    <li><a href="#"><?php echo $name ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Available images</h1>
            </div>
            <select multiple="multiple" class="image-picker show-html">
                <?php
                $images = ImageGalleryController::getImages();
                foreach ($images as $image) {
                    ?>
                    <option data-img-src="<?php $image['Image'] ?>"
                            value="<?php echo $image['ImageID'] ?>"><?php echo $image['Name'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

<!--                 <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive" src="http://placehold.it/400x300" alt="">
            </a>
        </div>-->
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include '../../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../../protected/view/parts/footer.php'; ?>
</html>



