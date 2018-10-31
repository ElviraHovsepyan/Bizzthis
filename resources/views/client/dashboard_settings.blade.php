@extends('layouts.dashboard_layout')
@section('content')
    <div class="bg-white p-3 mb-3">
        <h4>Settings</h4>
        <p class="mb-5">Here you can update your settings such as company name, VAT & adress</p>
        <h4 class="border-bottom pb-4">Foretagsinformation</h4>

        <form class="mt-5 mb-5" action="{{ route('editCompany') }}" method="post" id="dash-form">
            @csrf
            <div class="row">
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="input1">Bolagsnamn</label>
                    <input name="company_name" value="{{ $company->company_name }}" type="text" id="input1" class="br-0 p-3 form-control" data-validation="length" data-validation-length="min3">
                    <p>
                        @if(!empty($warning))
                            {{ $warning->first('company_name') }}
                        @endif
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="input2">Org.nummer</label>
                    <input name="company_number" value="{{ $company->company_number }}" type="text" id="input2" class="br-0 p-3 form-control" data-validation="number">
                    <p>
                        @if(!empty($warning))
                            {{ $warning->first('company_number') }}
                        @endif
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="input3">Momsregistrarings nummer</label>
                    <input name="vat" value="{{ $company->vat }}" type="text" id="input3" class="br-0 p-3 form-control">
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="input4">Adress</label>
                    <input name="address" value="{{ $company->address }}" type="text" id="input4" class="br-0 p-3 form-control">
                    <p>
                        @if(!empty($warning))
                            {{ $warning->first('address') }}
                        @endif
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="input5">Postnummer</label>
                    <input name="post_code" value="{{ $company->post_code }}" type="text" id="input5" class="br-0 p-3 form-control">
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="input6">Postort</label>
                    <input name="cart"  value="{{ $company->cart }}" type="text" id="input6" class="br-0 p-3 form-control">
                </div>
            </div>
        <h4 class="border-bottom pb-4 pt-5">Kontakt Person</h4>
            <div class="row">
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="input9">Fornamn</label>
                    <input name="name" value="{{ $company->users['name'] }}" type="text" id="input9" class="br-0 p-3 form-control" data-validation="length" data-validation-length="min3">
                    <p>
                        @if(!empty($warning))
                            {{ $warning->first('name') }}
                        @endif
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="input10">Efternamn</label>
                    <input name="last_name" value="{{ $company->last_name }}" type="text" id="input10" class="br-0 p-3 form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="input11">E-post</label>
                    <input name="email" value="{{ $company->users['email'] }}" type="email" id="input11" class="br-0 p-3 form-control" data-validation="email">
                    <p class="clr-red">
                        @if(!empty($warning))
                            {{ $warning->first('email') }}
                        @endif
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="input12">Telefon</label>
                    <input name="telephone" value="{{ $company->telephone }}" type="tel" id="input12" class="br-0 p-3 form-control">
                </div>
            </div>
        <h4 class="border-bottom-blue pb-4 pt-5">Uppdatera losenord</h4>
            <div class="row">
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="input13">Nytt losenord</label>
                    <input name="password" type="password" id="input13" class="br-0 p-3 form-control">
                    <p>
                        @if(!empty($warning))
                            {{ $warning->first('password') }}
                        @endif
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 form-group">
                    <label for="input14">Upprepa losenord</label>
                    <input name="password_confirmation" type="password" id="input14" class="br-0 p-3 form-control">
                </div>
            </div>
        <button type="submit" class="btn mt-4">Submit</button>
        </form>
    </div>
    </main>
@endsection
