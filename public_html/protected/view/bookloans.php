<?php
require_once "../controller/SessionController.php";
require_once "../controller/MemberManagementController.php";
require_once "../controller/BookManagementController.php";
require_once "../entities/Book.php";

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
                        echo '<td><button class="btn btn-primary" data-toggle="modal" data-target="#returnModal" onclick="setCookie(\'bookID\', ' . $book->getId() . ')">Return Book</button></td>';
                    } else {
                        echo '<td> Available </td>';
                        echo '<td> Available </td>';
                        echo '<td>' . $book->getReturned() . '</td>';
                        echo '<td><button class="btn btn-primary" data-toggle="modal" data-target="#loanModal" onclick="setCookie(\'bookID\', ' . $book->getId() . ')">Loan Book</button></td>';
                    }
                    echo '</tr>';
                }
            }
            echo '<tr>';
            echo '</tr>';
            echo '</table>';
            echo '</div></br>';
            ?>

            <!-- Return Modal -->
            <div class="modal fade" id="returnModal" tabindex="-1" role="dialog" aria-labelledby="returnModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="returnModalLabel">Return Book</h4>

                        </div>
                        <div class="modal-body">
                            <label for="returnDateInput">Return Date</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="returnDate" id="returnDateInput"
                                           readonly="readonly" class="form-control clsDatePicker" required> <span
                                            class="input-group-addon"><i id="calIconTourDateDetails"
                                                                         class="glyphicon glyphicon-th"></i></span>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" onclick="returnBook(getCookie('bookID'), getDatepickerValue('#returnDateInput'))">
                                    Submit
                                </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>

            <!-- Loan Modal -->
            <div class="modal fade" id="loanModal" tabindex="-1" role="dialog" aria-labelledby="loanModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="loanModalLabel">Loan Book</h4>
                        </div>
                        <div class="modal-body">
                            <label for="memberDropdown">Member</label>
                            <div class="form-group">
                                <select class="form-control" id="memberDropdown">
                                    <?php
                                    $members = MemberManagementController::getAllMembers();
                                        echo '<option disabled selected >Please select a Member</option>';
                                    foreach ($members as $member) {
                                        echo '<option id="memberID_' . $member->getMemberId() . '" >' . $member->getFirstName() . ' ' . $member->getSurName() . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <label for="loanDateInput">Loan Date</label>
                            <div class="input-group">
                                <input type="text" name="loanDate" id="loanDateInput"
                                       readonly="readonly" class="form-control clsDatePicker" required> <span
                                        class="input-group-addon"><i id="calIconTourDateDetails"
                                                                     class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" onclick="loanBook(getCookie('bookID'), getID())">
                                Submit
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
    </div>
    <!-- Keep this at the end of the body tag to load the scripts at the right time -->
    <?php include '../../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../../protected/view/parts/footer.php'; ?>
</html>



