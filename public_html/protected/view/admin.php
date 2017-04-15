<?php
//TODO MASC remove. only testing purposes;
//Remove to delete session
//session_start();
//$_SESSION["admin"] = false;
require_once "../controller/SessionController.php";

SessionController::redirectAdmin();
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
            <form action="../protected/action/admin.php" method="post">
                <h2>Admin Login</h2>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="userName" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
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


