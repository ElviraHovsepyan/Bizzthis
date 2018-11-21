
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

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

$('.main-category').click(function () {
    if(!$(this).data('child')){
        $('.bg-white').removeClass('dim-active');
        $(this).find('.bg-white').addClass('dim-active');
    }
});



/////////////////////////// maps


let map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 40.1811, lng: 44.5136},
    zoom: 15
});

let marker = new google.maps.Marker({
    position: {lat: 40.1811, lng: 44.5136},
    map: map,
    title:'Hello!',
    draggable: true,
    animation: google.maps.Animation.DROP,
});



function initMap(lat, lng, companies) {
    let uluru = {lat: lat, lng: lng};
    marker.setPosition(uluru);
    map.setCenter(uluru);
    marker.addListener('click', toggleBounce);
    let markers = [];

    let image = 'http://maps.google.com/mapfiles/ms/icons/blue.png';
    for(let i = 0; i < companies.length; i++){
        markers.push(new google.maps.Marker({
            position: {lat: parseFloat(companies[i]['lat']), lng: parseFloat(companies[i]['lng']) },
            map: map,
            icon: image,
        }));
        let infowindow = new google.maps.InfoWindow({
            content: companies[i]['company_name']
        });
        markers[i].addListener('click',()=>{
            infowindow.open(map, markers[i]);
        });
    }
}


marker.addListener('dragend', showCords);
let newLat;
let newLng;

function showCords() {
    newLat = marker.getPosition().lat();
    newLng = marker.getPosition().lng();
    $('#setLocation').removeAttr('disabled');
}

$('#setLocation').click(function () {
    $('#mapModal').modal('hide');
    $.ajax({
        url:'/setNewCords',
        type:'post',
        data:{newLat:newLat,newLng:newLng}
    }).done(function (response) {
        if(response === 'success') $('#mapModal').modal('hide');
        else {
            let check = JSON.parse(localStorage.getItem('coord'));
            check['lat'] = newLat;
            check['lng'] = newLng;
            localStorage.setItem('coord',JSON.stringify(check));
        }
    });
});

function toggleBounce() {
    if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
    } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
    }
}

$('#modalButton').click(function () {
    $.ajax({
        url: '/map',
        type: 'post'
    }).done(function (response) {
        $('#mapModal').modal('show');
        let coord = JSON.parse(response);
        let lat = parseFloat(coord['lat']);
        let lng = parseFloat(coord['lng']);
        let companies = coord['companies'];
        if(coord['user'] === 'guest') {
            let check = JSON.parse(localStorage.getItem('coord'));
            if(!check){
                let arr={};
                arr['lat'] = coord['lat'];
                arr['lng'] = coord['lng'];
                localStorage.setItem('coord',JSON.stringify(arr));
            } else {
                lat = parseFloat(check['lat']);
                lng = parseFloat(check['lng']);
            }
        }
        initMap(lat, lng, companies);
    });
});


$('.loc').click(function () {
    let coord = JSON.parse(localStorage.getItem('coord'));
    let start = $(this).data('loc');
    let end;
    switch (start){
        case 0:
            end = 10;
            break;
        case 10:
            end = 50;
            break;
        case 50:
            end = 100;
            break;
        case 100:
            end = null;
    }
    $.ajax({
        url: '/location',
        type: 'post',
        data: {start:start,end:end,coord:coord}
    }).done(function (response) {
        let companies = response;
        console.log(companies);
        appendCompanies(companies);
    });
});

function appendCompanies(companies) {
    $('#searchResults').empty();
    if(companies){
        for (let i = 0; i < companies.length; i++){
            $('#searchResults').append(`<tr>
                    <td class="pl-0">
                        <img src="/images/company_images/${companies[i]['logo']}" alt="logo">
                    </td>
                    <td>
                        <ul class="font-normal list-unstyled font-bold">
                            ${appendCategories(companies[i]['users']['prices'])}                         
                        </ul>
                    </td>
                    <td>
                        <ul class=" font-normal list-unstyled font-bold">
                            ${appendPrices(companies[i]['users']['prices'])}
                        </ul>
                    </td>
                    <td>
                        <3km
                    </td>
                    <td>
                        <ul class="list-unstyled chat-block">
                            <li class="d-flex align-items-center justify-content-start mb-2">
                                <img src="images/home/Chat%20Bubble_100px.png" alt="Chat">
                                <span class="pl-2">${companies[i]['rev_count'] ? companies[i]['rev_count'] : ''}</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-start mb-2">
                                <img src="images/home/Star_100px.png" alt="Star">
                                <span class="pl-2">${companies[i]['rating']}</span>
                            </li>
                        </ul>
                    </td>
                    <td>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <a class="d-flex align-items-center justify-content-left text-orange" href="http://bizz.loc/company/${companies[i]['slug']}">
                                    <img src="images/home/mobile.png" alt="imac">
                                    <span class="ml-2">Our page</span>
                                </a>
                            </li>
                            <li class="mb-3">
                                <a class="d-flex align-items-center justify-content-left text-orange" href="${companies[i]['website']}">
                                    <img src="images/home/desktop.png" alt="imac">
                                    <span class="ml-2">Our website</span>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
        `);
        }
    }
}

function appendCategories(comp) {
    let arr1 = '';
    for (let j = 0; j < comp.length; j++){
        arr1 +=`<li>${comp[j]['categories']['name']}</li>`;
    }
    return arr1;
}

function appendPrices(comp) {
    let arr2 = '';
    for (let j = 0; j < comp.length; j++){
        arr2 +=`<li>${comp[j]['price']} kr/tim</li>`;
    }
    return arr2;
}

$('.price-search').click(function () {
    let start = $(this).data('price');
    let end;
    switch (start){
        case 0:
            end = 200;
            break;
        case 200:
            end = 400;
            break;
        case 400:
            end = 600;
            break;
        case 600:
            end = null;
    }
    $.ajax({
        url: '/price-search',
        type: 'post',
        data: {start:start,end:end}
    }).done(function (response) {
        let companies = response;
        appendCompanies(companies);
    });
});


