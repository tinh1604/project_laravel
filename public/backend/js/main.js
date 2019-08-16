$(document).ready(function () {
    CKEDITOR.replace( 'description', {
        filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
        filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    } );

    $("#menu_news").click(function() {
        $("#list_news").toggle();
    });
    $("#menu_sp").click(function() {
        $("#list1").toggle();
    });


});
