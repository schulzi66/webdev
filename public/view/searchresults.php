<?php
require_once __DIR__ . "/../../protected/entities/Book.php";
require_once __DIR__ . "/../../protected/controller/ImageGalleryController.php";
$books = unserialize($_GET["result-books"]);
$count = Count($books); ?>
<html>
<head>
    <?php include __DIR__ . '/parts/head.php'; ?>
</head>
<?php include __DIR__ . '/parts/header.php'; ?>
<body>
<!-- This page shows a view of all books returned in either the "Search library" search or the main page search-->
<div class="container">
<?php include __DIR__ . '/parts/breadcrumb.php';?>
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
                    ?>
                    <img class="img-thumbnail" width="100" height="80" src="../../assets/img/<?php echo $image[0][2] ?>.jpg"
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
            <?php include __DIR__ . '/parts/scripts.php'; ?>
</body>
<?php //include '../../protected/view/parts/footer.php'; ?>
</html>



