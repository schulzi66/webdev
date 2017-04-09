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
        <form action="../action/admin.php" method="post">
            <div class="form-group">
                <fieldset class="fieldset">
                    <legend>Admin Login:</legend>
                    <p>
                        <label>User name:* </label>
                        <input type="text" name="userName" reguired/>
                    </p>
                    <p>
                        <label>Password:* </label>
                        <input type="password" name="password" required>
                    </p>
                    <p>
                        <input class="submit" value="Login" type="submit">
                    </p>
                </fieldset>
            </div>
        </form>
    </div>
</div>
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include '../../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../../protected/view/parts/footer.php'; ?>
</html>


