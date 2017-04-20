<?php
require_once "../../protected/entities/Book.php";
require_once "../../protected/controller/ImageGalleryController.php";
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
                echo '<td>'
            ?>
            <img class="img-thumbnail" width="150" height="100" src="../src/img/books/<?php echo $image[0][2]?>.jpg" alt="<?php $image[0][2]; ?>">
            <?php
                echo '</td>';
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



