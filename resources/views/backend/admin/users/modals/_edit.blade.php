<div class="modal fade" id="edit{{ $user->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary ">
                <h5 class="modal-title text-white">Edit</h5>
            </div>
            <form
                action="{{ Route::is('admin.users.index') ? route('admin.users.update', ['id' => $user->id]) : route('user.users.update', ['id' => $user->id]) }}"
                method="post">
                @csrf
                @method('PUT')
                <div class="modal-body row g-3">
                    <div class="col-12">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required
                            value="{{ $user->email }}">
                    </div>
                    <div class="col-12">
                        <label for="current_password" class="form-label fw-bold">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password"
                            required>
                        @if ($errors->has('current_password'))
                            <div id="current_password_helper">
                                {{ $errors->get('current') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="new_password" class="form-label fw-bold">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                        <div id="new_password">

                        </div>
                    </div>
                    <div class="col-12">
                        <label for="confirm_password" class="form-label fw-bold">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            required>
                        <div id="confirm_password">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
