<div class="modal fade" id="certificate{{ $resident->id }}" tabindex="-1">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-violet">
                <h5 class="modal-title">Create Certificate</h5>
            </div>

            <form action="{{ route('user.barangay.certificate.create',['resident_id' => $resident->id]) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label fw-bold" for="certificate">Certificate</label>
                            <select class="form-select" name="certificate" id="certificate">
                                <option selected value="">----- Select Certificate -----</option>
                                @foreach ($certificates as $certificate)
                                    <option value="{{ $certificate['type'] }}">{{ $certificate['title'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label class="form-label fw-bold" for="receiver_id">Reciever</label>
                            <select class="form-select" name="receiver_id" id="receiver_id">
                                <option selected value="">----- Select Reciever -----</option>
                                <option value="father">{{ $resident->full_name }} - Family Head</option>
                                @foreach ($resident->members as $member)
                                    <option value="{{ $member->id }}">{{ $member->name }} - {{ $member->relationship }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="purpose" class="form-label fw-bold">Purpose</label>
                            <input type="text" name="purpose" class="form-control" placeholder="Purpose" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-violet">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
