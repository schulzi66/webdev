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
        <div class="panel-heading">Book Loans</div>
        <table class="table table-hover table-bordered">
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Author</td>
                <td>ISBN</td>
                <td>Category</td>
                <td>Loaned By</td>
                <td>Taken Since</td>
                <td>Returned On</td>
                <td></td>
            </tr>

            <?php
            require_once "../controller/BookManagementController.php";
            require_once "../controller/MemberManagementController.php";
            require_once "../entities/Book.php";
            $books = BookManagementController::getAllBooks();
            if ($books != null) {
                foreach ($books as $book) {
                    $available = $book->getMemberId() == null;
                    echo '<tr>';
                    echo '<td>' . $book->getId() . '</td>';
                    echo '<td>' . $book->getTitle() . '</td>';
                    echo '<td>' . $book->getAuthor() . '</td>';
                    echo '<td>' . $book->getIsbn() . '</td>';
                    echo '<td>' . $book->getCategory() . '</td>';
                    if (!$available) {
                        $member = MemberManagementController::getMemberById($book->getMemberId());
                        echo '<td>' . $member->getFirstName() . ' ' . $member->getSurName() . '</td>';
                        echo '<td>' . $book->getTaken() . '</td>';
                        echo '<td> Not returned</td>';
                        echo '<td><a href="../protected/action/bookloans.php?book-return=' . $book->getId() . '">Return book</a></td>';
                    } else {
                        echo '<td> Available </td>';
                        echo '<td> Available </td>';
                        echo '<td>' . $book->getReturned() . '</td>';
                        echo '<td><a href="../protected/action/bookmanagement.php?book-loan=' . $book->getId() . '">Loan book</a></td>';
                    }
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



