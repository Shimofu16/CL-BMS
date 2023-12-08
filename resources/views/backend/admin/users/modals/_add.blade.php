<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-violet">
                <h5 class="modal-title">Add barangay official</h5>
            </div>
            <form action="{{ Route::is('admin.users.index') ? route('admin.users.store') : route('user.users.store') }}" method="post">
                @csrf
                <div class="modal-body row g-3">
                    <div class="col-12">
                        <label for="official_id" class="form-label fw-bold">Official</label>
                        <select class="form-select" id="official_id" name="official_id" required>
                            <option selected value="">----- Select Official -----</option>
                            @foreach ($officials as $Official)
                                <option value="{{ $Official->id }}">{{ $Official->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div id="password_helper">
                            
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="confirm_password" class="form-label fw-bold">Conform Password</label>
                        <input type="password" class="form-control" id="confirm_password"
                            name="confirm_password" required>
                        <div id="confirm_password_helper">
                            
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="showUpdate">
                            <label class="form-check-label fw-bold text-black" for="showUpdate"
                                id="showUpdateLabel">Show
                                Password</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-violet" id="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
