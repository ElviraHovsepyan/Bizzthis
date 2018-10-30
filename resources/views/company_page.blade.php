@extends('layouts.main_layout')
@section('content')
    <main class="page-main main font-normal">
        <div class="bg-gray pt-5 pb-4">
            <div class="container-fluid wrapper">
                <div class="row">
                    <div class="col-lg-1 col-md-2 mb-4">
                        <a class="prev-page d-flex align-items-center justify-content-center mr-2" href="#">
                        <span class="back d-flex align-items-center justify-content-center mr-2">
                              <span class="entypo-left-open-big position-relative fs-26 trans"></span>
                        </span>
                            <span class="ml-4">Bakat</span>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-7 mb-4">
                        <div class="row">
                            <div class="col-sm-2 mb-4">
                                <div class="d-flex align-items-center justify-content-center mt-85">
                                    <img class="star-img" src="../images/home/Star_100px.png" alt="star">
                                    <p class="mb-0 ml-2">{{ $rating }}<span class="text-light-gray"></span></p>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <h2 class="mb-5">
                                    <a class="page-logo" href="#">
                                        <img src="../images/page/logo.png" alt="logo">
                                    </a>
                                </h2>
                                <p class="pb-sm-3 pb-md-4 border-bottom d-inline-block"><span class="entypo-minus fs-18"></span>
                                    {{ $company->slogan }}</p>
                                <ul class="list-unstyled">
                                    <li class="mb-3">
                                        <a class="d-flex align-items-center justify-content-start" href="tel:0854068060">
                                            <img src="../images/page/blue-phone.png" alt="phone contact">
                                            <span class="ml-3">{{ $company->telephone }}</span>
                                        </a>
                                    </li>
                                    <li class="mb-3">
                                        <a class="d-flex align-items-center justify-content-start" href="mailto:kundtjanst@k-rauta.se">
                                            <img src="../images/page/message.png" alt="phone contact">
                                            <span class="ml-3">{{ $company->users['email'] }}</span>
                                        </a>
                                    </li>
                                    <li class="mb-3">
                                        <div class="d-flex align-items-center justify-content-start" href="tel:0854068060">
                                            <img src="../images/page/clock.png" alt="phone contact">
                                            <span class="ml-3">{{ $company->address }}</span>
                                        </div>
                                    </li>
                                    @if($company->website)
                                    <li class="mb-3">
                                        <a class="d-flex align-items-center justify-content-start" href="#">
                                            <img src="../images/page/desktop.png" alt="phone contact">
                                            <span class="ml-3">{{ $company->website }}</span>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-3 mb-4 d-flex align-items-center justify-content-lg-center">
                        <div>
                            <h4 class="font-bold mb-4">Tjanster vi erbjuder</h4>
                            <table class="border-0 info-table">
                                <thead>
                                <tr>
                                    <th>Bygg</th>
                                    <th>Pris</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Maleri</td>
                                    <td class="font-bold">105kr</td>
                                </tr>
                                <tr>
                                    <td>Elektriker</td>
                                    <td class="font-bold">199kr</td>
                                </tr>
                                <tr>
                                    <td>Snickare</td>
                                    <td class="font-bold">99kr</td>
                                </tr>
                                <tr>
                                    <td>Rormokare</td>
                                    <td class="font-bold">199kr</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container wrapper-small">
            <ul class="nav nav-tabs mt-5">
                <li class="nav-item">
                    <a href="#mrssages" class="nav-link trans d-flex align-items-center justify-content-center border-0 show active" data-toggle="tab" role="tab" aria-controls="lorem">
                        <span class="fa fa-commenting fs-22"></span>
                        <span class="font-bold ml-2">Omdomen</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#portfolio" class="trans nav-link d-flex align-items-center justify-content-center border-0" data-toggle="tab" role="tab" aria-controls="ipsum">
                        <span class="fa fa-image fs-22"></span>
                        <span class="font-bold ml-2">Portfolio
                    </span>
                    </a>
                </li>
            </ul>
