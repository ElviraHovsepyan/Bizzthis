<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>BizzThis</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/entypo-font.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/hover.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/my_style.css')}}">
</head>
<body>
<main class="signin-main user-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="pr-md-3">
                    <h3 class="font-bold fs-40 text-white line position-relative pb-5 pr-4">Lista dina priser och na ut till fler konsumenter!</h3>
                    <p class="text-white fs-18 mt-4">Utforska mojligheterna med BizzThis!</p>
                    <button class="btn-orange border-0 d-flex align-items-center justify-content-center text-white mt-4 fs-18"> Se erbjudanden</button>
                    <div class="mt-5 text-center">
                        <img src="{{asset('images/log-in/img.png')}}" alt="login">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row h-100">
                    <div class="offset-xl-2 col-lg-10 d-flex align-items-end h-100">
                        <div class="w-100 pt-5">
                            <h3 class="font-bold fs-40 text-center mb-4 text-gray">Bizz This</h3>
                            <form action="{{ route('login') }}" method="post" id="base-login">
                                @csrf
                                <div class="form-group ps-rl">
                                    <span class="help-block form-error ps-abs">
                                        @if(!empty($error))
                                            {{ $error }}
                                        @endif
                                    </span>
                                    <input name="email" type="email" placeholder="E-post" class="form-control fs-18" data-validation="email">
                                    <input name="role" type="hidden" value="client">
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" placeholder="Losenord" class="form-control fs-18" data-validation="length" data-validation-length="min6">
                                </div>
                                <div class="d-flex align-items-center justify-content-between pt-3">
                                    <a href="{{ route('password.request') }}" class="trans text-light-gray">Glomt losenordet?</a>
                                    <button type="submit" class="trans btn btn-blue text-white d-flex align-items-center justify-content-between">
                                        <span class="mr-2 font-bold">Logga in</span>
                                        <span class="entypo-right-open-big"></span>
                                    </button>
                                </div>
                            </form>
                            <div>
                                <div class="d-flex align-items-center justify-content-between pt-3">
                                    <a class="text-light-gray trans" href="#">Behover du ett konto?</a>
                                    <button class="trans btn btn-light-blue d-flex align-items-center justify-content-center" data-toggle="modal" data-target="#registerModal">Registrera dig</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="footer text-right">
    <div class="container">
        <div class="text-center d-inline-block pr-4">
            <p class="text-center text-light-gray font-bold mb-0">Copyright &copy; Bizzthis AB</p>
            <p class="text-center text-light-gray font-bold">Heimdalsgatan 36, Marsta, Sweden, <a class="text-light-gray" href="mailto:info@bizzthis.se">info@bizzthis.se</a></p>
        </div>
    </div>
</footer>


<!-- start the Register Modal -->
<div class="modal fade register-modal" id="registerModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header d-block pt-0 pr-0">
                <button type="button" class="close fs-30 p-2" data-dismiss="modal">&times;</button>
                <h3 class="font-bold fs-40 text-center mb-4 text-gray">Bizz This</h3>
                <p class="font-normal text-center text-gray fs-18 mb-0">Fyll i dina uppgifter for att komma igang!</p>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('register') }}" method="post" id="base-register">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <span class="d-none"></span>
                            <label class="text-gray" for="id1">Bolagsnamn</label>
                            <input name="company_name" type="text" class="form-control" id="id1" data-validation="length" data-validation-length="min3">
                            <input name="role" type="hidden" value="client">
                        </div>
                        <div class="col-sm-6 form-group">
                            <span class="d-none"></span>
                            <label class="text-gray" for="id2">Org.nummer</label>
                            <input name="company_number" type="text" class="form-control" id="id2" data-validation="required">
                        </div>
                        <div class="col-sm-6 form-group">
                            <span class="d-none"></span>
                            <label class="text-gray" for="id3">Adress</label>
                            <input name="address" type="text" class="form-control" id="id3" data-validation="required">
                        </div>
                        <div class="col-sm-6 form-group">
                            <span class="d-none"></span>
                            <label class="text-gray" for="id4">Postnummer</label>
                            <input name="post_code" type="text" class="form-control" id="id4">
                        </div>
                        <div class="col-sm-6 form-group">
                            <span class="d-none"></span>
                            <label class="text-gray" for="id5">Fornamn</label>
                            <input name="name" type="text" class="form-control" id="id5" data-validation="length" data-validation-length="min3">
                        </div>
                        <div class="col-sm-6 form-group">
                            <span class="d-none"></span>
                            <label class="text-gray" for="id6">Efternamn</label>
                            <input name="last_name" type="text" class="form-control" id="id6">
                        </div>
                        <div class="col-sm-6 form-group">
                            <span class="d-none"></span>
                            <label class="text-gray" for="id7">E-post</label>
                            <input name="email" type="email" class="form-control" id="id7" data-validation="email">
                        </div>
                        <div class="col-sm-6 form-group">
                            <span class="d-none"></span>
                            <label class="text-gray" for="id8">Telefon</label>
                            <input name="telephone" type="text" class="form-control" id="id8" data-validation="required">
                        </div>
                        <div class="col-sm-6 form-group">
                            <span class="d-none"></span>
                            <label class="text-gray d-flex justify-content-start align-items-center" for="id9">
                                <span>Losenord </span>
                                <span class="ml-2 info d-flex align-items-center justify-content-center">i</span>
                            </label>
                            <input name="password" type="password" class="form-control" id="id9" data-validation="length" data-validation-length="min6">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="text-gray" for="id10">Bekrafta losenord</label>
                            <input name="repeat" data-validation="confirmation" data-validation-confirm="password" type="password" class="form-control" id="id10">
                        </div>
                        <div class="col-sm-12 d-flex align-items-center justify-content-start">
                            <input type="checkbox" id="id11">
                            <label class="text-gray m-0 pl-2 fs-12" for="id11">Jag har last och godkanner BizzThis anvandarvillkor och personuppgiftspolicy</label>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center pt-0">
                        <button type="submit" class="btn-orange border-0 d-flex align-items-center justify-content-center text-white fs-18">Registrera dig</button>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->

        </div>
    </div>
</div>
<!--end the Register Modal -->

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.form-validator.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $.formUtils.loadModules('customModule otherCustomModule', 'js/security.js');
        $.validate({
            modules: 'security'
        });
    });
</script>
</body>
</html>