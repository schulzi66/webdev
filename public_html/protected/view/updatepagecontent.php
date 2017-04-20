<?php
include "../entities/PageContent.php";
require_once "../controller/SessionController.php";

SessionController::validateAdminSession();
$pageContent = unserialize($_GET["page-content"]);
?>

<html>
<head>
    <?php include '../../protected/view/parts/head.php'; ?>
</head>
<?php include '../../protected/view/parts/header.php'; ?>
<body>
<div class="container" data-placeholder-label="Header">
    <?php include '../../protected/view/parts/breadcrumb.php'; ?>
    <div class="">
        <div class="">
            <div class="heading"><h1>SWD LIBRARY</h1>
            </div>
        </div>
        <div class="form-container container">
            <form action="../protected/action/updatepagecontent.php" method="post">
                <h2>Update Content</h2>
                <div class="form-group">
                    <label for="ID">ID</label>
                    <input type="text" class="form-control" id="ID" name="ID"
                           value="<?php echo $pageContent->getPageId() ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="pageName">Pagename</label>
                    <input type="text" class="form-control" id="pageName" name="pageName"
                           value="<?php echo $pageContent->getPageName() ?>" maxlength="50" readonly>
                </div>
                <div class="form-group">
                    <label for="headline">Headline</label>
                    <input type="text" class="form-control" id="headline" name="headline"
                           value="<?php echo $pageContent->getHeadline() ?>" maxlength="255" required>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea title="content" class="form-control" name="content"
                              required><?php echo $pageContent->getContent() ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include '../../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../../protected/view/parts/footer.php'; ?>
</html>



