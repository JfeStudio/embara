@extends('layouts.app-layout')
@section('content')
    <section class="checkout">
        <div class="container">
            <div class="row text-center pb-70">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="story">
                        YOUR FUTURE CAREER
                    </p>
                    <h2 class="primary-header">
                        Start Invest Today
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-5 col-12">
                            <div class="item-bootcamp">
                                <img src="{{ asset('template') }}/assets/images/item_bootcamp.png" alt=""
                                    class="cover">
                                <h1 class="package">
                                    {{-- GILA BELAJAR --}}
                                    {{ $camp->title }}
                                </h1>
                                <p class="description">
                                    Bootcamp ini akan mengajak Anda untuk belajar penuh mulai dari pengenalan dasar sampai
                                    membangun sebuah projek asli
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-1 col-12"></div>
                        <div class="col-lg-6 col-12">
                            <form action="{{ route('checkout.store', $camp->id) }}" method="post" class="basic-form">
                                @csrf
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="exampleInputEmail1" name="name" value="{{ Auth::user()->name }}"
                                        aria-describedby="emailHelp">
                                    @error('name')
                                        <small class='text-danger'>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                    <input name="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                        value="{{ Auth::user()->email }}" aria-describedby="emailHelp">
                                    @error('email')
                                        <small class='text-danger'>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Occupation</label>
                                    <input name="occupation" type="text"
                                        class="form-control @error('occupation') @enderror" id="exampleInputEmail1"
                                        value="{{ Auth::user()->occupation }}" aria-describedby="emailHelp"
                                        placeholder="Your occupation">
                                    @error('occupation')
                                        <small class='text-danger'>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Card Number</label>
                                    <input name="card_number" type="number"
                                        class="form-control @error('card_number') is-invalid @enderror"
                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                        value="{{ old('card_number') }}" placeholder="Your card number">
                                    @error('card_number')
                                        <small class='text-danger'>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-5">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <label for="exampleInputEmail1" class="form-label">Expired</label>
                                            <input name="expired" type="month"
                                                class="form-control @error('expired') is-invalid @enderror"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                value="{{ old('expired') }}">
                                            @error('expired')
                                                <small class='text-danger'>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <label for="exampleInputEmail1" class="form-label">CVC</label>
                                            <input name="cvc" type="text"
                                                class="form-control @error('cvc') is-invalid @enderror"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                value="{{ old('cvc') }}" placeholder="CVC">
                                            @error('cvc')
                                                <small class='text-danger'>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="w-100 btn btn-primary">Pay
                                    Now</button>
                                <p class="text-center subheader mt-4">
                                    <img src="{{ asset('template') }}/assets/images/ic_secure.svg" alt=""> Your
                                    payment is secure and
                                    encrypted.
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
