<html>
<head>
    <?php include '../../protected/view/parts/head.php'; ?>
</head>
<?php include '../../protected/view/parts/header.php'; ?>
<body>
<?php
//TODO CLEAN UP
$pageName = basename(__FILE__, '.php');
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

require_once __DIR__ . "/../../protected/controller/ContentController.php";
require_once __DIR__ . "/../../protected/controller/ImageGalleryController.php";
require_once __DIR__ . "/../../protected/entities/PageContent.php";
$content = ContentController::getContentByPageName($pageName);
?>
<div class="container">
    <?php include '../../protected/view/parts/breadcrumb.php';

    $visibility = ImageGalleryController::getGalleryVisibilityByPageName($pageName);

    if (isset($visibility) && $visibility->getState() == 1) {
    ?>
    <div id="imageGalleryWrapper">
        <?php

        include '../../protected/view/parts/imagegallery.php';
        } ?>
    </div>
    <div class="heading contact"><h1><?php if (isset($content)) {
                echo $content->getHeadline();
            } ?></h1>
        <label><?php if (isset($content)) {
                echo $content->getContent();
            } ?></label>
    </div>

    <div class="form-container container">
        <form action="../protected/action/contact.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input title="name" type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="surname">Surname</label>
                <input title="surname" type="text" class="form-control" name="surname" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input title="email" type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea title="message" class="form-control" name="message" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include '../../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../../protected/view/parts/footer.php'; ?>
</html>
