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
                    <form action="{{ route('admin.settings.city.set') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="region" class="form-label fw-bold">Region</label>
                                <select class="form-select" id="region" name="region"
                                    aria-label="Default select example">
                                    <option value="" selected hidden disabled>Region</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="province" class="form-label fw-bold">Province</label>
                                <select class="form-select" id="province" name="province"
                                    aria-label="Default select example" disabled>
                                    <option value="" selected hidden disabled>Province</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="city" class="form-label fw-bold">City/Municipality</label>
                                <select class="form-select" id="city" name="city" aria-label="Default select example"
                                    disabled>
                                    <option value="" selected hidden disabled>City/Municipality</option>
                                </select>
                            </div>
                        </div>

                        <button id="saveButton" class="btn btn-primary mt-4" type="submit" disabled>Save</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    const getRegions = async () => {
        $('#province').empty()
        $('#province').attr('disabled', true)
        $('#city').empty()
        $('#city').attr('disabled', true)
        let response = await fetch('https://psgc.gitlab.io/api/regions/')

        return response.json()
    }

    const getProvinces = async (value) => {
        $('#province').empty()
        $('#province').attr('disabled', true)
        $('#city').empty()
        $('#city').attr('disabled', true)
        let response = await fetch(`https://psgc.gitlab.io/api/regions/${value}/provinces`)

        return response.json()
    }

    const getCities = async (value) => {
        $('#city').empty()
        $('#city').attr('disabled', true)
        let response = await fetch(`https://psgc.gitlab.io/api/provinces/${value}/municipalities`)

        return response.json()
    }

    const checkSelects = () => {
        var allFilled = true

        $('select').each(function() {
            if (this.selectedIndex === 0) {
                allFilled = false
                return false
            }
        })

        $('#saveButton').attr('disabled', !allFilled)
    }

    $(document).ready(() => {
        getRegions().then((data) => {
            data.forEach((region) => {
                let option = document.createElement('option')
                option.value = region.code
                option.innerText = `${region.regionName} (${region.name})`
                $('#region').append(option)
            })
        })

        $('#region').on('change', (e) => {
            checkSelects()
            getProvinces(e.target.value)
                .then((data) => {
                    data.forEach((province) => {
                        let option = document.createElement('option')
                        option.value = province.code
                        option.innerText = province.name
                        $('#province').append(option)
                    })
                })
                .then(() => $('#province').attr('disabled', false))
        })

        $('#province').on('change', (e) => {
            checkSelects()
            getCities(e.target.value)
                .then((data) => {
                    data.forEach((city) => {
                        let option = document.createElement('option')
                        option.value = city.code
                        option.innerText = city.name
                        $('#city').append(option)
                    })
                })
                .then(() => $('#city').attr('disabled', false))
        })

        $('#city').on('change', () => checkSelects())
    })
</script>
@endsection
