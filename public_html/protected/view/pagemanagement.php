<?php
require_once "../controller/SessionController.php";

SessionController::validateAdminSession();
?>
<html>
<head>
    <?php include '../../protected/view/parts/head.php'; ?>
</head>
<?php include '../../protected/view/parts/header.php'; ?>
<body>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Page Management</div>
        <table class="table table-hover table-bordered">
            <tr>
                <td>PageID</td>
                <td>PageName</td>
            </tr>

            <?php
            require_once "../controller/ContentController.php";
            require_once "../entities/PageContent.php";
            $contents = ContentController::getAllPageContents();
            foreach ($contents as $content) {

                echo '<tr>';
                echo '<td>' . $content->getPageId() . '</td>';
                echo '<td>' . $content->getPageName() . '</td>';
                echo '<td><a href="../protected/action/pagemanagement.php?page-update=' . $content->getPageName() . '">Update</a></td>';
                echo '</tr>';
            }
            echo '<tr>';
            echo '</tr>';
            echo '</table>';
            echo '</div>';
            echo '</div></br>';
            ?>

            <!-- Keep this at the end of the body tag to load the scripts at the right time -->
            <?php include '../../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../../protected/view/parts/footer.php'; ?>
</html>