@endsection
@section('content2')
            <div class="tab-content">
                <div class="tab-pane fade show active" id="mrssages" role="tabpanel">
                    <ul class="list-unstyled message-list pb-5">
                        @foreach($reviews as $review)
                            <li class="d-flex align-items-center mt-4">
                            <ul class="list-unstyled profile-info pr-2">
                                <li class="mb-2 pr-img">
                                    <img src="images/user_images/{{ $review->users['image'] }}" alt="profile img">
                                </li>
                                <li class="text-bold">{{ $review->users['name'] }}</li>
                                <li class="text-light-gray text-bold">{{ $review->created_at }}</li>
                            </ul>
                            <div class="message-content">
                                <ul class="list-unstyled d-flex align-items-center mb-3 flex-wrap">
                                    <li class="d-flex align-items-center mr-5 desk-25 mt-2">
                                        <div class="star-bord dib">
                                            <p class="star-blue" style="width:80%;"></p>
                                        </div>
                                        <span class="ml-2">Valdigt bra</span>
                                    </li>
                                    <li class="d-flex align-items-center mr-4  mt-2">
                                        <span class="mr-3">Om foretaget</span>
                                        <div class="star-bord dib">
                                            <p class="star-blue" style="width:{{ $review->company_rating * 2 }}0%;"></p>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center  mt-2">
                                        <span class="mr-3">Om tjansten</span>
                                        <div class="star-bord dib">
                                            <p class="star-blue" style="width:{{ $review->service_rating * 2 }}0%;"></p>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="list-unstyled border p-3">
                                    <li>{{ $review->text }}</li>
                                </ul>

                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @if(Auth::user())
                    <div class="bg-blue br-6 p-4 mt-md-4">
                        <form action="{{ route('addComments') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <textarea name="text" class="form-control border-0 br-6 no-resize p-3" placeholder="Skriv dinresension har."></textarea>
                            </div>
                            <input type="hidden" name="company_rating" id="company_rating">
                            <input type="hidden" name="service_rating" id="service_rating">
                            <input type="hidden" name="company_id" id="company_id" value="2">

                            <ul class="list-unstyled d-flex align-items-center justify-content-between flex-wrap">
                                <li class="mt-2 mb-2">
                                    <p class="mb-0 pl-4 pr-4 pt-3 pb-3 text-white border br-6 bg-blue">Ellen Hirscho</p>
                                </li>
                                <li class="mt-2 mb-2 d-flex align-items-center">
                                    <span class="mr-2 text-white font-bold">Om foretaget</span>
                                    <fieldset class="rating rating-first fs-20" id="first_fieldset">
                                        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                    </fieldset>
                                    <a href="#" class="info d-flex align-items-center justify-content-center entypo-info-circled"></a>
                                </li>
                                <li class="mt-2 mb-2 d-flex align-items-center">
                                    <span class="mr-2 text-white font-bold">Om tjansten</span>
                                    <fieldset class="rating rating-second fs-20" id="second_fieldset">
                                        <input type="radio" id="star10" name="rating2" value="5" /><label class = "full" for="star10" title="Awesome - 5 stars"></label>
                                        <input type="radio" id="star9" name="rating2" value="4" /><label class = "full" for="star9" title="Pretty good - 4 stars"></label>
                                        <input type="radio" id="star8" name="rating2" value="3" /><label class = "full" for="star8" title="Meh - 3 stars"></label>
                                        <input type="radio" id="star7" name="rating2" value="2" /><label class = "full" for="star7" title="Kinda bad - 2 stars"></label>
                                        <input type="radio" id="star6" name="rating2" value="1" /><label class = "full" for="star6" title="Sucks big time - 1 star"></label>
                                    </fieldset>
                                    <a href="#" class="info d-flex align-items-center justify-content-center entypo-info-circled"></a>
                                </li>
                                <li class="mt-2 mb-2">
                                    <button type="submit" class="btn btn-orange br-6 no-shadow text-white font-bold">Recensera!</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="portfolio" role="tabpanel">
                    <div class="form-row mt-5">
                        <div class="col-md-6 mb-4">
                            <div class="bg-gray p-3">
                                <div class="img-control">
                                    <img src="../images/page/img1.png" alt="portfolio">
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mt-3 mb-0 text-bold">Lorem ipsum dolor sit </p>
                                    <ul class="list-unstyled d-flex align-items-center justify-content-end mt-3">
                                        <li class="ml-2">
                                            <a href="#">
                                                <span class="fa fa-commenting text-light-gray fs-18 mr-2"></span>
                                                <span class="text-bold">432</span>
                                            </a>
                                        </li>
                                        <li class="ml-2">
                                            <a href="#">
                                                <span class="fa fa-heart text-light-gray fs-18 mr-2"></span>
                                                <span class="text-bold">432</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="bg-gray p-3">
                                <div class="img-control">
                                    <img src="../images/page/img2.png" alt="portfolio">
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mt-3 mb-0 text-bold">Lorem ipsum dolor sit </p>
                                    <ul class="list-unstyled d-flex align-items-center justify-content-end mt-3">
                                        <li class="ml-2">
                                            <a href="#">
                                                <span class="fa fa-commenting text-light-gray fs-18 mr-2"></span>
                                                <span class="text-bold">432</span>
                                            </a>
                                        </li>
                                        <li class="ml-2">
                                            <a href="#">
                                                <span class="fa fa-heart text-light-gray fs-18 mr-2"></span>
                                                <span class="text-bold">432</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="bg-gray p-3">
                                <div class="img-control">
                                    <img src="../images/page/img3.png" alt="portfolio">
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mt-3 mb-0 text-bold">Lorem ipsum dolor sit </p>
                                    <ul class="list-unstyled d-flex align-items-center justify-content-end mt-3">
                                        <li class="ml-2">
                                            <a href="#">
                                                <span class="fa fa-commenting text-light-gray fs-18 mr-2"></span>
                                                <span class="text-bold">432</span>
                                            </a>
                                        </li>
                                        <li class="ml-2">
                                            <a href="#">
                                                <span class="fa fa-heart text-light-gray fs-18 mr-2"></span>
                                                <span class="text-bold">432</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="bg-gray p-3">
                                <div class="img-control">
                                    <img src="../images/page/img4.png" alt="portfolio">
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mt-3 mb-0 text-bold">Lorem ipsum dolor sit </p>
                                    <ul class="list-unstyled d-flex align-items-center justify-content-end mt-3">
                                        <li class="ml-2">
                                            <a href="#">
                                                <span class="fa fa-commenting text-light-gray fs-18 mr-2"></span>
                                                <span class="text-bold">432</span>
                                            </a>
                                        </li>
                                        <li class="ml-2">
                                            <a href="#">
                                                <span class="fa fa-heart text-light-gray fs-18 mr-2"></span>
                                                <span class="text-bold">432</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
