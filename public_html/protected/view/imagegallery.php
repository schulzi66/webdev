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
        <div class="panel-heading">Available Galleries</div>
        <table class="table table-hover table-bordered">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Number Of Images</td>
                <td>Status</td>
                <td>Update</td>
            </tr>
            <?php
            require_once "../controller/ImageGalleryController.php";
            $galleries = ImageGalleryController::getAllGalleries();
            foreach ($galleries as $gallery) {
                echo '<tr>';
                echo '<td>' . $gallery["0"] . '</td>';
                echo '<td>' . $gallery["1"] . '</td>';
                echo '<td>' . $gallery["2"] . '</td>';
                echo '<td><label class="radio-inline"><input type="radio" name="optradio" checked="checked">Hidden</label><label class="radio-inline"><input type="radio" name="optradio">Shown</label></td>';
                echo '<td><button class="btn btn-primary" type="button">Update</button></td>';
                echo '</tr>';
            }
            echo '<tr>';
            echo '</tr>';
            ?>
        </table>
    </div>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Gallery
            <span class="caret"></span></button>
        <ul id="imageGalleryDropdown" class="dropdown-menu">
            <?php
            $galleryNames = ImageGalleryController::getGalleryNames();
            foreach ($galleryNames as $name) { ?>
                <li><a href=""><?php echo $name[0] ?></a></li>
            <?php } ?>
        </ul>
    </div>

    <div id="imageSelectionWrapper" class="container" hidden>
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Available images</h2>
            </div>

            <div class="picker">
                <select id="imageGallerySelect" multiple="multiple" data-limit='5' class="form-control image-picker show-html"
                        id="imageGallerySelect">
                    <?php
                    $images = ImageGalleryController::getImages();
                    foreach ($images as $image) {
                        ?>
                        <option data-img-class="thumbnail-img" data-img-src="http://localhost:<?php echo $_SERVER['SERVER_PORT'] ?>/Webdev/public_html/src/img/gallery/<?php echo $image[2] . "." . $image[1] ?>"
                                value="<?php echo $image[0] ?>"><?php echo $image[3] ?></option>
                    <?php }
                    echo '</select>' ?>
            </div>
        </div>
        <button onclick="sendSelectedValues();" " class="btn btn-primary">Add Selected Images to Gallery</button>
    </div>
</div>
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include '../../protected/view/parts/scripts.php'; ?>
</body>
<?php include '../../protected/view/parts/footer.php'; ?>
</html>



