<html>
<head>
    <?php include '../protected/view/parts/head.php'; ?>
</head>
<?php include '../protected/view/parts/header.php'; ?>
<body>
<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/webdev/public_html/protected/controller/ContentController.php";
require_once "$root/webdev/public_html/protected/entities/PageContent.php";
require_once "$root/webdev/public_html/protected/controller/ImageGalleryController.php";
$content = ContentController::getContentByPageName(basename(__FILE__, '.php'));
?>
<div class="outer col" data-placeholder-label="Header">

    <?php
    $visibility = ImageGalleryController::getGalleryVisibilityByPageName($pageName);

    if (isset($visibility) && $visibility->getState() == 1) {
    ?>
    <div id="imageGalleryWrapper">
        <?php

        include "$root/webdev/public_html/protected/view/parts/imagegallery.php";
        } ?>
    </div>

    <div class="mainSearchWrapper">
        <div class="heading"><h1><?php if (isset($content)) {
                    echo $content->getHeadline();
                } ?></h1>
            <label><?php if (isset($content)) {
                    echo $content->getContent();
                } ?></label></div>
        <div class="searchBox">
            <div id="searchbox_div">
                <!-- Form for searching both the title and author of books to the given string-->
                <form name="searchForm" action="../protected/action/indexsearch.php" method="post">
                    <input id="searchTextbox" name="searchText" type="text" minlength="3"
                           title="At least 3 characters required" required/>
                    <input type="submit" id="searchBtn"/>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include '../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../protected/view/parts/footer.php'; ?>
</html>


