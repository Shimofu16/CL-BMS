@extends('backend.admin.sidebar')
@section('page-title')
Settings
@endsection

@section('contents')
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between border-bottom-0">
                    <h3 class="card-title">
                        Settings
                    </h3>

                </div>
                <div class="card-body">

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Key</th>
                                <th scope="col">Value</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($settings as $index => $setting)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $setting->key }}</td>
                                @if ($setting->key == 'name' || $setting->key == 'city')
                                <td>{{ $setting->value }}</td>
                                @else
                                <td>
                                    @php
                                    $class = 'rounded';
                                    $style = 'height:200px';
                                    @endphp
                                    @if ($setting->key == 'logo')
                                    @php
                                    $class = 'rounded-circle';
                                    $style = 'height:70px';
                                    @endphp
                                    @endif
                                    <img src="{{ asset($setting->value) }}" alt="{{ $setting->key }}"
                                        style="{{ $style }}" class="{{ $class }}">
                                </td>
                                @endif
                                <td>
                                    @if($setting->key != 'city')
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-outline-primary btn-sm ms-1"
                                            data-bs-toggle="modal" data-bs-target="#edit{{ $setting->id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </div>
                                    @include('backend.admin.settings.modal._edit')
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>
@endsection