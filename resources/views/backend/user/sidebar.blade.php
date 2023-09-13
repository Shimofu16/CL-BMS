@extends('backend.layouts.master')

@section('sidebar')

<ul class="sidebar-menu">
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ Route::is('user.dashboard.index') ? 'active' : '' }}"
                    href="{{ route('user.dashboard.index') }}">
                    <i class="fa-solid fa-chart-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-heading">Menu</li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('user.barangay.*') ? 'active' : '' }}"
                    href="{{ route('user.barangay.resident.index') }}">
                    <i class="fa-solid fa-house-chimney"></i>
                    <span>Residents</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ Route::is('user.barangay.permit.*') ? 'active' : '' }}" data-bs-target="#permits"
                    data-bs-toggle="collapse" href="#">
                    <i class="fa-regular fa-file"></i>
                    <span>Permits</span>
                    <i class="fa-solid fa-chevron-down ms-auto"></i>
                </a>
                <ul id="permits" class="nav-content collapse p-2" data-bs-parent="#sidebar-nav">
                    <li class="{{ Route::is('user.barangay.permit.index') ? 'collapse-active' : '' }}">
                        <a href="{{ route('user.barangay.permit.index',['permit_type' => 'building_permit']) }}">
                            <i class="fa-regular fa-circle"></i>
                            <span>Building Permit</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('user.barangay.permit.index') ? 'collapse-active' : '' }}">
                        <a href="{{ route('user.barangay.permit.index',['permit_type' => 'digging_permit']) }}">
                            <i class="fa-regular fa-circle"></i>
                            <span>Digging Permit</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('user.barangay.permit.index') ? 'collapse-active' : '' }}">
                        <a href="{{ route('user.barangay.permit.index',['permit_type' => 'fencing_permit']) }}">
                            <i class="fa-regular fa-circle"></i>
                            <span>Fencing Permit</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('user.barangay.permit.index') ? 'collapse-active' : '' }}">
                        <a href="{{ route('user.barangay.permit.index',['permit_type' => 'business_clearance']) }}">
                            <i class="fa-regular fa-circle"></i>
                            <span>Business Clearance</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('user.barangay.permit.index') ? 'collapse-active' : '' }}">
                        <a href="{{ route('user.barangay.permit.index',['permit_type' => 'franchise_clearance']) }}">
                            <i class="fa-regular fa-circle"></i>
                            <span>Franchise Clearance</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('user.barangay.permit.index') ? 'collapse-active' : '' }}">
                        <a href="{{ route('user.barangay.permit.index',['permit_type' => 'meralco_clearance']) }}">
                            <i class="fa-regular fa-circle"></i>
                            <span>Meralco Clearance</span>
                        </a>
                    </li>
                </ul>

            </li>
    </aside>
</ul>
@endsection
