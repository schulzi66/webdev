$(document).ready(function () {
    var url = window.location;
    // Will only work if string in href matches with location
    $('ul.nav a[href="' + url + '"]').parent().addClass('active');

    // Will also work for relative and absolute hrefs
    $('ul.nav a').filter(function () {
        return this.href == url;
    }).parent().addClass('active').parent().parent().addClass('active');

    $('#imageGalleryDropdown a').on('click', function (e) {
        e.preventDefault();
        $('#imageSelectionWrapper').show();
    });

    // Initialize the image picker
    $("select").imagepicker({
        hide_select: false
    });
    // Retrieve the picker
    $("select").data('picker');
});

function sendSelectedValues() {
    var values = [];
    $('#imageGallerySelect :selected').each(function (i, selected) {
        values[i] = $(selected).val();
    });
    console.log(values);
    $.ajax({
        type: 'POST',
        url: '../protected/action/imagegallery.php?update-gallery=1', //TODO post URL
        data: values
    });
}

function updateVisibility(galleryID) {
    var current = $('input:radio[name=visibilityRadio_' + galleryID + ']:checked');
    var state = 0;
    if (current.attr('id') == 'visibilityShown') {
        state = 1;
        $.ajax({
            type: 'POST',
            url: '../protected/action/imagegallery.php?image-gallery-visiblity=' + galleryID,
            data: state
        });
    } else {
        state = 0;
        $.ajax({
            type: 'POST',
            url: '../protected/action/imagegallery.php?image-gallery-visiblity=' + galleryID,
            data: state
        });
    }
}
//TODO Never use alert in productive code
function validate() {
    if (document.forms["searchForm"]["bookTitle"].value === "" && document.forms["searchForm"]["bookAuthor"].value === "") {
        alert("Please fill either field with text for a valid search");
        return false;
    }
    return true;
}