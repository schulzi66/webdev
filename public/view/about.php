<html>
<head>
    <?php include __DIR__ . '/parts/head.php'; ?>
</head>
<?php include __DIR__ . '/parts/header.php'; ?>
<body>
<?php
//global $pageName;
$pageName = basename(__FILE__, '.php');
//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once __DIR__ . "/../../protected/controller/ContentController.php";
require_once __DIR__ . "/../../protected/entities/PageContent.php";
require_once __DIR__ . "/../../protected/controller/ImageGalleryController.php";
$content = ContentController::getContentByPageName($pageName);
?>
<div class="container">
    <?php include __DIR__ . '/parts/breadcrumb.php';

    $visibility = ImageGalleryController::getGalleryVisibilityByPageName($pageName);

    if (isset($visibility) && $visibility->getState() == 1) {
    ?>
    <div id="imageGalleryWrapper">
        <?php

        include __DIR__ . '/parts/imagegallery.php';
        } ?>
    </div>
    <div class="heading about">
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
<?php include __DIR__ . '/parts/scripts.php'; ?>
</body>
<?php include __DIR__ . '/parts/footer.php'; ?>
</html>
