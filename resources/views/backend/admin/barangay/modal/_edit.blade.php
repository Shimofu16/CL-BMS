@if ($isBarangay == 1)
    @php
        $id = $barangay->id;
        $name = $barangay->name;
    @endphp
@else
    @php
        $id = $purok->id;
        $name = $purok->name;
    @endphp
@endif
<div class="modal fade" id="edit{{ $id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Edit {{ $title }}</h5>
            </div>
            <form
                action="{{ route('admin.barangay.update', ['isBarangay' => $isBarangay, 'id' => $id, 'barangay_id' => $barangay->id]) }}"
                method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body row g-3">
                    <div class="col-12">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $name }}">
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
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
