<?php
require_once "../../controller/ImageGalleryController.php";
require_once "../../entities/Gallery.php";
require_once "../../entities/GalleryImage.php";

$galleryID = ImageGalleryController::getGalleryIDByGalleryName(basename(__FILE__));
$images = ImageGalleryController::getGalleryImagesByGalleryID($galleryID);
$fileFormat = ".jpg";
?>

<div id="<?php echo basename(__FILE__) ?>" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <?php
    $counter = 0;
    if (isset($images)) {
        foreach ($images as $image) {
            $counter++;
            ?>
            <ol class="carousel-indicators">
                <li data-target="#imagegallery" data-slide-to="<?php echo $counter; ?>"
                    id="indicator_ <?php echo $counter; ?>"></li>
            </ol>
            <?php
        }
    }
    ?>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php
        $counter = 0;
        if (isset($images)) {
            foreach ($images as $image) {
                $counter++;
                ?>
                <!-- creates slides dynamically based on the images configured within the admin view -->
                <div class="item">
                    <img src="<?php echo $image->getImageID() . $fileFormat ?>" alt="<?php $image->getImageID(); ?>"
                         id="image_ <?php echo $image->getImageID(); ?>">
                </div>
                <?php
            }
        }
        ?>
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="<?php echo basename(__FILE__); ?>" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="<?php echo basename(__FILE__); ?>" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>