@extends('layouts.main_layout')
@section('content')
    <main class="home-page-main main position-relative">
        <div class="all-category">
            <div class="bg-dark-blue p-3 position-relative">
                <button class="entypo-cancel close-filter btn border-0 p-1 fs-26 position-absolute"></button>
                <div class="d-flex align-items-center justify-content-start mb-4">
                    <span class="fa fa-filter text-white fs-26"></span>
                    <p class="mb-0 ml-3 fs-26">Filter</p>
                </div>
                <p class="font-normal text-bold mb-4">Välj filter som passar din sökning</p>
            </div>
            <div class="p-3">
                @if($dimension > 2)
                    @foreach($categories as $category)
                        @if(count($category->children) > 0)
                        <form class="mt-2 mb-2" action="#" id="dim-form">
                            <label for="check-{{ $category->id }}" class="larg-check text-white mb-2 font-normal d-table w-100">
                                <span class="d-table-cell  align-middle fs-22">{{ $category->name }}</span>
                                <span class="d-table-cell align-middle w-20px">
                                    <input class="d-none" type="checkbox" id="check-{{ $category->id }}">
                                    <span class="entypo-check d-flex justify-content-center align-items-center"></span>
                                </span>
                            </label>
                            @foreach($category->children as $child)
                            <label for="check-{{ $child->id }}" class="text-white mb-2 font-normal w-100 d-block">
                            <span class="d-flex justify-content-between align-items-center w-100 fs-16">
                                {{ $child->name }}
                                <input type="checkbox" id="check-{{ $child->id }}">
                                <span class="entypo-check d-flex align-items-center justify-content-center"></span>
                            </span>
                                @foreach($child->children as $grandChild)
                                    <span class="d-block fs-12 pl-3">{{ $grandChild->name }}</span>
                                @endforeach
                            </label>
                            @endforeach
                        </form>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="bg-blue pt-5 pb-4">
            <div class="container wrapper">
                <div class="row">
                    <div class="col-md-3 d-flex align-items-center justify-content-end white-back">
                        @if($dimension != 1)
                        <a class="prev-page d-flex align-items-center text-white justify-content-center mr-5" href="{{ route('mainView',['parent'=>$categories[0]->parent]) }}">
                            <span class="back d-flex align-items-center justify-content-center mr-2">
                                  <span class="entypo-left-open-big position-relative fs-26 trans"></span>
                            </span>
                            <span class="ml-4">Bakåt</span>
                        </a>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-white text-center  pb-4">Välj branch och tjäst</h4>
                        <div class="row first-list m-height category-div">
                            @foreach($categories as $category)
                                <div class="col-md-3 my-col col-sm-6 w-50 pointer main-category" data-child="{{count($category->children) > 0}}">
                                    <div  class="bg-white trans pt-3 pb-3">
                                        @if(count($category->children) > 0 && $dimension < 3)
                                            <a href="{{ route('mainView',['id'=>$category->id]) }}">
                                        @endif
                                                <div class="d-flex align-items-center justify-content-center pl-2 pr-2 ">
                                                    <div  class="text-center">
                                                        <img src="/images/category_images/{{ $category->image }}" alt="Icon">
                                                        <span class="font-normal d-block pl-4 pr-4">{{ $category->name }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        @if($category->dimension_level == 1)
                                            <ul class="list-unstyled menu-list d-none mt-3">
                                                @foreach($category->children as $key => $child)
                                                    <li class="{{$key < 5 ? '' : 'hidden'}}">
                                                        @if(count($child->children) > 0)
                                                            <a class="text-orange d-block trans position-relative" href="{{ route('mainView',['id'=>$child->id]) }}">{{ $child->name }}</a>
                                                        @else
                                                            <a class="text-orange d-block trans position-relative" href="{{ route('mainView',['id'=>$category->id]) }}">{{ $child->name }}</a>
                                                        @endif
                                                    </li>
                                                @endforeach
                                                <li>
                                                    @if(count($category->children) > 4)
                                                        <a href="{{ route('mainView',['id'=>$category->id]) }}"><span class="fs-14 text-gray">Visa fler</span></a>
                                                    @endif
                                                </li>
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('content2')
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-md-6 pt-5">
                <h4 class="text-black mb-3">Avstånd</h4>
                <ul class="list-unstyled d-flex align-items-center justify-content-between flex-wrap list text-gray">
                    <li class="p-2 trans loc" data-loc="0">0-10km</li>
                    <li class="p-2 trans loc" data-loc="10">10-50km</li>
                    <li class="p-2 trans loc" data-loc="50">50-100km</li>
                    <li class="p-2 trans loc" data-loc="100">100+km</li>
                </ul>
            </div>
            <div class="col-xl-5 col-md-6 pt-5">
                <h4 class="text-black mb-3">Pris</h4>
                <ul class="list-unstyled d-flex align-items-center justify-content-between flex-wrap list text-gray">
                    <li class="p-2 trans price-search" data-price="0">0-200kr</li>
                    <li class="p-2 trans price-search" data-price="200">200-400kr</li>
                    <li class="p-2 trans price-search" data-price="400">400-600kr</li>
                    <li class="p-2 trans price-search" data-price="600">600+kr</li>
                </ul>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table mt-5 font-normal">
                <thead>
                <tr>
                    <th class="pl-0">Företag</th>
                    <th>Tjänst</th>
                    <th>Pris</th>
                    <th>
                        <div class="form-group mb-0 entypo-down-open position-relative">
                            <select class="form-control border-0">
                                <option value="audi" selected>Avstånd</option>
                                <option value="text">text</option>
                                <option value="text">text</option>
                                <option value="text">text</option>
                            </select>
                        </div>
                    </th>
                    <th>Omdömen</th>
                    <th>Länkar</th>
                </tr>
                </thead>
                <tbody id="searchResults">
                </tbody>
            </table>
        </div>
    </div>
</main>

{{--map modal--}}

<div id="mapModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                {{--<h4 class="modal-title">Modal Header</h4>--}}
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="map"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="setLocation" disabled>Set Your Location</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
