@if ($folder == "official")
    @php
        $id = $official->id;
        $route = route('admin.archive.restore', ['folder' => $folder, 'id' => $id]);
    @endphp
@endif

<div class="modal fade" id="restore{{ $id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Restore data</h5>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to restore this data?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ $route }}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger">Restore</button>
                </form>
            </div>
        </div>
    </div>
</div>
