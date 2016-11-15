$(document).ready(function(){
    // sidebar
    $('#sidebar a').removeClass('sidebar-active');
    $('.panel-collapse').removeClass('in');
    var href = $("meta[name=url]").attr('content');
    $("a[href='"+href+"']").addClass('sidebar-active').closest('div.panel').find('a[data-toggle="collapse"]').trigger('click');
    $("a[href='"+href+"']").closest('div.panel').find('span.fa-angle-right').toggleClass('fa-angle-right').toggleClass('fa-angle-down');
    $('*[data-toggle=collapse]').click(function(){
        $("*[data-toggle=collapse]").next('span').addClass('fa-angle-right').removeClass('fa-angle-down');
        $(this).next('span').toggleClass('fa-angle-down');
    });
    // end sidebar
    Admin.init();
});