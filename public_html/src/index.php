<html>
<head>
    <?php include '../protected/view/head.php'; ?>
</head>
<?php include '../protected/view/header.php'; ?>
<body>
<div class="outer col" data-placeholder-label="Header">
    <div class="mainSearchWrapper">
        <div class="outer col">
            <div class="heading"><h1>SWD LIBRARY</h1>
            </div>
        </div>
        <div class="searchBox">
            <div id="searchbox_div">
                <input id="searchTextbox" name="searchtext" type="text">
                <input type="submit" id="searchBtn" onclick="alert(0);">
            </div>
        </div>
    </div>
</div>
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include '../protected/view/scripts.php'; ?>
</body>
</html>


