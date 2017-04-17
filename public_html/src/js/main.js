$(document).ready(function () {
    var url = window.location;
    // Will only work if string in href matches with location
    $('ul.nav a[href="' + url + '"]').parent().addClass('active');

    // Will also work for relative and absolute hrefs
    $('ul.nav a').filter(function () {
        return this.href == url;
    }).parent().addClass('active').parent().parent().addClass('active');


    /*$('#imageGalleryDropdown').on('change', function () {
        if (this.value == '1') {
            alert("test");
        }
    });*/

    $('#imageGalleryDropdown a').on('click', function(e){
        e.preventDefault();
        $('#imageSelectionWrapper').show();
    });

// Initialize the object
    $("select").imagepicker({
        hide_select : false
    })
    // Retrieve the picker
    $("select").data('picker');


});
//TODO Never use alert in productive code
function validate() {
    if (document.forms["searchForm"]["bookTitle"].value === "" && document.forms["searchForm"]["bookAuthor"].value === "") {
        alert("Please fill either field with text for a valid search");
        return false;
    }
    return true;
}