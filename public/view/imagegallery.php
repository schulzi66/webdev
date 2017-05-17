<?php
require_once __DIR__ . "/../../protected/controller/SessionController.php";

SessionController::validateAdminSession();
?>
<html>
<head>
    <?php include __DIR__ . '/parts/head.php'; ?>
</head>
<?php include __DIR__ . '/parts/header.php'; ?>
<body>
<div class="container">
    <?php include __DIR__ . '/parts/breadcrumb.php'; ?>
    <div class="panel panel-default">
        <div class="panel-heading">Available Galleries</div>
        <table class="table table-hover table-bordered">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Status</td>
                <td>Update Visibility</td>
            </tr>
            <?php
            require_once __DIR__ . "/../../protected/controller/ImageGalleryController.php";
            $galleries = ImageGalleryController::getAllGalleries();
            foreach ($galleries as $gallery) {
                echo '<tr>';
                echo '<td>' . $gallery["0"] . '</td>';
                echo '<td>' . $gallery["1"] . '</td>';
                if ($gallery["2"] == 0) {
                    echo '<td><label class="radio-inline"><input type="radio" name="visibilityRadio_' . $gallery["0"] . '" checked="checked">Hidden</label><label class="radio-inline"><input type="radio" id="visibilityShown" name="visibilityRadio_' . $gallery["0"] . '">Shown</label></td>';
                } else if ($gallery["2"] == 1) {
                    echo '<td><label class="radio-inline"><input type="radio" name="visibilityRadio_' . $gallery["0"] . '">Hidden</label><label class="radio-inline"><input type="radio" id="visibilityShown" name="visibilityRadio_' . $gallery["0"] . '" checked="checked">Shown</label></td>';
                }
                echo '<td><button class="btn btn-primary" onclick="updateVisibility(' . $gallery["0"] . ')" type="button">Update</button></td>';
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
                <li id="<?php echo $name[1] ?>"><a href=""><?php echo $name[0] ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <div id="imageSelectionWrapper" class="container" hidden>
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Available images</h2>
            </div>
            <button onclick="sendSelectedValues(getCookie('currentSlider'));" class="btn btn-primary btn-margin-bt">Add Selected Images to
                Gallery
            </button>
            <div class="picker">
                <select id="imageGallerySelect" multiple="multiple"
                        class="form-control image-picker show-html">
                    <?php
                    $images = ImageGalleryController::getImages();
                    if ($images != null) {
                        foreach ($images as $image) {
                            ?>
                            <option data-img-class="thumbnail-img"
                                    data-img-src="../../assets/img/<?php echo $image[2] . "." . $image[1] ?>"
                                    value="<?php echo $image[2] ?>"><?php echo $image[3] ?></option>
                        <?php }
                    }
                    echo '</select>'
                    ?>
            </div>
        </div>
    </div>
</div>
<!-- Keep this at the end of the body tag to load the scripts at the right time -->
<?php include __DIR__ . '/parts/scripts.php'; ?>
</body>
<?php //include '../../protected/view/parts/footer.php'; ?>
</html>



