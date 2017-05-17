<?php
include __DIR__ . "/../../protected/entities/Book.php";
require_once __DIR__ . "/../../protected/controller/SessionController.php";

SessionController::validateAdminSession();
$book = unserialize($_GET["book"]);
?>

<html>
<head>
    <?php include __DIR__ . '/parts/head.php'; ?>
</head>
<?php include __DIR__ . '/parts/header.php'; ?>
<body>
<div class="container">
    <?php include __DIR__ . '/parts/breadcrumb.php';?>
    <div class="">
        <div class="">
            <div class="heading"><h1>SWD LIBRARY</h1>
            </div>
        </div>
        <div class="form-container container">
            <form action="../../../protected/action/updatebook.php" method="post">
                <h2>Update Book</h2>
                <div class="form-group">
                    <label for="ID">ID</label>
                    <input type="text" class="form-control" id="ID" name="ID" value="<?php echo $book->getId() ?>"
                           readonly>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="<?php echo $book->getTitle() ?>" maxlength="255" required>
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" id="author" name="author"
                           value="<?php echo $book->getAuthor() ?>" maxlength="255" required>
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo $book->getIsbn() ?>"
                           maxlength="10" required>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" id="category" name="category"
                           value="<?php echo $book->getCategory() ?>" maxlength="50">
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



