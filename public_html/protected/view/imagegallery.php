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
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    </ol>

    <!-- Wrapper for slides -->
    <?php
    $images = ImageGalleryController::getAllImages();
    foreach ($images as $image) {
        ?>
        <div class="carousel-inner" role="listbox">
            <div class="item">
                <img src="<?php echo $imageName . $fileFormat ?>" alt="<?php $image['name']?>" >
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
