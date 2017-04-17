<html>
<head>
    <?php include '../../protected/view/parts/head.php'; ?>
</head>
<?php include '../../protected/view/parts/header.php'; ?>
<body>
<?php
require_once "../../protected/controller/ContentController.php";
require_once "../../protected/entities/PageContent.php";
$content = ContentController::getContentByPageName(basename(__FILE__, '.php'));
?>
<div class="" data-placeholder-label="Header">
    <div class="">
        <div class="">
            <div class="heading"><h1><?php echo $content->getHeadline() ?></h1>
            </div>
        </div>
        <div class="form-container container">
            <label><?php echo $content->getContent() ?></label>
        </div>
    </div>
</div>
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include '../../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../../protected/view/parts/footer.php'; ?>
</html>
