@extends('backend.user.sidebar')

@section('page-title')
Create Meralco Clearance - Brgy. {{ Auth::user()->official->barangay->name }}
@endsection

@section('contents')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Add Meralco Clearance</h3>
    </div>
    <div class="section-body">
        <div class="card border border-primary">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Meralco Clearance Information</h4>
                        </div>
                        <form action="{{route('meralco_clearance.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label>Meralco clearance requestor</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="applicant" class="form-control phone-number"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-location-dot"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="address" class="form-control phone-number"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label>Building type</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-building"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="building_type"
                                                    class="form-control phone-number" required>
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