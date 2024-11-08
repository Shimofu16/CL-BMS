@extends('frontend.municipality.nagcarlan.master')
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
                    <img src="{{asset('homepage/assets/img/banner/banner.webp')}}" alt="" />
                </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="banner__content">
                    <h2 class="title wow fadeInUp" data-wow-delay=".2s">
                        <span>Welcome to </span> <br />
                        <span>Nagcarlan</span> <br />
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll__down">
        <a href="#about" class="scroll__link">Scroll down</a>
    </div>
</section>

<section class="portfolio__inner">
    <div class="container">

        <div class="portfolio__inner__item grid-item cat-one">
            <div class="row gx-0 align-items-center">
                <div class="col-lg-6 col-md-10">
                    <div class="portfolio__inner__thumb">
                        <a href="#">
                            <img src="{{asset('homepage/assets/img/banner/banner.webp')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10">
                    <div class="portfolio__inner__content">
                        <h2 class="title">Vision</h2>
                        <p>Nagcarlan as a center for agriculture, tourism and cold-spring resorts, reside by people
                            who are God-loving, hospitable, and just; having a society that is healthy, peaceful,
                            resilient, environmentally sustainable, and economically competitive; and governed by
                            leaders who are visionary, competent, and honest.</p> <br>
                        <h2 class="title">Mission</h2>
                        <p>To meaningfully and equitable improve the quality of life of Nagcarlangins by providing
                            the necessary social services, effectively implementing public policies, applying best
                            practices, and launching sustainable programs through honest, competent, accountable,
                            and compassionate local government.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio__inner__item grid-item cat-one">
            <div class="row gx-0 align-items-center">
                <div class="col-lg-6 col-md-10">
                    <div class="portfolio__inner__thumb">
                        <a href="portfolio-details.html">
                            <img src="{{asset('homepage/assets/img/banner/banner_img.webp')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10">
                    <div class="portfolio__inner__content">
                        <h2 class="title">Mandate</h2>
                        <p>The Municipal Government of Nagcarlan, Laguna shall ensure and support, among other
                            things, the preservation and enrichment of culture, promote health and safety, enhance
                            the right of the people to a balanced ecology, encourage and support the development of
                            appropriate and self-reliant scientific and technological capabilities, improve public
                            morals, enhance economic prosperity and social justice, promote full employment among
                            their residents, maintain peace and order, and preserve the comfort and convenience of
                            their inhabitants.</p> <br>

                        <h2 class="title"><a href="portfolio-details.html">Service Pledge</a></h2>
                        <p>To have a sustained economic growth, and agro-industrial and institutional development
                            with transparent, accountable and participatory governance to meet the basic needs of
                            the growing population while enhancing the socio-cultural values of Nagcarlan in and
                            their natural resources and environment.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
