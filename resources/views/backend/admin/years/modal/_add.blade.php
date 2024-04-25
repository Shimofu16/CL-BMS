<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-violet">
                <h5 class="modal-title">Add Year</h5>
            </div>
            <form action="{{ route('admin.settings.year.store') }}" method="post">
                @csrf
                <div class="modal-body row g-3">
                    <div class="col-12">
                        <label for="year" class="form-label fw-bold has-asterisk">Year</label>
                        <input type="text" class="form-control" id="year" name="year" required>
                    </div>
                    {{-- <div class="col-12">
                        <label for="status" class="form-label fw-bold">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option selected="" value="">----- Select Status -----</option>
                            <option value="true">Active</option>
                            <option value="false">Inactive</option>
                        </select>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-violet ">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

