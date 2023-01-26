@extends('includes.guest')
@section('content')
    <section class="login-user">
        <div class="left">
            <img src="{{ asset('template') }}/assets/images/ill_login_new.png" alt="">
        </div>
        <div class="right">
            <img src="{{ asset('template') }}/assets/images/logo.png" class="logo" alt="">
            <h1 class="header-third">
                Start Today
            </h1>
            <p class="subheader">
                Because tomorrow become never
            </p>
            <p>
                <a class="btn btn-border btn-google-login" href="#">
                    <img src="{{ asset('template') }}/assets/images/ic_google.svg" class="icon" alt=""> Sign In
                    with Google
                </a>
            </p>
            <img style="max-width: 30rem;" src="{{ asset('template') }}/assets/images/people.png" class="people"
                alt="">
        </div>
    </section>
@endsection
