<?php
session_start();
if ($_SESSION["admin"] != true){
    $host  = $_SERVER['HTTP_HOST'];
    $uri   ="/Webdev/public_html/protected/view";
    $extra = 'admin.php';
    header("Location: http://$host$uri/$extra");
    exit;
}

//var_dump($books);
?>
<html>
<head>
    <?php include '../../protected/view/parts/head.php'; ?>
</head>
<?php include '../../protected/view/parts/header.php'; ?>
<body>

<div class="container">
    <table class="table table-hover table-bordered">
        <tr>
            <td>
                MemberID
            </td>
            <td >
                Firstname
            </td>
            <td>
                Surname
            </td>
            <td>
                Address
            </td>
            <td>
                Phone
            </td>
            <td>
                Birth
            </td>
            <td>
                Gender
            </td>
            <td>
                Email
            </td>
            <td>
                <?php echo '<a href="../protected/action/membermanagement.php?member-add">Add new Member</a>'; ?>
            </td>
        </tr>
        <!-- Keep this at the end of the body tag to load the scripts at the right time -->
        <?php include '../../protected/view/parts/scripts.php'; ?>
</body>
<?php //include '../../protected/view/parts/footer.php'; ?>
</html>
<?php
require_once "../controller/MemberManagementController.php";
$members = MemberManagementController::getAllMembers();
foreach ($members as $member) {

    echo '<tr>';
    echo '<td>'.$member["0"].'</td>';
    echo '<td>'.$member["1"].'</td>';
    echo '<td>'.$member["2"].'</td>';
    echo '<td>'.$member["3"].'</td>';
    echo '<td>'.$member["4"].'</td>';
    echo '<td>'.$member["5"].'</td>';
    echo '<td>'.$member["6"].'</td>';
    echo '<td>'.$member["7"].'</td>';
    echo '<td><a href="../protected/action/membermanagement.php?member-update='. $member["0"] .'">Update</a></td>';
    echo '<td><a href="../protected/action/membermanagement.php?member-delete='. $member["0"] .'">Delete</a></td>';
    echo '</tr>';
}
echo '<tr>';
echo '</tr>';
echo '</table>';
echo '</div></br>';
$members = serialize($members);
$_SESSION["members"] = $members;
?>



