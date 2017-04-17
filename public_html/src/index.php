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
$content = ContentController::getContentByPageName(basename(__FILE__, '.php'));
?>
<div class="outer col" data-placeholder-label="Header">
    <div class="mainSearchWrapper">
        <div class="heading"><h1><?php echo $content->getHeadline() ?></h1>
            <label><?php echo $content->getContent() ?></label></div>
        <div class="searchBox">
            <div id="searchbox_div">
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


