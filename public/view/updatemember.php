<?php
include __DIR__ . "/../../protected/entities/Member.php";
require_once __DIR__ . "/../../protected/controller/SessionController.php";

SessionController::validateAdminSession();
$member = unserialize($_GET["member"]);
?>

<html>
<head>
    <?php include __DIR__ . '/parts/head.php'; ?>
</head>
<?php include __DIR__ . '/parts/header.php'; ?>
<body>
<div class="container">
    <?php include __DIR__ . '/parts/breadcrumb.php'; ?>
    <div class="">
        <div class="">
            <div class="heading"><h1>SWD LIBRARY</h1>
            </div>
        </div>
        <div class="form-container container">
            <form action="../../../protected/action/updatemember.php" method="post">
                <h2>Update Member</h2>
                <div class="form-group">
                    <label for="ID">ID</label>
                    <input type="text" class="form-control" id="ID" name="ID"
                           value="<?php echo $member->getMemberId() ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="firstName">Firstname</label>
                    <input type="text" class="form-control" id="firstName" name="firstName"
                           value="<?php echo $member->getFirstName() ?>" maxlength="50" pattern="[a-zA-Z]+" required>
                </div>
                <div class="form-group">
                    <label for="surName">Surname</label>
                    <input type="text" class="form-control" id="surName" name="surName"
                           value="<?php echo $member->getSurName() ?>" maxlength="50" pattern="[a-zA-Z]+" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address"
                           value="<?php echo $member->getAddress() ?>" maxlength="50" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                           value="<?php echo $member->getPhone() ?>" pattern="^[0-9\-\+\s\(\)]*$" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="birth">Birth</label>
                    <input type="date" class="form-control" id="birth" name="birth"
                           value="<?php echo $member->getBirth() ?>" pattern="\d{1,2}/\d{1,2}/\d{4">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender"
                           value="<?php echo $member->getGender() ?>" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="<?php echo $member->getEmail() ?>" maxlength="50">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include __DIR__ . '/parts/scripts.php'; ?>
</body>
<?php include __DIR__ . '/parts/footer.php'; ?>
</html>



