$(document).ready(function () {
    var url = window.location;
    // Will only work if string in href matches with location
    $('ul.nav a[href="' + url + '"]').parent().addClass('active');

    // Will also work for relative and absolute hrefs
    $('ul.nav a').filter(function () {
        return this.href === url;
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

    $('#returnDateInput').datepicker({
        dateFormat: 'dd-mm-yy',
        minDate: '+0d',
        changeMonth: true,
        changeYear: true
    });

    $('#loanDateInput').datepicker({
        dateFormat: 'dd-mm-yy',
        minDate: '+0d',
        maxDate: '+0d',
        changeMonth: true,
        changeYear: true
    });

    /*
     Handles issues while changing months and years
     */
    var enforceModalFocusFn = $.fn.modal.Constructor.prototype.enforceFocus;
    $.fn.modal.Constructor.prototype.enforceFocus = function () {
    };
    try {
        $confModal.on('hidden', function () {
            $.fn.modal.Constructor.prototype.enforceFocus = enforceModalFocusFn;
        });
        $confModal.modal({backdrop: false});
    }
    catch (error) {
        if (error.name != 'ReferenceError')
            throw error;
    }

});

/**
 * Ajax call to send selected image values for further processing
 * @param galleryID
 */
//TODO: error handling
function sendSelectedValues(galleryID) {
    var values = [];
    $('#imageGallerySelect :selected').each(function (i, selected) {
        values[i] = $(selected).val();
    });
    values = JSON.stringify(values);
    $.ajax({
        type: 'GET',
        url: '../protected/action/imagegallery.php?update-gallery=' + galleryID + '&values=' + values,
        success: function () {
            console.log("success");
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
        }
    });
}

/**
 * Ajax call to send the visibility state of the gallery specified by galleryID
 * @param galleryID
 */
//TODO: error handling
function updateVisibility(galleryID) {
    var current = $('input:radio[name=visibilityRadio_' + galleryID + ']:checked');
    var state = false;
    if (current.attr('id') == 'visibilityShown') {
        state = true;
        $.ajax({
            type: 'GET',
            url: '../protected/action/imagegallery.php?image-gallery-visibility=' + galleryID + '&state=' + state,
            success: function () {
                console.log("success");
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus);
                alert("Error: " + errorThrown);
            }
        });
    } else {
        state = false;
        $.ajax({
            type: 'GET',
            url: '../protected/action/imagegallery.php?image-gallery-visibility=' + galleryID + '&state=' + state,
            success: function () {
                console.log("success");
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus);
                alert("Error: " + errorThrown);
            }
        });
    }
}

function returnBook(bookID) {
    $.ajax({
        type: 'GET',
        url: '../protected/action/bookloans.php?book-return=' + bookID,
        success: function () {
            console.log("success");
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
        }
    });
}

function loanBook(bookID, memberID) {
    $.ajax({
        type: 'GET',
        url: '../protected/action/bookloans.php?book-loan=' + bookID + '&memberID=' + memberID,
        success: function () {
            console.log("success");
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
        }
    });
}

/**
 * Function to specify a cookie
 * @param name
 * @param value
 */
function setCookie(name, value) {
    if (document.cookie.valueOf(name)) {
        deleteCookie(name);
    }
    document.cookie = name + '=' + value + '; Path=/;';
}

/**
 * Function to delete a cookie
 * @param name
 */
function deleteCookie(name) {
    document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

/**
 * Function to get a cookie
 * @param cname
 * @returns {*}
 */
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


function getID() {
    var ID = document.getElementById("memberDropdown").options[document.getElementById("memberDropdown").selectedIndex].id;
    $("#memberDropdown").change(function () {
        ID = document.getElementById("memberDropdown").options[document.getElementById("memberDropdown").selectedIndex].id;
    });
    return ID;
}
/**
 * Validation for forms
 * @returns {boolean}
 */
function validateSearchForm() {
    if ($('#searchBookTitle').val() === "" && $('#searchBookAuthor').val() === "") {
        if ($('#searchValidationErrorMessage').length === 0) {
            $('#searchErrorMessageWrapper').append("<div id='searchValidationErrorMessage' class='alert alert-warning'>Please fill at least one search field. </div>");
        }
        return false;
    }
    return true;
}