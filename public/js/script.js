

$('#first_fieldset label').on('click', function(){
    $('#company_rating').val('');
    var star1 = $(this).prev('input').val();
    $('#company_rating').val(star1);
});

$('#second_fieldset label').on('click', function(){
    $('#service_rating').val('');
    var star2 = $(this).prev('input').val();
   $('#service_rating').val(star2);
});


$(".click-filter").click(function () {
    $("main").toggleClass("open-filter");
});
$(".close-filter").click(function () {
    $("main").removeClass("open-filter");
});

$('.main-category').click(function () {
    if($('#dim-form').length > 0){
        $("main").toggleClass("open-filter");
    }
});