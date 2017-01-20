$(document).ready(function(){
    $('.btn-delete').click(function () {
        var idi= '#' + $(this).attr('data-toggle');
        $(idi).slideToggle(300);
        console.log(idi);
    });
});