@extends('backend.user.sidebar')

@section('page-title')
Create Fencing - Brgy. {{ Auth::user()->official->barangay->name }}
@endsection

@section('contents')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Add Fencing</h3>
    </div>
    <div class="section-body">
        <div class="card border border-primary">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Fencing Information</h4>
                        </div>
                        <form action="{{route('fencing_permit.store')}}" method="POST">
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
                                                <input type="text" name="name" class="form-control phone-number"
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
                                            <label>Digging Location</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-location-dot"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="location" class="form-control phone-number"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label>Purpose</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-book"></i>
                                                    </div>
                                                </div>
                                                <input type="text" name="purpose" class="form-control phone-number"
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
                                    <a href="{{route('fencing_permit.index')}}"
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