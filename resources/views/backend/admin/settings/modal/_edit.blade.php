<div class="modal fade" id="edit{{ $setting->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Edit setting</h5>
            </div>
            <form action="{{ route('admin.settings.update', ['id' => $setting->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body row g-3">
                    <div class="col-12">
                        <label for="key" class="form-label fw-bold">Key</label>
                        <input type="text" class="form-control" id="sample" name="sample"
                            value="{{ $setting->key }}" disabled>
                        <input type="text" class="form-control" id="key" name="key"
                            value="{{ $setting->key }}" hidden>
                    </div>
                    <div class="col-12">
                        <label for="value" class="form-label fw-bold">Value</label>
                        @php
                            $type = 'text';
                        @endphp
                        @if ($setting->key != 'name')
                            @php
                                $type = 'file';
                            @endphp
                        @endif
                        <input type="{{ $type }}" class="form-control" id="value" name="value">
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
