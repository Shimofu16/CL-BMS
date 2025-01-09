@extends('backend.user.sidebar')

@section('page-title')
Create Franchise - Brgy. {{ Auth::user()->official->barangay->name }}
@endsection

@section('contents')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header rounded mt-5 mb-3" style="background: #1e2c3b">
                        <h4 class="mb-0 text-white">Franchise Information</h4>
                    </div>
                    <form action="{{route('franchise_clearance.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold has-asterisk">Name</label>
                                        <div class="input-group">
                                            <select required name="resident" class="form-select">
                                                <option value="" selected disabled hidden>Select a resident</option>
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
                                        <label class="form-label fw-bold has-asterisk">Motor number</label>
                                        <div class="input-group">
                                            <input type="text" name="motor_number" class="form-control phone-number"
                                                required>
                                        </div><br>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold has-asterisk">Chassis number</label>
                                        <div class="input-group">
                                            <input type="text" name="chassis_number" class="form-control phone-number"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold has-asterisk">Plate number</label>
                                        <div class="input-group">
                                            <input type="text" name="plate_number" class="form-control phone-number"
                                                required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <div class="d-flex justify-content-between">
                                <div></div>
                                <div>
                                    <button type="submit" class="btn btn-icon icon-left btn-primary mr-3"><i
                                            class="far fa-save"></i> Save</button>
                                    <a href="{{ route('franchise_clearance.index') }}"
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
