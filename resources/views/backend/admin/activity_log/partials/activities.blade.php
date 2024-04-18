{{-- @forelse ($activities as $activity)

@if ($activity->scope == 'Resident')
<div class="card p-3 mb-2 lh-sm rounded-3">
    <p class="fw-bold">{{ $activity->user->name }} - Brgy. {{ $activity->user->official->barangay->name }}</p>
    <p>{{ $activity->description }}: {{ $activity->subject->full_name }}</p>
    <p style="font-size: 0.80rem">{{ $activity->created_at->format('F j, Y h:i A') }}</p>
</div>

@elseif ($activity->scope == 'Permits/Clearances')
<div class="card p-3 mb-2 lh-sm rounded-3">
    <p class="fw-bold">{{ $activity->user->name }} - Brgy. {{ $activity->user->official->barangay->name }}</p>
    <p>{{ $activity->description }}</p>
    <p>Owner: {{ $activity->subject->owner->full_name }}</p>
    @foreach ($activity->subject->details as $key => $details)
    @if ($key == 'registration_date')
    <p>{{ ucwords(str_replace('_', ' ', $key)) }}: {{ \Carbon\Carbon::parse($details)->format('F j, Y') }}</p>
    @elseif ($key && $details)
    <p>{{ ucwords(str_replace('_', ' ', $key)) }}: {{ $details }}</p>
    @endif
    @endforeach
    <p style="font-size: 0.80rem">{{ $activity->created_at->format('F j, Y h:i A') }}</p>
</div>

@elseif ($activity->scope == 'Blotter')
<div class="card p-3 mb-2 lh-sm rounded-3">
    <p class="fw-bold">{{ $activity->user->name }} - Brgy. {{ $activity->user->official->barangay->name }}</p>
    <p>{{ $activity->description }} against @foreach ($activity->subject->residents as $resident)
        {{ $resident->full_name }}
        @if (!$loop->last)
        <span class="mr-2">,</span>
        @endif
        @endforeach
        {{ $activity->subject->complained_resident }}
    </p>
    <p>Case number: {{ $activity->subject->case_number }}</p>
    <p>Complainant: {{ $activity->subject->complainant_name }}</p>
    <p>Case type: {{ $activity->subject->case_type }}</p>
    <p>Blotter information: {{ $activity->subject->blotters_info }}</p>
    <p>Date of incident: {{ \Carbon\Carbon::parse($activity->subject->date_of_incident)->format('F j, Y') }}</p>
    <p style="font-size: 0.80rem">{{ $activity->created_at->format('F j, Y h:i A') }}</p>
</div>

@endif

@empty
No data
@endforelse --}}

<div class="container card p-4">
    <table id="activities" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Barangay</th>
                <th scope="col">User</th>
                <th scope="col">Activity</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($activities as $index => $activity)
            <tr>
                <td>{{ $activity->user->official->barangay->name }}</td>
                <td>{{ $activity->user->name }}</td>
                <td>{{ $activity->description }}</td>
                <td>{{ $activity->created_at->format('F j, Y h:i A') }}</td>
            </tr>

            @empty
            <tr>
                <td colspan="4">No data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $activities->links() }}
    </div>
</div>