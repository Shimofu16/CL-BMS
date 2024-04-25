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
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
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
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                </p>
                <a href="{{route('home.municipality')}}">Visit</a>
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
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
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
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
                </p>
                <a href="">Visit</a>
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
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
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
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
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
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, neque?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, ex.
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
            <img src="{{ asset('home/logo/alaminos.png') }}">
            <div class="content">
                Alaminos
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('home/logo/calauan.png') }}">
            <div class="content">
                Calauan
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('home/logo/liliw.png') }}">
            <div class="content">
                Liliw
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('home/logo/nagcarlan.png') }}">
            <div class="content">
                Nagcarlan
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('home/logo/rizal.png') }}">
            <div class="content">
                Rizal
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('home/logo/san_pablo.png') }}">
            <div class="content">
                San Pablo
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('home/logo/victoria.png') }}">
            <div class="content">
                Victoria
            </div>
        </div>
    </div>
</div>

@endsection
