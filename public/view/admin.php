<?php
require_once __DIR__ . "/../../protected/controller/SessionController.php";
echo __DIR__;
SessionController::redirectAdmin();
?>
<html>
<head>
    <?php include __DIR__ . '/parts/head.php'; ?>
</head>
<?php include __DIR__ . '/parts/header.php'; ?>
<body>
<div class="container">
    <?php include __DIR__ . '/parts/breadcrumb.php'; ?>
    <div class="heading"><h1>SWD LIBRARY</h1>
    </div>
    <div class="form-container container">
        <form action="../../protected/action/admin.php" method="post">
            <h2>Admin Login</h2>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="userName" maxlength="50" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" maxlength="255" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>

<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include __DIR__ . '/parts/scripts.php'; ?>
</body>
<?php include __DIR__ . '/parts/footer.php'; ?>
</html>


