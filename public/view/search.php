<html>
<head>
    <?php include __DIR__ . '/parts/head.php'; ?>
</head>
<?php include __DIR__ . '/parts/header.php'; ?>
<body>
<!-- This page shows two input fields for the title and the author of a book. There is also a checkbox
     that lets the user only search available books. Client-side validation is also performed.-->
<div class="container">
    <?php include __DIR__ . '/parts/breadcrumb.php';?>
    <div class="">
        <div class="">
            <div class="heading"><h1>SWD LIBRARY</h1>
            </div>
        </div>
        <div class="form-container container">
            <form name="searchForm" onsubmit="return validateSearchForm()" action="../../protected/action/search.php" method="post">
                <h2>Search our library</h2>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="searchBookTitle" name="bookTitle" minlength="3"
                           title="At least 3 characters required">
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" id="searchBookAuthor" name="bookAuthor" minlength="3"
                           title="At least 3 characters required">
                </div>
                <div class="form-group" id="searchErrorMessageWrapper">
                    <label class="checkbox-inline"><input type="checkbox" id="isAvailableCheckbox"
                                                          name="isAvailableCheckbox" value="on">Display available books
                        only</label>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
</div>
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include __DIR__ . '/parts/scripts.php'; ?>
</body>
<?php include __DIR__ . '/parts/footer.php'; ?>
</html>
