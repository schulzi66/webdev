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
        if (document.cookie.indexOf('slider') === 0) {
            deleteCookie("currentSlider")
        }
        $('#imageGalleryDropdown li').click(function () {
            var current = $(this).attr('id');
            setCookie("currentSlider", current);
            $('#imageSelectionWrapper').show();
        });
    });

    // Initialize the image picker
    $("select").imagepicker({
        hide_select: false
    });
    // Retrieve the picker
    $("select").data('picker');
});

function sendSelectedValues(id) {
    var values = [];
    $('#imageGallerySelect :selected').each(function (i, selected) {
        values[i] = $(selected).val();
    });
    $.ajax({
        type: 'POST',
        url: '../protected/action/imagegallery.php?update-gallery=' + id, //TODO post URL
        data: values,
        success: function (data) {
            if (data.success == true) { // if true (1)
                location.reload(); // then reload the page.(3)
            }
        }
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
            data: state,
            success: function (data) {
                if (data.success == true) { // if true (1)
                    location.reload(); // then reload the page.(3)
                }
            }
        });
    } else {
        state = 0;
        $.ajax({
            type: 'POST',
            url: '../protected/action/imagegallery.php?image-gallery-visiblity=' + galleryID,
            data: state,
            success: function (data) {
                if (data.success == true) { // if true (1)
                    location.reload(); // then reload the page.(3)
                }
            }
        });
    }
}

/*
 Cookie Functions
 */
function setCookie(name, value) {
    document.cookie = name + '=' + value + '; Path=/;';
}
function deleteCookie(name) {
    document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

//TODO Never use alert in productive code
function validate() {
    if (document.forms["searchForm"]["bookTitle"].value === "" && document.forms["searchForm"]["bookAuthor"].value === "") {
        alert("Please fill either field with text for a valid search");
        return false;
    }
    return true;
}