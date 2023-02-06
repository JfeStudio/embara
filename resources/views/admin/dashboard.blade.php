@extends('layouts.app-layout')
@section('content')
    <div class="container">
        {{-- latest --}}
        <div class='mt-4'>
            <p class="story">
                DASHBOARD {{ Auth::user()->name }} | {{ Auth::user()->email }}
            </p>
            <h2 class="primary-header ">
                My Bootcamps
            </h2>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Title Camp</th>
                    <th scope="col">Date</th>
                    <th scope="col">Price</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($checkouts as $checkout)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <th scope="col">{{ $checkout->User->name }}</th>
                        <td>{{ $checkout->Camp->title }}</td>
                        <td>{{ $checkout->created_at->format('d M, Y') }}</td>
                        <td>${{ $checkout->Camp->price }}k</td>
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
                    <tr>
                        <th colspan="3" scope="row">Tidak ada data</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
