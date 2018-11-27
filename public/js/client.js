const header = document.querySelector('.open-block');
const menu = document.querySelector('.menu');
const openToggle = document.querySelector('.open-block .entypo-right-open-big');
const closeToggle = document.querySelector('.menu .entypo-left-open-big');

openToggle.addEventListener('click', function() {
    header.classList.add('expand-active');
    menu.classList.add('expand-active');
});

closeToggle.addEventListener('click', function() {
    header.classList.remove('expand-active');
    menu.classList.remove('expand-active');
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/////////////////// dashboard menu highlights

var url = $(location).attr('pathname');
url = url.split('/');
var x = url[2];
$('.'+x).addClass('active');


////////////////////// chart

var popCanvas = $("#popChart");

if(popCanvas.length > 0){
    var dataFirst = {
        label: "Moving",
        data: [0, 59, 75, 20, 20, 55, 40],
        lineTension: 0.5,
        backgroundColor: 'transparent',
        borderColor: 'red',
    };

    var dataSecond = {
        label: "Cleaning",
        data: [20, 15, 60, 60, 65, 30, 70],
        lineTension: 0.5,
        borderColor: 'blue',
        fill:true,
        backgroundColor: 'transparent',
    };

    var speedData = {
        labels: ["0s", "10s", "20s", "30s", "40s", "50s", "60s"],
        datasets: [dataFirst, dataSecond]
    };

    var lineChart = new Chart(popCanvas, {
        type: 'line',
        data: speedData,
        options: {
            maintainAspectRatio: false,
        }
    });
}

//validation

$(document).ready(function () {
    $.formUtils.loadModules('security.js');
    $.validate({
        modules: 'security',
    });
});


//////////////////////////// price inputs

let priceResult;

$('.priceInputRange').on('input',function () {
    priceResult = $(this).val();
    $(this).parent().parent().parent().siblings().find('.priceInputValue span').text(priceResult);
});



////////////////////////// category modal

$(document).ready(function () {
    $('.add-category').on('shown.bs.modal', function () {
        let dim = 1;
        let id = false;
        appendDimensions(dim,id);

});

function appendDimensions(dim,id){
    $.ajax({
        url: '/client/price_dim',
        type: 'post',
        data: {dim:dim,id:id}
    }).done(function (response) {
        let selector = '.list-group';
        selector = '#dimension_'+dim + ' ' + selector;
        $(selector).empty();
        let categories = JSON.parse(response);
        for(let i in categories){
            let child;
            child = (categories[i]['children'].length >= 1);
            $(selector).append('<li class="list-group-item pointer" data-id="'+categories[i]['id']+'" data-child="'+child+'" data-dimension="'+categories[i]['dimension_level']+'">'+categories[i]['name']+'<span><i class="fa fa-fw fa-arrow-right" aria-hidden="true"></i></span></li>');
        }
    });
}

$(document).on('click', '#dimensions_row .list-group li', function () {
        let id = $(this).data('id');
        let child = $(this).data('child');
        let dim = $(this).data('dimension')+1;
        if(child == false){
            $('#price_input').show();
            $('#price').focus();
        } else {
            appendDimensions(dim,id);
        }
    });
});

$(document).on('click', '.list-group-item', function(){
    let parent_id = $(this).parent().parent().parent().attr('id');
    parent_id = parseInt(parent_id.split('dimension_')[1]) + 1;
    $('.notification').empty();
    for(let i = parent_id; i <= 5; i++){
        let selector = '#dimension_'+i+' li';
        $(selector).remove();
        if($(this).data('child')){
            $('#price_input').hide();
        }
    }
    $(this).parent().find('li').removeClass('active-price-li');
    $(this).addClass('active-price-li');
});


let user_id;
$('.add_price_button').click(function () {
    user_id = $(this).data('id');
});

$('#add_button').click(function () {
    let price = $('#price').val();
    let id;
    $('.active-price-li').each(function(){
        if($(this).data('child') == false) id = $(this).data('id');
    });
    $.ajax({
        url: '/client/add_price',
        type: 'post',
        data: {id:id,price:price,user_id:user_id}
    }).done(function (response) {
        if(response == 'success'){
            $('.notification').text('Success');
            setTimeout(function () {
                $(".modal").modal("hide");
                location.reload();
            },1500);
        } else {
            $('.notification').text('Please enter a valid price.');
        }
    });
});

$('.edit_price_button').click(function () {
    let data_id = $(this).data('id');
    let price_val;
    $(this).parent().parent().parent().find('.price_input').each(function () {
        if($(this).data('id') === data_id){
            price_val = $(this).val();
        }
    });
    $.ajax({
        url: '/prices',
        type: 'post',
        data: {price_val:price_val,price_id:data_id}
    }).done(function(response){
        // console.log(response);
        if(response == 'success'){
            location.reload();
        }
    });
});