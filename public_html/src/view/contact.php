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
<div class="container">
    <?php include '../../protected/view/parts/breadcrumb.php';?>
    <div class="">
        <div class="">
            <div class="heading"><h1><?php if (isset($content)) {echo $content->getHeadline();} ?></h1>
                <label><?php if (isset($content)) {echo $content->getContent();} ?></label>
            </div>

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
</div>
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include '../../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../../protected/view/parts/footer.php'; ?>
</html>
