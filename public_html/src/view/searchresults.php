<?php
require_once "../../protected/entities/Book.php";
require_once "../protected/controller/ImageGalleryController.php";
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
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo $count ?> results returned</div>
        <table class="table table-hover table-bordered">
            <tr>
                <td>Image</td>
                <td>Title</td>
                <td>Author</td>
                <td>ISBN</td>
                <td>Category</td>
            </tr>

            <?php
            foreach ($books as $book) {
               $image = ImageGalleryController::getImageById($book->getImageId());
                echo '<tr>';
                echo '<td>
                            <option data-img-class="thumbnail-img"
                            data-img-src="http://localhost:<?php echo $_SERVER['SERVER_PORT'] ?>/Webdev/public_html/src/img/gallery/<?php echo $image[2] . "." . $image[1] ?>"
                            value="<?php echo $image[2] ?>"><?php echo $image[3] ?></option>
                      </td>';
                echo '<td>' . $book->getTitle() . '</td>';
                echo '<td>' . $book->getAuthor() . '</td>';
                echo '<td>' . $book->getIsbn() . '</td>';
                echo '<td>' . $book->getCategory() . '</td>';
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



