@extends('backend.user.sidebar')

@section('page-title')
Add Blotter - Brgy. {{ auth()->user()->official->barangay->name }}
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
                        <h4 class="mb-0 text-white">Blotters Information</h4>
                    </div>

                    <form action="{{route('user.barangay.blotters.store')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold has-asterisk" for="resident_id">Respondent/s</label>
                                        <div class="input-group">
                                            <select required name="resident_id[]" id="resident_id" class="form-select" multiple>
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
                                        {{-- <div class="form-group">
                                            <label>Respondent/s not resident</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="complained_resident"
                                                    class="form-control phone-number">
                                            </div>
                                        </div> --}}


                                        <label for="complained_resident" class="form-label fw-bold has-asterisk">Respondent/s not
                                            resident</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="complained_resident"
                                                id="complained_resident" aria-describedby="basic-addon1">
                                        </div><br>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label fw-bold has-asterisk">Blotters Information</label>
                                        <div class="input-group">
                                            <textarea style=" min-height: 200px;" type="text" name="blotter_info"
                                                class="form-control phone-number" required></textarea>
                                        </div><br>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label fw-bold has-asterisk">Complainant</label>
                                        <div class="input-group">
                                            <input type="text" name="complainant_name" class="form-control phone-number"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label fw-bold has-asterisk">Date of Incident</label>
                                        <div class="input-group">
                                            <input type="date" name="date_of_incident" class="form-control phone-number"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label fw-bold has-asterisk">Case Type</label>
                                        <div class="input-group">
                                            <select class="form-control" name="case_type" required>
                                                <option disabled selected></option>
                                                <option value="Civil"> Civil </option>
                                                <option value="Crime"> Crime </option>
                                            </select>
                                        </div><br>
                                    </div>
                                </div>

                                {{-- unsettled --}}
                                <input type="text" name="status" value="Unsettled" hidden>

                                <div class="card-footer text-right">
                                    <div class="container d-flex justify-content-center">
                                        <button type="submit" class="btn btn-icon icon-left btn-primary mr-3"><i
                                                class="far fa-save"></i> Save</button>
                                        <a href="{{ route('user.barangay.blotters.index') }}"
                                            class="btn btn-icon icon-left btn-danger mr-3"><i class="fas fa-ban"></i>
                                            Cancel</a>
                                    </div>
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
<script src="{{asset('assets/packages/select2/js/select2.full.min.js')}}"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('#resident_id').select2();
    });
</script>
@endsection
