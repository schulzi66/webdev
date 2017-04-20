<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/webdev/public_html/protected/controller/ImageGalleryController.php";
require_once "$root/webdev/public_html/protected/entities/Gallery.php";
require_once "$root/webdev/public_html/protected/entities/GalleryImage.php";

$galleryID = ImageGalleryController::getGalleryIDByGalleryName($pageName);
?>
<?php
$imageIds = ImageGalleryController::getGalleryImageIdsByGalleryID($galleryID);
$images = ImageGalleryController::getImageNamesByImageIds($imageIds);
$fileFormat = ".jpg";
?>

<div id="slider_<?php echo $pageName; ?>" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <!-- Indicators -->
        <?php
        $counter = 0;
        if (isset($images)) {
        foreach ($images as $image) {
            $counter++;
            ?>

            <li data-target="#slider_<?php echo $pageName; ?>" data-slide-to="<?php echo $counter; ?>"
                id="indicator_ <?php echo $counter; ?>"></li>
            <?php
        } ?>
    </ol>
    <?php
    }
    ?>
    <!-- Wrapper for slides -->
    <div id="carousel-inner" class="carousel-inner" role="listbox">
        <?php
        if (isset($images)) {
            foreach ($images as $image) {
                ?>
                <!-- creates slides dynamically based on the images configured within the admin view -->
                <div class="item">
                    <img src="../../public_html/src/img/<?php echo $image . $fileFormat ?>"
                         alt="<?php echo $image; ?>">
                </div>
                <?php
            } ?>
            <?php
        }
        ?>
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#slider_ <?php echo $pageName; ?>" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#slider_<?php echo $pageName; ?>" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<?php
//TODO JUUL: prove that images load. has to to something with the slider
#foreach ($images as $image) {
    ?>
    <!-- creates slides dynamically based on the images configured within the admin view
    <img src="../../public_html/src/img/<?php #echo $image . $fileFormat ?>" alt="<?php #echo $image; ?>">-->
    <?php
#} ?>