@extends('backend.layouts.master')


@section('sidebar')
    <ul class="sidebar-menu">
        <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.dashboard.index') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard.index') }}">
                        <i class="fa-solid fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ Route::is('admin.official.index') ? 'active' : '' }}"
                        href="{{ route('admin.official.index') }}">
                        <i class="fa-solid fa-people-roof"></i>
                        <span>Officials</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ Route::is('admin.barangay.index') ? 'active' : '' }}"
                        href="{{ route('admin.barangay.index') }}">
                        <i class="fa-solid fa-people-roof"></i>
                        <span>Barangays</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed {{ Route::is('admin.archieve.*') ? 'active' : '' }}" data-bs-target="#archieves"
                        data-bs-toggle="collapse" href="#">
                        <i class="fa-regular fa-folder-open"></i>
                        <span>Archieves</span>
                        <i class="fa-solid fa-chevron-down ms-auto"></i>
                    </a>
                    <ul id="archieves" class="nav-content collapse p-2" data-bs-parent="#sidebar-nav">
                        <li class="{{ Route::is('admin.archive.index') ? 'collapse-active' : '' }}">
                            <a href="{{ route('admin.archive.index',['folder' => 'official']) }}">
                                <i class="fa-regular fa-circle"></i>
                                <span>Official</span>
                            </a>
                        </li>
                    </ul>

                </li>

        </aside>
    </ul>
@endsection
