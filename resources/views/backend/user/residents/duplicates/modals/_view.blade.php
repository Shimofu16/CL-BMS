<div class="modal fade" id="info{{ $overlap->id }}" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Information of {{ $newResident->full_name }}</h5>
            </div>
            <div class="modal-body">
  
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="4"><h4>Exixting Brgy.: {{ $newResident->barangay->name }}</h4></th>
                            </tr>
                            <tr>
                                <th scope="col">Resident #</th>
                                <th scope="col">Birthday</th>
                                <th scope="col">Age</th>
                                <th scope="col">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <th scope="row">{{ $newResident->res_num }}</th>
                                    <td>{{ date('F d, Y', strtotime($newResident->birthday)) }}</td>
                                    <td>{{ $newResident->birthday->age }}</td>
                                    <td>{{ $newResident->address }}</td>
                                </tr>
                        </tbody>
                    </table>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th colspan="4"><h4>New Brgy.: {{ $existingResident->barangay->name }}</h4></th>
                            </tr>
                            <tr>
                                <th scope="col">Resident #</th>
                                <th scope="col">Birthday</th>
                                <th scope="col">Age</th>
                                <th scope="col">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <th scope="row">{{ $existingResident->res_num }}</th>
                                    <td>{{ date('F d, Y', strtotime($existingResident->birthday)) }}</td>
                                    <td>{{ $existingResident->birthday->age }}</td>
                                    <td>{{ $existingResident->address }}</td>
                                </tr>
                        </tbody>
                    </table>
               

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
