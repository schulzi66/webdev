<?php
?>
<ol class="breadcrumb">
    <?php
    $crumbs = explode("/", $_SERVER["REQUEST_URI"]);
    $root = $_COOKIE["path"] ."/index.php";
    //The base of each visible website is everything up to "view", since all display php files in this project are in view folders
    $base = substr($_SERVER["REQUEST_URI"],0,strrpos($_SERVER["REQUEST_URI"], "view/") + 4);
    echo '<li class="breadcrumb-item">';
    echo '<a href="' . $root . '">';
    echo 'Home';
    echo '</a></li>';
    //Any protected view has to be called from the dashboard, except for the dashboard itself.
    if($crumbs[3] == "protected" && end($crumbs) != "dashboard.php")
    {
        echo '<li class="breadcrumb-item">';
        echo '<a href="' . $base . '/dashboard.php">';
        echo 'Dashboard';
        echo '</a></li>';
    }
    echo '<li class="breadcrumb-item">';
    //Unrefreshable pages shall not be considered in the breadcrumbs, so the previous page will be the last to show.
    // This if else statement filters out all the unrefreshable pages.
    if(in_array("searchresults.php", $crumbs))
    {
        echo '<a href="' . $base . '/search.php">';
        echo ucfirst(str_replace(array(".php", "_"), array("", " "), 'search.php') . ' ');
    } else if(count(preg_grep("~book.php~", $crumbs))>0) {
        echo '<a href="' . $base . '/bookmanagement.php">';
        echo ucfirst(str_replace(array(".php", "_"), array("", " "), 'bookmanagement.php') . ' ');
    } else if (in_array("updatepagecontent.php", $crumbs)){
        echo '<a href="' . $base . '/pagemanagement.php">';
        echo ucfirst(str_replace(array(".php", "_"), array("", " "), 'pagemanagement.php') . ' ');
    } else if (count(preg_grep("~member.php~", $crumbs))>0) {
        echo '<a href="' . $base . '/membermanagement.php">';
        echo ucfirst(str_replace(array(".php", "_"), array("", " "), 'membermanagement.php') . ' ');
    } else if (in_array("replyrequest.php", $crumbs)) {
        echo '<a href="' . $base . '/contactmanagement.php">';
        echo ucfirst(str_replace(array(".php", "_"), array("", " "), 'contactmanagement.php') . ' ');
    }
    //If it is a refreshable page, it will be shown as the last breadcrumb
    else {
        echo '<a href="' . $base . '/' . end($crumbs) . '">';
        echo ucfirst(str_replace(array(".php", "_"), array("", " "), end($crumbs)) . ' ');
    }
    echo '</a></li>';
    ?>
</ol>