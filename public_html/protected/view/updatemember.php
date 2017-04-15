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
<div class="" data-placeholder-label="Header">
    <div class="">
        <div class="">
            <div class="heading"><h1>SWD LIBRARY</h1>
            </div>
        </div>
        <div class="form-container container">
            <form action="../protected/action/updatemember.php" method="post">
                <h2>Update Member</h2>
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" id="id" name="id" value="<?php echo $member->getMemberId()?>" readonly>
                </div>
                <div class="form-group">
                    <label for="firstName">Firstname</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $member->getFirstName()?>" required>
                </div>
                <div class="form-group">
                    <label for="surName">Surname</label>
                    <input type="text" class="form-control" id="surName" name="surName" value="<?php echo $member->getSurName()?>" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $member->getAddress()?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $member->getPhone()?>" >
                </div>
                <div class="form-group">
                    <label for="birth">Birth</label>
                    <input type="date" class="form-control" id="birth" name="birth" value="<?php echo $member->getBirth()?>" >
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" value="<?php echo $member->getGender()?>" >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $member->getEmail()?>" >
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



