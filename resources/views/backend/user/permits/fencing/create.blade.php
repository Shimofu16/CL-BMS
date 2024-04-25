@extends('backend.user.sidebar')

@section('page-title')
Create Fencing - Brgy. {{ Auth::user()->official->barangay->name }}
@endsection

@section('contents')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header rounded mt-5 mb-3" style="background: #1e2c3b">
                        <h4 class="mb-0 text-white">Fencing Information</h4>
                    </div>
                    <form action="{{route('fencing_permit.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold has-asterisk">Name</label>
                                        <div class="input-group">
                                            <input type="text" name="name" class="form-control phone-number" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold has-asterisk">Address</label>
                                        <div class="input-group">
                                            <input type="text" name="address" class="form-control phone-number"
                                                required>
                                        </div><br>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold has-asterisk">Digging Location</label>
                                        <div class="input-group">
                                            <input type="text" name="location" class="form-control phone-number"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold has-asterisk">Purpose</label>
                                        <div class="input-group">
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
</section>
@endsection
