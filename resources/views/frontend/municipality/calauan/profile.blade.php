@extends('frontend.municipality.calauan.master')
@section('title')
Home
@endsection
@section('content')

<section class="breadcrumb__wrap">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">Municipal Profile</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Municipal Profile
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services__details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="services__details__content">
                    <p>
                        Calauan is a second class municipality in the province of Laguna, Philippines. According to the
                        2010 census, it has a population of 74,890 people. The town got its name from the term kalawang,
                        which means rust. Folklore has it that the town got its name when the Spanish started
                        construction of the Municipal Church and water seeped in from the holes dug into the ground for
                        the Church’s foundation. The water was colored brown and rustic in character hence the name
                        Calauan (Kalawang). Calauan is known for the Pineapple Festival, which is celebrated every 15
                        May.
                    </p>

                    <p>
                        The patron saint of Calauan is Isidore the Laborer, the patron of farmers, known in Spanish as
                        San Isidro Labrador. Calauan’s population is expected rise as the town is being used as
                        resettlement of informal settlers in Metro Manila through the Bayan ni Juan and the Kapit-Bisig
                        para sa Ilog Pasig project of the ABS-CBN Foundation. Popular destinations in the area includes
                        the Field of Faith situated in Brgy. Lamot 2 and the Isdaan Floating Restaurant located along
                        the National Highway going to Victoria Laguna. Calauan is politically subdivided into 17
                        barangays:
                    </p>
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="services__details__list">
                                @foreach ($barangays->take($column1) as $barangay)
                                <li>{{$barangay->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <ul class="services__details__list">
                                @foreach ($barangays->slice($column1, $column2) as $barangay)
                                <li>{{$barangay->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <ul class="services__details__list">
                                @foreach ($barangays->slice($column1 + $column2) as $barangay)
                                <li>{{$barangay->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
