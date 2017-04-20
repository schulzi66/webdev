<?php
    //TODO JUUL: still raw format
?>
<ol class="breadcrumb">
    <?php
    $crumbs = explode("/", $_SERVER["REQUEST_URI"]);
    $root = "/webdev/public_html/src";
    $base = "/webdev/public_html/protected/view";
    $counter = 0;
    echo '<li class="breadcrumb-item">';
    echo '<a href="' . $root . '/index.php">';
    echo 'Home';
    echo '</a></li>';

    foreach ($crumbs as $crumb) {
        //TODO all: change this damn workaround
        $counter++;
        if ($counter >= 6) {
            if ($crumb == "") {
                $crumb = "Home";
            }
            echo '<li class="breadcrumb-item">';
            echo '<a href="' . $base . '/' . $crumb . '">';
            echo ucfirst(str_replace(array(".php", "_"), array("", " "), $crumb) . ' ');
            echo '</a></li>';
        }
    }
    ?>
</ol>