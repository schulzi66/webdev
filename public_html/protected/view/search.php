<html>
<head>
    <?php include '../../protected/view/parts/head.php'; ?>
</head>
<?php include '../../protected/view/parts/header.php'; ?>
<body>
<div class="" data-placeholder-label="Header">
    <div class="">
        <div class="">
            <div class="heading"><h1>SWD LIBRARY</h1>
            </div>
        </div>
        <div class="form-container container">
            <form name="searchForm" onsubmit="return validate()" action="../protected/action/search.php" method="post">
                <h2>Search our library</h2>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="bookTitle">
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" id="author" name="bookAuthor">
                </div>
                <div class="form-group">
                    <label for="notLoaned">Only available books</label>
                    <input type="checkbox" class="form-control" id="notLoaned" name="notLoaned" value="on">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
                </form>
        </div>
    </div>
</div>
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include '../../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../../protected/view/parts/footer.php'; ?>
</html>
