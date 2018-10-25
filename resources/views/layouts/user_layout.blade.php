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
    <link rel="stylesheet" href="{{asset('css/my_style.css')}}"/>
</head>
<body>
<main class="signin-main">
    <div class="container ">
        <div class="row">
            <div class="container">
                <h3 class="font-bold fs-40 text-center mb-4">Bizz This</h3>
@yield('content')
@section('social')
                    <div class="col-lg-4">
                        <ul class="list-unstyled font-normal social-list">
                            <li class="mb-3">
                                <a class="text-white d-flex align-items-center fb" href="{{ route('fb_login') }}" target="_blank"> <span class="icon entypo-facebook"></span>Log In with Facebook</a>
                            </li>
                            <li class="mb-3">
                                <a class="text-white d-flex align-items-center gplus" href="{{ route('google_login') }}" target="_blank"> <span class="icon entypo-gplus"></span>Log In with Google</a>
                            </li>
                            <li class="mb-3">
                                <a class="text-white d-flex align-items-center twitter" href="{{ route('twitter_login') }}" target="_blank"> <span class="icon entypo-twitter"></span>Log In with Twitter</a>
                            </li>
                        </ul>
                    </div>
@show

                </div>
            </div>
        </div>
    </div>
</main>
<footer class="footer">
    <p class="text-center text-light-gray font-bold mb-0">Copyright &copy; Bizzthis AB</p>
    <p class="text-center text-light-gray font-bold">Heimdalsgatan 36, Marsta, Sweden, <a class="text-light-gray" href="mailto:info@bizzthis.se">info@bizzthis.se</a></p>
</footer>
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.form-validator.min.js')}}"></script>
<script>
    $.validate();
</script>
</body>
</html>