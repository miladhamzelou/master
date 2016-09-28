$(document).ready(function(){
    $('*[data-toggle=collapse]').click(function(){
        $(this).next('span').toggleClass('fa-angle-down').toggleClass('fa-angle-right');
    });
});