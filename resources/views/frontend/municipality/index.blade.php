@extends('frontend.municipality.master')
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
                        <span>{{$city->value}}</span> <br />
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll__down">
        <a href="#about" class="scroll__link">Scroll down</a>
    </div>
</section>

<!-- about-area -->
<section id="aboutSection" class="about about__style__two">
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

@endsection
