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

/////////////////////////// maps

let map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 40.1811, lng: 44.5136},
    zoom: 10
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
        if(coord['user'] == 'guest') {
            let check = JSON.parse(localStorage.getItem('coord'));
            lat = parseFloat(check['lat']);
            lng = parseFloat(check['lng']);
        }
        initMap(lat, lng, companies);
    });
});

////////////////////////////  filter: location, prices

let take = 5;
let offset = 0;
let sort = 'asc';

$(document).ready(function () {
    let check = JSON.parse(localStorage.getItem('coord'));
    if(!check){
        let arr = {};
        let user = 'guest';
        $.ajax({
            url: '/coord',
            type: 'post',
            data: {user:user}
        }).done(function (response) {
            let coord = JSON.parse(response);
            arr['lat'] = coord['lat'];
            arr['lng'] = coord['lng'];
            localStorage.setItem('coord',JSON.stringify(arr));
        });
    }
    localStorage.removeItem('filter');
});


$('.loc').click(function () {
    take = 5;
    offset = 0;
    let arr;
    if($(this).hasClass('active-button-filter')){
        $('.loc').removeClass('active-button-filter');
        arr = JSON.parse(localStorage.getItem('filter'));
        delete arr['loc'];
        localStorage.setItem('filter',JSON.stringify(arr));
    } else {
        $('.loc').removeClass('active-button-filter');
        $(this).addClass('active-button-filter');
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
        arr = JSON.parse(localStorage.getItem('filter'));
        if(arr){
            arr['loc'] = {start:start,end:end,coord:coord};
        } else {
            arr = {};
            arr['loc'] = {start:start,end:end,coord:coord};
        }
        localStorage.setItem('filter',JSON.stringify(arr));
    }
    sendAjax(arr);
});

$('.price-search').click(function () {
    take = 5;
    offset = 0;
    let arr;
    if($(this).hasClass('active-button-filter')){
        $('.price-search').removeClass('active-button-filter');
        arr = JSON.parse(localStorage.getItem('filter'));
        delete arr['price'];
        localStorage.setItem('filter',JSON.stringify(arr));
    } else {
        $('.price-search').removeClass('active-button-filter');
        $(this).addClass('active-button-filter');
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
        arr = JSON.parse(localStorage.getItem('filter'));
        if(arr){
            arr['price'] = {start:start,end:end};
        } else {
            arr = {};
            arr['price'] = {start:start,end:end};
        }
        localStorage.setItem('filter',JSON.stringify(arr));
    }
    sendAjax(arr);
});

$('.main-category').click(function () {
    take = 5;
    offset = 0;
    let arr;
    if($('.dim-form').length > 0){
        if($(this).data('child')) $("main").addClass("open-filter");
        else $("main").removeClass("open-filter");
        if($(this).find('.dim-active').length > 0) $("main").removeClass("open-filter");
    }
    if($(this).find('.bg-white').hasClass('dim-active')){
        $('.bg-white').removeClass('dim-active');
        arr = JSON.parse(localStorage.getItem('filter'));
        delete arr['id'];
        localStorage.setItem('filter',JSON.stringify(arr));
    } else {
        $('.bg-white').removeClass('dim-active');
        $(this).find('.bg-white').addClass('dim-active');
        let category_id = [];
        category_id.push($(this).find('.id-span').data('id'));
        arr = JSON.parse(localStorage.getItem('filter'));
        if(arr){
            arr['id'] = category_id;
        } else {
            arr = {};
            arr['id'] = category_id;
        }
        localStorage.setItem('filter',JSON.stringify(arr));
    }
    sendAjax(arr);
});

$('.filter-first-checkbox').on('change',function () {
    if($(this).is(':checked')){
        $(this).parent().parent().parent().find('.filter-checkbox').prop('checked',true);
    } else {
        $(this).parent().parent().parent().find('.filter-checkbox').prop('checked',false);
    }
});

$('.filter-checkbox, .filter-first-checkbox').on('change',function () {
    let arr;
    let checkboxes = [];
    $('.filter-checkbox').each(function () {
        if($(this).is(':checked')){
            checkboxes.push($(this).data('id'));
            if($(this).data('child') > 0){
                $(this).parent().parent().find('.grandChild').each(function () {
                    checkboxes.push($(this).data('id'));
                });
            }
        }
    });
    arr = JSON.parse(localStorage.getItem('filter'));
    if(arr){
        arr['id'] = checkboxes;
    } else {
        arr = {};
        arr['id'] = checkboxes;
    }
    localStorage.setItem('filter',JSON.stringify(arr));
    sendAjax(arr);
});

$('.sort-th').click(function () {
    let arr = JSON.parse(localStorage.getItem('filter'));
    if($(this).find('i').hasClass('fa-angle-down')){
        $(this).find('i').removeClass('fa-angle-down');
        $(this).find('i').addClass('fa-angle-up');
        sort = 'desc';
    } else {
        $(this).find('i').removeClass('fa-angle-up');
        $(this).find('i').addClass('fa-angle-down');
        sort = 'asc';
    }
    sendAjax(arr);
});

function sendAjax(arr) {
    let coord = JSON.parse(localStorage.getItem('coord'));
    $.ajax({
        url: '/filter',
        type: 'post',
        data: {arr:arr,coord:coord,sort:sort,take:take,offset:offset}
    }).done(function (response) {
        let companies = JSON.parse(response);
        appendCompanies(companies);
    });
    $('#see_more').show();
}

$('#see_more').click(function () {
    take += 5;
    offset += 5;
    let arr = JSON.parse(localStorage.getItem('filter'));
    sendAjax(arr);
});

function appendCompanies(companies) {
    $('#searchResults').empty();
    if(companies){
        for (let i = 0; i < companies.length; i++){
            $('#searchResults').append(`<tr>
                    <td class="pl-0">
                        <a href="/company/${companies[i]['slug']}"><img src="/images/company_images/${companies[i]['logo']}" alt="logo"></a>
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
                        < ${companies[i]['distance']} km
                    </td>
                    <td>
                        <ul class="list-unstyled chat-block">
                            <li class="d-flex align-items-center justify-content-start mb-2">
                                ${companies[i]['rev_count'] ? '<img src="images/home/Chat%20Bubble_100px.png" alt="Chat">' : ''}
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




