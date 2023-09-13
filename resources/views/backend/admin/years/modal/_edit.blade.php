<div class="modal fade" id="edit{{ $year->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Edit Year</h5>
            </div>
            <form action="{{ route('admin.settings.year.update', ['id' => $year->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body row g-3">
                    <div class="col-12">
                        <label for="year" class="form-label fw-bold">Year</label>
                        <input type="text" class="form-control" id="year" name="year" value="{{ $year->year }}">
                    </div>
                    <div class="col-12">
                        <label for="status" class="form-label fw-bold">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option selected="" value="">----- Select Status -----</option>
                            <option value="1" {{ ($year->status == 1) ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ ($year->status == 0) ? 'selected' : '' }}>Inactive</option>
                        </select>
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
