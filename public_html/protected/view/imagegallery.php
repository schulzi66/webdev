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

<div id="<?php echo $galleryName ?>" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <?php
    $images = ImageGalleryController::getAllImages();

    for ($i = 0; $i < count($images); $i++) {
    ?>
        <ol class="carousel-indicators">
            <li data-target="#imagegallery" data-slide-to="<?php echo $counter ?>" id="indicator_ <?php echo $counter; ?>"></li>
        </ol>
    <?php
    }
    ?>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php
        for ($i = 0; $i < count($images); $i++) {
        ?>
        <!-- creates slides dynamically based on the images configured within the admin view -->
        <div class="item">
            <img src="<?php echo $images[$i].$imageName . $fileFormat ?>" alt="<?php $images['name'] ?>" id="<?php echo $i ?>">
        </div>
    </div>
<?php
}
?>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
