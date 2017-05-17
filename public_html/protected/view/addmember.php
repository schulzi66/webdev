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
    <div class="">
        <div class="">
            <div class="heading"><h1>SWD LIBRARY</h1>
            </div>
        </div>
        <div class="form-container container">
            <form action="../protected/action/addmember.php" method="post">
                <h2>Add New Member</h2>
                <div class="form-group">
                    <label for="firstName">Firstname</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" maxlength="50"
                           pattern="[a-zA-Z]+" required>
                </div>
                <div class="form-group">
                    <label for="surName">Surname</label>
                    <input type="text" class="form-control" id="surName" name="surName" maxlength="50"
                           pattern="[a-zA-Z]+" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" maxlength="50" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" pattern="^[0-9\-\+\s\(\)]*$"
                           maxlength="50">
                </div>
                <div class="form-group">
                    <label for="birth">Birth</label>
                    <input type="date" class="form-control" id="birth" name="birth" pattern="\d{1,2}/\d{1,2}/\d{4">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" maxlength="50">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include '../../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../../protected/view/parts/footer.php'; ?>
</html>



