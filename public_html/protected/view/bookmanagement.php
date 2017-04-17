<?php
require_once "../controller/SessionController.php";

SessionController::validateAdminSession();
?>
<html>
<head>
    <?php include '../../protected/view/parts/head.php'; ?>
</head>
<?php include '../../protected/view/parts/header.php'; ?>
<body>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Book Management</div>
        <table class="table table-hover table-bordered">
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Author</td>
                <td>ISBN</td>
                <td>Category</td>
                <td>LoanId</td>
                <td><?php echo '<a href="../protected/action/bookmanagement.php?book-add">Add new Book</a>'; ?></td>
            </tr>

            <?php
            require_once "../controller/BookManagementController.php";
            require_once "../entities/Book.php";
            $books = BookManagementController::getAllBooks();
            if ($books != null) {
                foreach ($books as $book) {

                    echo '<tr>';
                    echo '<td>' . $book->getId() . '</td>';
                    echo '<td>' . $book->getTitle() . '</td>';
                    echo '<td>' . $book->getAuthor() . '</td>';
                    echo '<td>' . $book->getIsbn() . '</td>';
                    echo '<td>' . $book->getCategory() . '</td>';
                    echo '<td>' . $book->getLoanId() . '</td>';
                    echo '<td><a href="../protected/action/bookmanagement.php?book-update=' . $book->getId() . '">Update</a></td>';
                    echo '<td><a href="../protected/action/bookmanagement.php?book-delete=' . $book->getId() . '">Delete</a></td>';
                    echo '</tr>';
                }
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



