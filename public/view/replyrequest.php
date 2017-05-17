<?php
require_once __DIR__ . "/../controller/SessionController.php";
require_once __DIR__ . "/../entities/ContactRequest.php";

SessionController::validateAdminSession();
$request = unserialize($_GET["request"]);
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
            <form action="../protected/action/replyrequest.php" method="post">
                <h2>Reply to the Request</h2>
                <div class="form-group">
                    <label for="ID">Request ID</label>
                    <input title="ID" type="text" class="form-control" name="ID" value="<?php echo $request->getId() ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="from">From</label>
                    <input title="from" type="text" class="form-control" name="from"
                           value="<?php echo $request->getName() . " " . $request->getSurName() ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input title="from" type="text" class="form-control" name="email" value="<?php echo $request->getMail() ?>"
                           readonly>
                </div>
                <div class="form-group">
                    <label for="request">Request</label>
                    <textarea title="request" class="form-control" name="request"
                              readonly><?php echo $request->getMessage() ?></textarea>
                </div>
                <div class="form-group">
                    <label for="response">Response</label>
                    <textarea title="response" class="form-control" name="response" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Reply</button>
            </form>
        </div>
    </div>
</div>
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include '../../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../../protected/view/parts/footer.php'; ?>
</html>



