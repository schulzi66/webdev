<html>
<head>
    <?php include '../../protected/view/parts/head.php'; ?>
</head>
<?php include '../../protected/view/parts/header.php'; ?>
<body>
<?php
require_once "../../protected/controller/ContentController.php";
require_once "../../protected/entities/PageContent.php";
require_once "../../protected/controller/ImageGalleryController.php";
$content = ContentController::getContentByPageName(basename(__FILE__, '.php'));
?>
<div class="container" data-placeholder-label="Header">
    <?php include '../../protected/view/parts/breadcrumb.php';

    $visibility = ImageGalleryController::getGalleryVisibilityByPageName(basename(__FILE__, '.php'));

    if (isset($visibility) && $visibility->getState() == 1) {
        ?>
        <div id="imageGalleryWrapper">
    <?php
        include '../../protected/view/parts/imagegallery.php';
    } ?>
        </div>
    <div class="heading">
        <h1><?php if (isset($content)) {
                echo $content->getHeadline();
            } ?>
        </h1>
    </div>

    <div class="form-container container">
        <label><?php if (isset($content)) {
                echo $content->getContent();
            } ?>
        </label>
    </div>
</div>
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include '../../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../../protected/view/parts/footer.php'; ?>
</html>
