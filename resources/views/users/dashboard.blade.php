@extends('layouts.app-layout')
@section('content')
    <div class="container">
        <section class="dashboard my-5">
            @if (Session::has('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Heyy Dude!!</strong> {{ Session::get('errors') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row text-left">
                <div class=" col-lg-12 col-12 header-wrap mt-4">
                    <p class="story">
                        DASHBOARD {{ Auth::user()->name }} | {{ Auth::user()->email }}
                    </p>
                    <h2 class="primary-header ">
                        My Bootcamps
                    </h2>
                </div>
            </div>
            <div class="row my-5">
                <table class="table">
                    <tbody>
                        @forelse ($checkouts as $checkout)
                            <tr class="align-middle">
                                <td width="18%">
                                    <img src="{{ asset('template') }}/assets/images/item_bootcamp.png" height="120"
                                        alt="">
                                </td>
                                <td>
                                    <p class="mb-2">
                                        <strong>{{ $checkout->Camp->title }}</strong>
                                    </p>
                                    <p>
                                        {{ $checkout->created_at->format('d M, Y') }}
                                    </p>
                                </td>
                                <td>
                                    <strong>${{ $checkout->Camp->price }}k</strong>
                                </td>
                                <td>
                                    @if ($checkout->is_paid)
                                        <strong class='text-success'>Payment Success</strong>
                                    @else
                                        <strong class='text-warning'>Waiting for Payment</strong>
                                    @endif
                                </td>
                                <td>
                                    <a href="https://wa.me/6285856752144?text=Hi, saya ingin bertanya tentang kelas {{ $checkout->Camp->title }}"
                                        class="btn btn-primary">
                                        Contact Support
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <p>tidak ada data</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
    </div>
    </section>
@endsection
