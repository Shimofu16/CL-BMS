@extends('frontend.layouts.master')
@section('title')
    Home
@endsection
@section('content')
    <div class=" container vh-100 vw-100 d-flex justify-content-center align-items-center" style="background-image: url({{ asset('assets/images/municipality-of-calauan.jpg') }}); background-size: cover; background-repeat: no-repeat;
    max-width:100%; background-position:center;">
        <div class="row">
            <div class="card bg-glass border-0 text-center d-flex  my-auto p-3">
                <div class="card-header bg-transparent border-bottom-0 pb-1 d-flex flex-column">
                    <div class="row justify-content-center mb-2">
                        <img src="{{ asset('assets/images/CL-LOGO.png') }}" alt="CL LOGO"
                            style="height: 140px; width:150px;" style="bg-white">
                    </div>
                    <h3 class="text-center">CALAUAN BARANGAY MANAGEMENT SYSTEM</h3>
                    <span class="text-center">Select your Barangay to start your session</span>
                </div>
                <div class="card-body">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Select Barangay
                        </button>
                        <ul class="dropdown-menu">
                            @foreach ($barangays as $barangay)
                                <li><a class="dropdown-item"
                                        href="{{ route('login.page', ['barangay_id' => $barangay->id]) }}">{{ $barangay->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
