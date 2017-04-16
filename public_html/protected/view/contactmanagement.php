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
            require_once "../controller/ContactController.php";
            $contactRequests = ContactController::getAllContactRequests();
            foreach ($contactRequests as $request) {

                echo '<tr>';
                echo '<td>' . $request["0"] . '</td>';
                echo '<td>' . $request["1"] . '</td>';
                echo '<td>' . $request["2"] . '</td>';
                echo '<td>' . $request["3"] . '</td>';
                echo '<td>' . $request["4"] . '</td>';
                echo '<td>' . $request["5"] . '</td>';
                echo '<td><a href="../protected/action/contactmanagement.php?contact-reply=' . $request["0"] . '">Reply</a></td>';
                echo '</tr>';
            }
            echo '<tr>';
            echo '</tr>';
            echo '</table>';
            echo '</div></br>';
            ?>

            <!-- Keep this at the end of the body tag to load the scripts at the right time -->
            <?php include '../../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../../protected/view/parts/footer.php'; ?>
</html>

