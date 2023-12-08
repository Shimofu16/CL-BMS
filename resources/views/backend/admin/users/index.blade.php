@php
$isAdmin = auth()
->user()
->isAdmin();
$extends = $isAdmin ? 'backend.admin.sidebar' : 'backend.user.sidebar';
@endphp

@extends($extends)

@section('page-title')
Users @if (!$isAdmin)
- Brgy {{ auth()->user()->official->barangay->name }}
@endif
@endsection
@section('contents')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between border-bottom-0">
                    <h3 class="card-title">Users </h3>
                    <div class="d-flex align-items-center">
                        @if ($isAdmin)
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary me-1">
                            <i class="fa-solid fa-rotate-right"></i>
                        </a>
                        <div class="dropdown me-1">
                            <button class="btn btn-violet dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Barangay
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @foreach ($barangays as $item)
                                <li><a class="dropdown-item"
                                        href="{{ route('admin.users.index', ['barangay_id' => $item->id]) }}">{{
                                        $item->name }}</a>
                                </li>
                                @endforeach
                            </ul>

                        </div>
                        @endif
                    </div>

                </div>

                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            @if ($isAdmin)
                            <th scope="col">Barangay</th>
                            @endif
                            @if (!$isAdmin)
                            <th scope="col">Email</th>
                            @endif
                            <th scope="col">Role</th>
                            @if ($isAdmin)
                            <th scope="col">Activities</th>
                            <th scope="col">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                        <tr>
                            <td scope="row">{{ $index + 1 }}</td>
                            <td>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-0">{{ $user->name }}</h6>
                                    @if ($isAdmin)
                                    <span>{{ $user->email }}</span>
                                    @endif
                                </div>
                            </td>
                            @if ($isAdmin)
                            <td>{{ $user->official->barangay->name }}</td>
                            @endif
                            @if (!$isAdmin)
                            <td>{{ $user->email }}</td>
                            @endif
                            <td>{{ $user->official->position }}</td>
                            @if ($isAdmin)
                            <td>
                                <a class="btn btn-outline-primary btn-sm" href="#">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-outline-primary btn-sm ms-1"
                                        data-bs-toggle="modal" data-bs-target="#edit{{ $user->id }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </div>

                                @include('backend.admin.users.modals._edit')

                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>
        <div class="card-body">

            <!-- Table with stripped rows -->
            <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Barangay</th>
                        <th scope="col">Role</th>
                        <th scope="col">Activities</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                    <tr>
                        <td scope="row">{{ $index + 1 }}</td>
                        <td>
                            <div class="d-flex flex-column">
                                <h6 class="mb-0">{{ $user->name }}</h6>
                                <span>{{ $user->email }}</span>
                            </div>
                        </td>
                        <td>{{ $user->official->barangay->name }}</td>
                        <td>{{ $user->official->position }}</td>
                        <td>
                            <a class="btn btn-outline-primary btn-sm"
                                href="{{ route('admin.users.activities',$user->id) }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <div class="d-flex">
                                <button type="button" class="btn btn-outline-primary btn-sm ms-1" data-bs-toggle="modal"
                                    data-bs-target="#edit{{ $user->id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-sm ms-1" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $user->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>

                            {{-- @include('backend.admin.barangay.modal._edit')
                            @include('backend.admin.barangay.modal._delete') --}}

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with stripped rows -->

        </div>
    </div>

    </div>
    </div>
</section>
@endsection

@section('add')
<button class="btn btn-outline-violet" data-bs-toggle="modal" data-bs-target="#add">
    Add User
</button>
@include('backend.admin.users.modals._add')
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
            $('#showUpdate').click(function() {
                if ($(this).is(':checked')) {
                    $('#password').attr('type', 'text');
                    $('#confirm_password').attr('type', 'text');
                    $('#showUpdateLabel').text('Hide Password');
                    console.log('checked')
                } else {
                    $('#password').attr('type', 'password');
                    $('#confirm_password').attr('type', 'password');
                    $('#showUpdateLabel').text('Show Password');
                    console.log('uncheked')
                }
            });
            /* check if the password is 8 characters */
            $('#password').keyup(function() {
                if ($('#password').val()
                    .length >= 8) {
                    $('#password').addClass('is-valid');

                    $('#password').removeClass('is-invalid');
                    $('#password').addClass('is-valid');
                    $('#submit').prop('disabled', false);
                } else {

                    $('#password').removeClass('is-valid');
                    $('#password').addClass('is-invalid');
                    $('#password_helper').text('Password must be 8 characters');
                    $('#submit').prop('disabled', true);
                }
            });
            // check if the confirm_password is equal to password
            $('#confirm_password').keyup(function() {
                if ($('#password').val() == $('#confirm_password').val()) {
                    $('#confirm_password').removeClass('is-invalid');
                    $('#confirm_password').addClass('is-valid');
                    $('#confirm_password_helper').text('');
                    $('#submit').prop('disabled', false);
                    console.log('same')
                } else {
                    $('#confirm_password').removeClass('is-valid');
                    $('#confirm_password').addClass('is-invalid');
                    $('#confirm_password_helper').text(
                        'Password confirmation does not match password');
                    console.log('not same')
                    $('#submit').prop('disabled', true);
                }
            });
        });
</script>
@endsection