@extends('backend.user.sidebar')

@section('page-title')
Create Franchise - Brgy. {{ Auth::user()->official->barangay->name }}
@endsection

@section('contents')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Add Franchise</h3>
    </div>
    <div class="section-body">
        <div class="card border border-primary">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Franchise Information</h4>
                        </div>
                        <form action="{{route('franchise_clearance.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                </div>
                                                <select name="resident" class="form-select">
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
                                            <label>Motor number</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-motorcycle"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="motor_number" class="form-control phone-number"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label>Chassis number</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-gears"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="chassis_number"
                                                    class="form-control phone-number" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label>Plate number</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-file-lines"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="plate_number" class="form-control phone-number"
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
                                    <a href="{{route('franchise_clearance.index')}}"
                                        class="btn btn-icon icon-left btn-danger mr-3"><i class="fas fa-ban"></i>
                                        Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection