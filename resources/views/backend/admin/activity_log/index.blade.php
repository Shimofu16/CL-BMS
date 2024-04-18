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
        <select name="barangay" id="barangay" class="form-select w-auto">
            <option value="" selected="{{ !isset($params['barangay']) }}">All</option>
            @foreach ($barangays as $barangay)
            <option value="{{ $barangay->id }}" {{ isset($params['barangay']) && $params['barangay']==$barangay->id ?
                'selected' : '' }}>{{ $barangay->name
                }}</option>
            @endforeach
        </select>
    </div>
    <section id="activities">
        @include('backend.admin.activity_log.partials.activities')
    </section>
    <i id="loading" class="fa-solid fa-spinner fa-spin fa-2xl d-none"></i>
</div>
@endsection

@section('styles')
<style>
    .pagination>li>a,
    .pagination>li>span {
        color: #1e2c3b;
    }

    .pagination>.active>a,
    .pagination>.active>a:focus,
    .pagination>.active>a:hover,
    .pagination>.active>span,
    .pagination>.active>span:focus,
    .pagination>.active>span:hover {
        background-color: #1e2c3b;
        border-color: #1e2c3b;
    }
</style>
@endsection

@section('scripts')
<script>
    document.getElementById('type').addEventListener('change', function(e) {
        $.ajax({
            type: 'get',
            url: '{{ route('activity_logs.index') }}',
            data: {
                'type':e.target.value,
                'barangay': document.getElementById('barangay').value
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

    document.getElementById('barangay').addEventListener('change', function(e) {
        $.ajax({
            type: 'get',
            url: '{{ route('activity_logs.index') }}',
            data: {
                'type':document.getElementById('type').value,
                'barangay':e.target.value
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