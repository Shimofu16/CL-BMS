@extends('backend.user.sidebar')

@section('page-title')
    Add Building Permit
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/packages/select2/css/select2.min.css') }}">
@endsection

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header rounded mt-5 mb-3" style="background: #1e2c3b">
                            <h4 class="mb-0 text-white">Building Information</h4>
                        </div>
                        <form action="{{ route('building_permit.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label fw-bold has-asterisk">Building Owner</label>
                                            <div class="input-group">
                                                {{-- <select name="resident" class="form-select">
                                                <option value="" selected disabled hidden>Select a resident</option>
                                                @foreach ($residents as $resident)
                                                <option value="{{ $resident->id }}">{{ $resident->full_name }}
                                                </option>
                                                @endforeach
                                            </select> --}}
                                                <select required name="resident" id="resident_id"
                                                    class="form-control h-100">
                                                    <option value="" selected hidden disabled></option>
                                                    @foreach ($residents as $resident)
                                                        <option value="{{ $resident->id }}">{{ $resident->full_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label fw-bold has-asterisk">Buiding Type</label>
                                            <div class="input-group">
                                                <input type="text" name="building_type" class="form-control phone-number"
                                                    required>
                                            </div><br>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label fw-bold has-asterisk">Buiding Address</label>
                                            <div class="input-group">
                                                <input type="text" name="building_address"
                                                    class="form-control phone-number" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label fw-bold has-asterisk">Registration Date</label>
                                            <div class="input-group">
                                                <input type="date" name="reg_date" class="form-control phone-number"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <div></div>
                                    <div>
                                        <button type="submit" class="btn btn-icon icon-left btn-primary mr-3"><i
                                                class="far fa-save"></i> Save</button>
                                        <a href="{{ route('building_permit.index') }}"
                                            class="btn btn-icon icon-left btn-danger"><i class="fas fa-ban"></i>
                                            Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('assets/packages/select2/js/select2.full.min.js') }}"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('#resident_id').select2({
                width: 'resolve'
            });
        });
    </script>
@endsection
