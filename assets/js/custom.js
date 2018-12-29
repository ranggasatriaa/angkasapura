$(document).ready(function() {
    $(document).on('click','.nav-item',function(){
        $('.nav-item').removeClass('active');
        $(this).addClass('active');
        var color = $(this).attr('color');
        console.log(color);
        $('.sidebar').attr('data-color', color);
    })
});