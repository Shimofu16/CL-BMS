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
            <li class="nav-item">
                <a class="nav-link {{ Route::is('user.resident.index') ? 'active' : '' }}"
                    href="{{ route('user.resident.index') }}">
                    <i class="fa-solid fa-house-chimney"></i>
                    <span>Residents</span>
                </a>
            </li>
    </aside>
</ul>
@endsection
