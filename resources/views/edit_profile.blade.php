@extends('layouts.main_layout')

@section('content')
    <main class="home-page-main main">
        <div class="bg-blue pt-5 pb-4">
            <div class="container wrapper-small">
                <p>
                    @if(!empty($warning))
                        {{ $warning }}
                    @endif
                </p>
                <form action="{{ route('editProfile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <p class="mt-5">Edit Username</p>
                    <input name="name" type="text" value="{{ Auth::user()->name }}"><br><br>
                    <b class="mt-2">Change Password</b>
                    <p class="mt-2 mb-0">Old Password</p>
                    <input name="old_password" type="password">
                    <p class="mt-2 mb-0">New Password</p>
                    <input name="password" type="password" value="">
                    <p class="mt-2 mb-0">Retype New Password</p>
                    <input name="password_confirmation" type="password" value="">
                    <p class="mt-4">Edit Profile Image</p>
                    <input name="image" type="file"><br><br>
                    <input type="submit">
                </form>
            </div>
        </div>
    </main>
@endsection
