@extends('frontend.barangays.master')
@section('title')
Home
@endsection
@section('content')

<!-- banner-area -->
<section class="banner">
    <div class="container custom-container">
        <div class="row align-items-center justify-content-center justify-content-lg-between">
            <div class="col-lg-6 order-0 order-lg-2">
                <div class="text-center banner__img text-xxl-end">
                    <img src="{{asset('homepage/assets/img/banner/banner.png')}}" alt="" />
                </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="banner__content">
                    <h2 class="title wow fadeInUp" data-wow-delay=".2s">
                        <span>Welcome to </span> <br />
                        <span>Barangay {{$barangay->name}}</span> <br />
                    </h2>
                    <br />
                    <br />
                    <br />
                    <br />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- about-area -->
<section class="about about__style__two">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner__img">
                    <img src="{{asset('homepage/assets/img/banner/banner_img.png')}}" alt="" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <h2 class="title">Mission</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{asset('homepage/assets/img/icons/about_icon.png')}}" alt="" />
                        </div>
                        <div class="about__exp__content">
                            <p>
                                <span>Calauan as a premier town of Laguna with a peaceful,
                                    dynamic and self-reliant community unified by common
                                    goals and ideals with God-loving, morally upright,
                                    healthy people that promotes ecologically balanced
                                    environment, a center of commerce, trade and
                                    agro-industrial development under principled and
                                    decisive leaders.</span>
                                <br />
                            </p>
                        </div>
                    </div>

                    <div class="section__title">
                        <h2 class="title">Vision</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{asset('homepage/assets/img/icons/about_icon.png')}}" alt="" />
                        </div>
                        <div class="about__exp__content">
                            <p>
                                <span>Pursue a sustainable agro-industrial development and a
                                    healthy community with a balanced ecology led by honest
                                    and dedicated public servants working towards economic
                                    growth.</span>
                                <br />
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about-area-end -->

<section class="services__style__two">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="section__title text-center">
                    <span class="sub-title">Officials</span>
                    <h2 class="title">Organizational Chart</h2>
                </div>
            </div>
        </div>
        <div class="services__style__two__wrap">
            <div class="row gx-0">
                @foreach ($officials as $official)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="services__style__two__item">
                        <div class="services__style__two__content text-center">
                            <div class="col-sm-12">
                                <img src="{{asset('homepage/assets/img/images/about_img.png')}}" alt="">
                            </div>
                            <h3 class="title"><a href="services-details.html">{{$official->first_name}}
                                    {{$official->middle_name}} {{$official->last_name}}</a></h3>
                            <h3>{{$official->position}}</h3>
                            <a href="services-details.html" class="services__btn"><i
                                    class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
@endsection
