<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
            <img src="{{ asset($logo->value) }}" alt="" class="rounded-circle">
            <span class="d-none d-lg-block text-violet">{{ auth()->user()->role }} Dashboard</span>
        </a>
        <i class="fa-solid fa-bars toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    @if (Route::is('user.*'))
    <div class="ms-5">
        <h4 class="mb-0 text-violet"> Barangay {{ Str::ucfirst(auth()->user()->official->barangay->name) }}</h4>
    </div>
    @endif


    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            @if (Route::is('user.*'))
            <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="fa-regular fa-bell"></i>
                    <span class="badge bg-success badge-number">{{
                        getResidentOverlaps(auth()->user()->official->barangay->id)->count() }}</span>
                </a><!-- End Messages Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                    {{-- <li class="dropdown-header">
                        <a href="#">
                            <span class="badge rounded-pill bg-primary p-2 ms-2">View all</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li> --}}
                    @foreach (getResidentOverlaps(auth()->user()->official->barangay->id) as $overlap)
                    @php
                    $newResident = getResidentByCode($overlap->new_id);
                    $existingResident = getResidentByCode($overlap->existing_id);
                    @endphp
                    @if (getOverlapByResidentCode($overlap->new_id, auth()->user()->official->barangay->id))
                    <li class="message-item">
                        <a href="#">
                            <div>
                                <h4>{{ $newResident->full_name }}</h4>
                                <p>
                                    This resident is already a registered resident of
                                    <span>Brgy. {{ Str::ucfirst($existingResident->barangay->name) }}</span>
                                </p>
                            </div>
                        </a>
                    </li>
                    @else
                    <li class="message-item">
                        <a href="#">
                            <div>
                                <h4>{{ $existingResident->full_name }}</h4>
                                <p>
                                    This resident is trying to register to another barangay. <br>
                                    <span>Brgy. {{ Str::ucfirst($newResident->barangay->name) }}</span>
                                </p>
                            </div>
                        </a>
                    </li>
                    @endif
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    @endforeach


                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="dropdown-footer">
                        <a href="{{ route('user.barangay.resident.duplicates') }}">View all</a>
                    </li>

                </ul><!-- End Messages Dropdown Items -->

            </li>
            @endif

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('assets/images/avatar/avatar-1.png') }}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2 text-violet">
                        {{ auth()->user()->name }}
                    </span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>
                            {{ auth()->user()->name }}
                        </h6>

                        <span>{{ auth()->user()->role == 'User' ? auth()->user()->official->position :
                            auth()->user()->role }}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    {{-- <li>
                        <a class="dropdown-item d-flex align-items-center"
                            href="{{ route(Str::lower(auth()->user()->role).'.change-password.index') }}">
                            <i class="ri-lock-password-fill"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    --}}
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.index') }}">
                            <i class="fa-solid fa-id-card"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal"
                            data-bs-target="#logout">
                            <i class="fa-solid fa-power-off"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>
                </ul><!-- End Profile Dropdown Items -->
            </li>
            <!-- End Profile Nav -->

        </ul>
    </nav>
    <!-- End Icons Navigation -->
</header>
