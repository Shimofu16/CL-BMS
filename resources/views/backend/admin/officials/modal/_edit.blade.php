<div class="modal fade" id="edit{{ $official->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Edit barangay official</h5>
            </div>
            <form action="{{ route('admin.official.update', ['id' => $official->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body row">
                    <div class="row">
                        <div class="col-12">
                            <label for="first_name" class="form-label fw-bold has-asterisk">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                value="{{ $official->first_name }}">
                        </div>
                        <div class="col-12">
                            <label for="middle_name" class="form-label fw-bold">Middle Name</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name"
                                value="{{ $official->middle_name }}">
                        </div>
                        <div class="col-12">
                            <label for="last_name" class="form-label fw-bold has-asterisk">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                value="{{ $official->last_name }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="position" class="form-label fw-bold has-asterisk">Position</label>
                            <select class="form-select" id="position" name="position" required>
                                <option selected value="">----- Select Position -----</option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position }}"
                                        {{ $position == $official->position ? 'selected' : '' }}>{{ $position }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="barangay" class="form-label fw-bold has-asterisk required">Barangay</label>
                            <select class="form-select" id="barangay" name="barangay_id">
                                <option selected value="">----- Select Barangay -----</option>
                                @foreach ($barangays as $barangay)
                                    <option value="{{ $barangay->id }}"
                                        {{ $barangay->id == $official->barangay_id ? 'selected' : '' }}>
                                        {{ $barangay->name }}</option>
                                @endforeach
                            </select>
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
