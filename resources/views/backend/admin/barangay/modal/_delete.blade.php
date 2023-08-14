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
<div class="modal fade" id="delete{{ $id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Delete {{ $title }}</h5>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete {{ $name }}?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.barangay.delete',['isBarangay' => $isBarangay,'id' => $id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
