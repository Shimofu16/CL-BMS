@extends('frontend.layouts.master')
@section('title')
Home
@endsection
@section('content')

<!-- slider -->

<div class="slider">
    <!-- list Items -->
    <div class="list">
        <div class="item active">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49429.3162769896!2d121.22721321677535!3d14.046224661959391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd68306a6d54d1%3A0xef3ccbe688f795d0!2sAlaminos%2C%20Laguna!5e1!3m2!1sen!2sph!4v1712915176707!5m2!1sen!2sph"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="content">
                <p>Municipality of</p>
                <h2>Alaminos</h2>
                <p>
                    Known for its lush agricultural land, Alaminos is a quiet town famous for coconut and rice
                    production. It offers a glimpse of rural Filipino life and is close to natural attractions like the
                    nearby Mount Makiling.
                </p>
                <a href="">Visit</a>
            </div>
        </div>
        <div class="item">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d67949.35909444749!2d121.2500729287456!3d14.135941510987143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd5ef4630453d5%3A0xae225ae990cc2037!2sCalauan%2C%20Laguna!5e1!3m2!1sen!2sph!4v1712916499686!5m2!1sen!2sph"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="content">
                <p>Municipality of</p>
                <h2>Calauan</h2>
                <p>
                    2nd class municipality in the province of Laguna, Philippines. Calauan is known for its pineapple
                    farms and scenic landscapes. The town celebrates the Pineapple Festival annually, highlighting its
                    agricultural produce and cultural heritage.
                </p>
                <a href="{{route('home.calauan')}}">Visit</a>
            </div>
        </div>
        <div class="item">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d67950.55470146479!2d121.36681566491492!3d14.131937966342687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd59ffe9dad0a9%3A0x709376031e6ded12!2sLiliw%2C%20Laguna!5e1!3m2!1sen!2sph!4v1712916529944!5m2!1sen!2sph"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="content">
                <p>Municipality of</p>
                <h2>Liliw</h2>
                <p>
                    Liliw, also known as the "Tsinelas (Slipper) Capital of Laguna," is famous for its quality
                    hand-crafted slippers and shoes. The town is also known for its historic Liliw Church and beautiful
                    cold springs.
                </p>
                <a href="">Visit</a>
            </div>
        </div>
        <div class="item">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d69580.67294414405!2d121.32368431806584!3d14.150290632519543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd5a275e3d55af%3A0x333533da68aa2620!2sNagcarlan%2C%20Laguna!5e1!3m2!1sen!2sph!4v1712916555448!5m2!1sen!2sph"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="content">
                <p>Municipality of</p>
                <h2>Nagcarlan</h2>
                <p>
                    This historic town is home to the famous Nagcarlan Underground Cemetery, a unique Spanish-era burial
                    site. It’s surrounded by scenic mountains and known for its agriculture and beautiful waterfalls.
                </p>
                <a href="{{route('home.nagcarlan')}}">Visit</a>
            </div>
        </div>
        <div class="item">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d32719.014882937066!2d121.39085978482703!3d14.100392085999498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd5a545245cae9%3A0xbfa3cc4dfcd174d0!2sRizal%2C%20Laguna!5e1!3m2!1sen!2sph!4v1712916586683!5m2!1sen!2sph"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="content">
                <p>Municipality of</p>
                <h2>Rizal</h2>
                <p>
                    A small, agricultural town in Laguna, Rizal is largely residential and offers a peaceful
                    environment. The town has scenic rice fields and farmlands, maintaining a laid-back rural
                    atmosphere.
                </p>
                <a href="">Visit</a>
            </div>
        </div>
        <div class="item">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d135946.52346266503!2d121.25270907424823!3d14.055690362038897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd5c96860a894b%3A0xfa9e0f05004f4aca!2sSan%20Pablo%20City%2C%20Laguna!5e1!3m2!1sen!2sph!4v1712916613957!5m2!1sen!2sph"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="content">
                <p>Municipality of</p>
                <h2>San Pablo</h2>
                <p>
                    Known as the "City of Seven Lakes," San Pablo is a highly urbanized area famous for its beautiful
                    lakes, which are popular spots for picnics and nature viewing. It's one of Laguna’s oldest cities
                    with a rich history and vibrant cultural scene.
                </p>
                <a href="">Visit</a>
            </div>
        </div>
        <div class="item">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27500.668694813485!2d121.32406334037123!3d14.209702980951965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397e1dfc9306681%3A0xba4fc810c553652e!2sVictoria%2C%20Laguna!5e1!3m2!1sen!2sph!4v1712916646056!5m2!1sen!2sph"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="content">
                <p>Municipality of</p>
                <h2>Victoria</h2>
                <p>
                    Often referred to as the "Duck Raising Capital of the Philippines," Victoria is famous for its
                    duck-raising industry and products, such as balut (fertilized duck egg). The town also celebrates
                    the Itik-Itik Festival, showcasing its cultural ties to duck farming.
                </p>

                <a href="">Visit</a>
            </div>
        </div>
    </div>

    <!-- button arrows -->
    <div class="arrows">
        <button id="prev">
            <</button>
                <button id="next">></button>
    </div>

    <!-- thumbnail -->
    <div class="thumbnail">
        <div class="item active">
            <img src="{{ asset('home/logo/alaminos.webp') }}">
            <div class="content">
                Alaminos
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('home/logo/calauan.webp') }}" alt="Calauan Logo"
                onclick="window.location.href='{{ route('home.calauan') }}'">
            <div class="content">
                Calauan
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('home/logo/liliw.webp') }}">
            <div class="content">
                Liliw
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('home/logo/nagcarlan.webp') }}"
                onclick="window.location.href='{{ route('home.nagcarlan') }}'">
            <div class="content">
                Nagcarlan
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('home/logo/rizal.webp') }}">
            <div class="content">
                Rizal
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('home/logo/san_pablo.webp') }}">
            <div class="content">
                San Pablo
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('home/logo/victoria.webp') }}">
            <div class="content">
                Victoria
            </div>
        </div>
    </div>
</div>

@endsection
