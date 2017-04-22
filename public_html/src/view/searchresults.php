<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/webdev/public_html/protected/entities/Book.php";
require_once "$root/webdev/public_html/protected/controller/ImageGalleryController.php";
$books = unserialize($_GET["result-books"]);
$count = Count($books); ?>
<html>
<head>
    <?php include '../../protected/view/parts/head.php'; ?>
</head>
<?php include '../../protected/view/parts/header.php'; ?>
<body>
<!-- This page shows a view of all books returned in either the "Search library" search or the main page search-->
<div class="container">
<?php include '../../protected/view/parts/breadcrumb.php';?>
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo $count ?> results returned</div>
        <table class="table table-hover table-bordered">
            <tr>
                <td></td>
                <td>Title</td>
                <td>Author</td>
                <td>ISBN</td>
                <td>Category</td>
            </tr>

            <?php
            foreach ($books as $book) {
                $categories = explode(",", $book->getCategory());
                $image = ImageGalleryController::getImageById($book->getImageId());
                echo '<tr>';
                echo '<td class="align-center">'
                //TODO: So machen dass der das img-tag nur aufruft, wenn $image != null ist, sonst ruft der das 404 Bild auf
                    ?>
                    <img class="img-thumbnail" width="100" height="80" src="../src/img/<?php echo $image[0][2] ?>.jpg"
                         alt="<?php $image[0][2]; ?>">
                    <?php
                echo '</td>';
                echo '<td>' . $book->getTitle() . '</td>';
                echo '<td>' . $book->getAuthor() . '</td>';
                echo '<td>' . $book->getIsbn() . '</td>';
                echo '<td>';
                foreach ($categories as $category) {
                    echo $category . '</br>';
                }
                echo '</td>';
                echo '</tr>';
            }
            echo '<tr>';
            echo '</tr>';
            echo '</table>';
            echo '</div></br>';
            ?>

            <!-- Keep this at the end of the body tag to load the scripts at the right time -->
            <?php include '../../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../../protected/view/parts/footer.php'; ?>
</html>



