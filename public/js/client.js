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

/////////// price inputs

var priceResult;

$('.priceInputRange').on('input',function () {
    priceResult = $(this).val();
    $(this).parent().parent().parent().siblings().find('.priceInputValue span').text(priceResult);
});