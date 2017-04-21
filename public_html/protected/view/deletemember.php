<?php
include "../entities/Member.php";
require_once "../controller/SessionController.php";

SessionController::validateAdminSession();
$member = unserialize($_GET["member"]);
?>

<html>
<head>
    <?php include '../../protected/view/parts/head.php'; ?>
</head>
<?php include '../../protected/view/parts/header.php'; ?>
<body>
<div class="container">
    <?php include '../../protected/view/parts/breadcrumb.php'; ?>
    <div class="">
        <div class="">
            <div class="heading"><h1>SWD LIBRARY</h1>
            </div>
        </div>
        <div class="form-container container">
            <form action="../protected/action/deletemember.php" method="post">
                <h2>Delete Member</h2>
                <div class="form-group">
                    <label for="ID">ID</label>
                    <input type="text" class="form-control" id="ID" name="ID"
                           value="<?php echo $member->getMemberId() ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="firstName">Firstname</label>
                    <input type="text" class="form-control" id="firstName" name="firstName"
                           value="<?php echo $member->getFirstName() ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="surName">Surname</label>
                    <input type="text" class="form-control" id="surName" name="surName"
                           value="<?php echo $member->getSurName() ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address"
                           value="<?php echo $member->getAddress() ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                           value="<?php echo $member->getPhone() ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="birth">Birth</label>
                    <input type="text" class="form-control" id="birth" name="birth"
                           value="<?php echo $member->getBirth() ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender"
                           value="<?php echo $member->getGender() ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email"
                           value="<?php echo $member->getEmail() ?>" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Delete</button>
            </form>
        </div>
    </div>
</div>
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include '../../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../../protected/view/parts/footer.php'; ?>
</html>



