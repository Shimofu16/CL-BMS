@extends($extends)
@section('page-title')
    Profile
@endsection
@section('contents')
    <section class="section">
        <div class="row mb-3">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="card-title">Change Password </h3>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('profile.update') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="current_password" class="form-label fw-bold">Current Password</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                                    @if ($errors->has('current_password'))
                                        <div id="current_password_helper">
                                            {{ $errors->get('current') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="new_password" class="form-label fw-bold">New Password</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password"
                                        required>
                                    <div id="new_password">

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="confirm_password" class="form-label fw-bold">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                        name="confirm_password" required>
                                    <div id="confirm_password">

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="showUpdate">
                                        <label class="form-check-label fw-bold text-black" for="showUpdate"
                                            id="showUpdateLabel">Show
                                            Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 justify-content-end align-items-center">
                                <div></div>
                                <div>
                                    <button type="submit" class="btn btn-violet" id="submit">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="card-title">Activity Logs</h3>
                    </div>
                    <div class="card-body">

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#showUpdate').click(function() {
                if ($(this).is(':checked')) {
                    $('#new_password').attr('type', 'text');
                    $('#confirm_password').attr('type', 'text');
                    $('#showUpdateLabel').text('Hide Password');
                    console.log('checked')
                } else {
                    $('#new_password').attr('type', 'password');
                    $('#confirm_password').attr('type', 'password');
                    $('#showUpdateLabel').text('Show Password');
                    console.log('uncheked')
                }
            });
            /* check if the password is 8 characters */
            $('#new_password').keyup(function() {
                if ($('#new_password').val()
                    .length >= 8) {
                    $('#new_password').addClass('is-valid');

                    $('#new_password').removeClass('is-invalid');
                    $('#new_password').addClass('is-valid');
                    $('#submit').prop('disabled', false);
                } else {

                    $('#new_password').removeClass('is-valid');
                    $('#new_password').addClass('is-invalid');
                    $('#password_helper').text('Password must be 8 characters');
                    $('#submit').prop('disabled', true);
                }
            });
            // check if the confirm_password is equal to password
            $('#confirm_password').keyup(function() {
                if ($('#new_password').val() == $('#confirm_password').val()) {
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
