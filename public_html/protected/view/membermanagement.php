<?php
require_once __DIR__ . "/../controller/SessionController.php";

SessionController::validateAdminSession();
?>
<html>
<head>
    <?php include '../../protected/view/parts/head.php'; ?>
</head>
<?php include '../../protected/view/parts/header.php'; ?>
<body>

<div class="container">
    <?php include '../../protected/view/parts/breadcrumb.php'; ?>
    <div class="panel panel-default">
        <div class="panel-heading">Member Management</div>
        <table class="table table-hover table-bordered">
            <tr>
                <td>MemberID</td>
                <td>Firstname</td>
                <td>Surname</td>
                <td>Address</td>
                <td>Phone</td>
                <td>Birth</td>
                <td>Gender</td>
                <td>Email</td>
                <td><?php echo '<a href="../protected/action/membermanagement.php?member-add">Add new Member</a>'; ?></td>
            </tr>

            <?php
            require_once "../controller/MemberManagementController.php";
            require_once "../entities/Member.php";
            $members = MemberManagementController::getAllMembers();
            if ($members != null) {
                foreach ($members as $member) {

                    echo '<tr>';
                    echo '<td>' . $member->getMemberId() . '</td>';
                    echo '<td>' . $member->getFirstName() . '</td>';
                    echo '<td>' . $member->getSurName() . '</td>';
                    echo '<td>' . $member->getAddress() . '</td>';
                    echo '<td>' . $member->getPhone() . '</td>';
                    echo '<td>' . $member->getBirth() . '</td>';
                    echo '<td>' . $member->getGender() . '</td>';
                    echo '<td>' . $member->getEmail() . '</td>';
                    echo '<td><a href="../protected/action/membermanagement.php?member-update=' . $member->getMemberId() . '">Update</a></td>';
                    echo '<td><a href="../protected/action/membermanagement.php?member-delete=' . $member->getMemberId() . '">Delete</a></td>';
                    echo '</tr>';
                }
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



