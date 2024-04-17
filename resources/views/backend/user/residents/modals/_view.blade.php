<div class="modal fade" id="family{{ $resident->id }}" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Family Members of {{ $resident->full_name }}</h5>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Resident #</th>
                            <th scope="col">Name</th>
                            <th scope="col">Birthday</th>
                            <th scope="col">Age</th>
                            <th scope="col">Relationship</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resident->members as $index => $member)
                            <tr>
                                <th scope="row">{{ $member->resident_number }}</th>
                                <td>{{ $member->name }}</td>
                                <td>{{ date('F d, Y', strtotime($member->birthdate)) }}</td>
                                <td>{{ $member->birthdate->age }}</td>
                                <td>{{ $member->relationship }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
