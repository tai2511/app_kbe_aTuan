$(document).ready(function() {
    $('.posts').click(function(e) {
        e.preventDefault();
        $(this).next('.sub_menu').toggle('slow');
    });
});
