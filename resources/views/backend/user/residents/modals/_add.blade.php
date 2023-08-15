<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-violet">
                <h5 class="modal-title">Add Resident</h5>
            </div>

            <form action="{{ route('user.resident.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="d-flex flex-column align-items-center ">
                                <div id="my_camera"></div>
                                <div>
                                    <input type=button class="btn btn-sm btn-primary" value="Capture"
                                        onClick="take_snapshot()">
                                </div>
                            </div>
                            <input type="hidden" name="image" class="image-tag" style="height: 300px; width: 300px;">
                        </div>

                        <div class="col-md-6">
                            <div id="results"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="first_name" class="form-label fw-bold">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name">
                        </div>
                        <div class="col-4">
                            <label for="middle_name" class="form-label fw-bold">Middle Name</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name">
                        </div>
                        <div class="col-4">
                            <label for="last_name" class="form-label fw-bold">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name">
                        </div>
                        <div class="col-4">
                            <label for="suffix_name" class="form-label fw-bold">Suffix Name</label>
                            <input type="text" class="form-control" id="suffix_name" name="suffix_name">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-violet">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

