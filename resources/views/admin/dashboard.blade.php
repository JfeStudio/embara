@extends('layouts.app-layout')
@section('content')
    <div class="container">
        {{-- latest --}}
        <div class='mt-4 mb-3'>
            <p class="story">
                DASHBOARD {{ Auth::user()->name }} | {{ Auth::user()->email }}
            </p>
            <h2 class="primary-header ">
                My Bootcamps
            </h2>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Heyy Dude!!</strong> {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table">
            <thead class='table-dark'>
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
                        <td>{{ $checkout->Camp->title }} (ID : {{ $checkout->id }})</td>
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
                            @if (!$checkout->is_paid)
                                <form onsubmit="return confirm('Apakah anda yakin user sudah bayar?')"
                                    action="{{ route('admin.checkout.update', $checkout->id) }}" method="post">
                                    @csrf
                                    <button class='btn btn-primary btn-sm' type="submit">Send to Paid</button>
                                </form>
                            @else
                                -
                            @endif
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
