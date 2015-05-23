$(document).ready(function() {
    $(document).foundation();

    $('.row.grid').css('height', $('.row.grid').height());
    $(window).on('resize', function() {
        $('.row.grid').css('height', $('.row.grid').height());
    });
});