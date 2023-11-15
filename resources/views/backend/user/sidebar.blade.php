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
                <a class="nav-link {{ Route::is('user.barangay.resident.*') ? 'active' : '' }}"
                    href="{{ route('user.barangay.resident.index') }}">
                    <i class="fa-solid fa-people-roof"></i>
                    <span>Residents</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('user.barangay.blotters.*') ? 'active' : '' }}"
                    href="{{ route('user.barangay.blotters.index') }}">
                    <i class="fa-solid fa-user-lock"></i>
                    <span>Blotters</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ Route::is('building_permit.index', 'business_clearance.index') ? 'active' : '' }}"
                    data-bs-target="#permits" data-bs-toggle="collapse" href="#">
                    <i class="fa-regular fa-file"></i>
                    <span>Permits</span>
                    <i class="fa-solid fa-chevron-down ms-auto"></i>
                </a>
                <ul id="permits" class="nav-content collapse p-2" data-bs-parent="#sidebar-nav">
                    <li class="{{ Route::is('building_permit.index') ? 'collapse-active' : '' }}">
                        <a href="{{ route('building_permit.index') }}">
                            <i class="fa-regular fa-circle"></i>
                            <span>Building Permit</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('digging_permit.index') ? 'collapse-active' : '' }}">
                        <a href="{{ route('digging_permit.index') }}">
                            <i class="fa-regular fa-circle"></i>
                            <span>Digging Permit</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('fencing_permit.index') ? 'collapse-active' : '' }}">
                        <a href="{{ route('fencing_permit.index') }}">
                            <i class="fa-regular fa-circle"></i>
                            <span>Fencing Permit</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('business_clearance.index') ? 'collapse-active' : '' }}">
                        <a href="{{ route('business_clearance.index') }}">
                            <i class="fa-regular fa-circle"></i>
                            <span>Business Clearance</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('franchise_clearance.index') ? 'collapse-active' : '' }}">
                        <a href="{{ route('franchise_clearance.index') }}">
                            <i class="fa-regular fa-circle"></i>
                            <span>Franchise Clearance</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('meralco_clearance.index') ? 'collapse-active' : '' }}">
                        <a href="{{ route('meralco_clearance.index') }}">
                            <i class="fa-regular fa-circle"></i>
                            <span>Meralco Clearance</span>
                        </a>
                    </li>
                </ul>

            </li>
    </aside>
</ul>
@endsection