<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-violet">
                <h5 class="modal-title">Add {{ $title }}</h5>
            </div>

            <form
                action="{{ route('admin.barangay.store', ['isBarangay' => $isBarangay, 'barangay_id' => $barangay->id]) }}"
                method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body row g-3">

                    <div class="col-12">
                        <label for="name" class="form-label fw-bold has-asterisk">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    @if ($isBarangay == 1)
                        <div class="col-12">
                            <label for="logo" class="form-label fw-bold">Logo</label>
                            <input type="file" class="form-control" id="logo" name="logo">
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-violet">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
