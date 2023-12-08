@extends('backend.admin.sidebar')

@section('page-title')
Activity Log
@endsection

@section('contents')
<div class="container">
    <div class="d-flex mb-4">
        <select name="type" id="type" class="form-select w-auto">
            <option value="" selected="{{ !isset($params['type']) }}">All</option>
            @foreach ($filters as $filter)
            <option value="{{ $filter }}" {{ isset($params['type']) && $params['type']==$filter ? 'selected' : '' }}>{{
                $filter }}</option>
            @endforeach
        </select>
    </div>
    <section id="activities">
        @include('backend.admin.activity_log.partials.activities')
    </section>
    <i id="loading" class="fa-solid fa-spinner fa-spin fa-2xl d-none"></i>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('type').addEventListener('change', function(e) {
        $.ajax({
            type: 'get',
            url: '{{ route('admin.users.activities', $userId) }}',
            data: {
                'type':e.target.value,
            },
            beforeSend: function() {
                $('#activities').html('')
                $('#loading').removeClass('d-none')
            },
            complete: function() {
                $('#loading').addClass('d-none')
            },
            success: function(data) {
                $('#activities').html(data)
            },
        })
    })

    $('#loading').bind('ajaxStart', function(){
        $(this).show();
    }).bind('ajaxStop', function(){
        $(this).hide();
    });
</script>
@endsection