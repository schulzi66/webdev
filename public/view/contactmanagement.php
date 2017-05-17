<?php
require_once __DIR__ . "/../../protected/controller/SessionController.php";

SessionController::validateAdminSession();
?>
<html>
<head>
    <?php include __DIR__ . '/parts/head.php'; ?>
</head>
<?php include __DIR__ . '/parts/header.php'; ?>
<body>

<div class="container">
    <?php include __DIR__ . '/parts/breadcrumb.php'; ?>
    <div class="panel panel-default">
        <div class="panel-heading">Contact Requests</div>
        <table class="table table-hover table-bordered">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Surname</td>
                <td>Email</td>
                <td>Message</td>
                <td>Replied</td>
            </tr>

            <?php
            require_once __DIR__ . "/../../protected/controller/ContactController.php";
            require_once __DIR__ . "/../../protected/entities/ContactRequest.php";
            $contactRequests = ContactController::getAllContactRequests();
            if ($contactRequests != null) {
                foreach ($contactRequests as $request) {

                    echo '<tr>';
                    echo '<td>' . $request->getId() . '</td>';
                    echo '<td>' . $request->getName() . '</td>';
                    echo '<td>' . $request->getSurName() . '</td>';
                    echo '<td>' . $request->getMail() . '</td>';
                    echo '<td>' . $request->getMessage() . '</td>';
                    echo '<td>' . $request->getReplied() . '</td>';
                    echo '<td><a href="../../protected/action/contactmanagement.php?contact-reply=' . $request->getId() . '">Reply</a></td>';
                    echo '</tr>';
                }
            }
            echo '<tr>';
            echo '</tr>';
            echo '</table>';
            echo '</div></br>';
            ?>

            <!-- Keep this at the end of the body tag to load the scripts at the right time -->
            <?php include __DIR__ . '/parts/scripts.php'; ?>
</body>
<?php include __DIR__ . '/parts/footer.php'; ?>
</html>

