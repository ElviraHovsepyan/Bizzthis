@extends('layouts.user_layout')
@section('content')
    <h5 class="font-bold fs-30 text-center text-gray mb-5">Kom igang</h5>
    <div class="row no-gutters">
        <div class="offset-lg-4 col-lg-4">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="form-group">
                    {{--<span class="d-none font-normal">text error</span>--}}
                    <input name="name" type="text" placeholder="Namn" class="form-control fs-18" data-validation="length" data-validation-length="min6">
                    <input name="role" type="hidden" value="user">
                </div>
                <div class="form-group">
                    <input name="email" type="email" placeholder="E-post" class="form-control fs-18" data-validation="email">
                </div>
                <div class="form-group">
                    <input name="password" type="password" placeholder="Losenord" class="form-control fs-18" data-validation="length" data-validation-length="min6">
                </div>
                <div class="d-flex align-items-center justify-content-between pt-3">
                    <a href="{{ route('password.request') }}" class="text-gray">Glomt losenordet?</a>
                    <button type="submit" class="trans btn btn-blue text-white d-flex align-items-center justify-content-between">
                        <span class="mr-2 font-bold">Kom igang</span>
                        <span class="entypo-right-open-big"></span>
                    </button>
                </div>
            </form>
        </div>
@endsection
