@extends('backend.user.sidebar')

@section('page-title')
Add Business
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('assets/packages/select2/css/select2.min.css')}}">
@endsection

@section('contents')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header rounded mt-5 mb-3" style="background: #1e2c3b">
                        <h4 class="mb-0 text-white">Business Information</h4>
                    </div>
                    <form action="{{route('store_business')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold has-asterisk">Business Owner</label>
                                        <div class="input-group">
                                            <select required name="resident" class="form-select" id="resident_id"
                                                style="width: 94%">
                                                <option value="" selected disabled hidden></option>
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
                                        <label class="form-label fw-bold has-asterisk">Business Name</label>
                                        <div class="input-group">
                                            <input type="text" name="business_name" class="form-control phone-number"
                                                required>
                                        </div><br>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold has-asterisk">Business Type</label>
                                        <div class="input-group">
                                            <input type="text" name="business_type" class="form-control phone-number"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold has-asterisk">Business Address</label>
                                        <div class="input-group">
                                            <input type="text" name="business_address" class="form-control phone-number"
                                                required>
                                        </div><br>
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
                        <div class="card-footer text-right">
                            <div class="container d-flex justify-content-center">
                                <button type="submit" class="btn btn-icon icon-left btn-primary mr-3"><i
                                        class="far fa-save"></i> Save</button>
                                <a href="{{route('business_clearance.index')}}"
                                    class="btn btn-icon icon-left btn-danger mr-3"><i class="fas fa-ban"></i>
                                    Cancel</a>
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
<script src="{{asset('assets/packages/select2/js/select2.full.min.js')}}"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('#resident_id').select2({
            width: 'resolve'
        });
    });
</script>
@endsection
