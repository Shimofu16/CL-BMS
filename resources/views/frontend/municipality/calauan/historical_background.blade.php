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
                    <h2 class="title">Historical Background</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Historical Background
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
                <div class="services__details__thumb">
                    <img src="{{asset('homepage/assets/img/images/historical_detail_1.png')}}" alt="" />
                </div>
                <div class="services__details__content">
                    <p>
                        The fertile soil of Calauan attracted attention of Captain
                        Juan de Salcedo, when he passed through Laguna and Tayabas
                        (now Quezon) on his way to Bicol Region in 1570. Ten years
                        later, Spanish authorities established a town government two
                        kilometers from the site of the present Poblacion, in what is
                        now Barrio Mabacan. They called the townsite “Calauan”
                        (tagalong word for rust). Following an epidemic in 1703, the
                        town was moved to its present site at the fork of three
                        roads—now to the southwest leading to San Pablo City, the
                        other southeastward to Sta. Cruz, the provincial capital, and
                        the third going North to Manila. It is said that a rich woman
                        of Calauan paid for the construction of a concrete church in
                        1787, and the archbishop in Manila installed San Isidro
                        Labrador and San Roque, whose feast day of May 15, as Patron
                        Saint of the town.
                    </p>
                    <p>
                        At the turn of the 18th century, when Bay was designated as
                        the provincial capital of Laguna, Calauan became a sitio of
                        Bay. Merchants going to Southern Luzon usually passes through
                        Bay and Calauan. One of them, an opulent Spaniard by the name
                        of Iñigo in 1812 bought large tracts of land in Calauan. The
                        landholdings of Iñigo and, later, of his heirs were so vast
                        that many portions were still unsettled. The property was and
                        still is, known as Hacienda Calauan. About a century later,
                        the people of Calauan fought a “guardia civil” during the
                        Philippine Revolution. Basilio Geiroza (better known as
                        Cabesang Basilio) and his men routed a battalion of “guardia
                        civiles” in a five-hour battle in Bario Cupangan (now Lamot I)
                        in December 1897.
                    </p>
                    <p>
                        During the subsequent Philippine-American hostilities, Calauan
                        patriots fought numerically superior forces of General Otis in
                        Barrio San Diego of San Pablo. With the establishment of
                        civilian authority in Calauan in 1902, the Americans assigned
                        Mariano Marfori as first “presidente”. Hacienda Calauan
                        finance the construction of a hospital in 1926, and Mariano O.
                        Marfori, Jr. son of the first municipal presidente, as the
                        hospital director and the resident physician, respectively.
                        (The hospital, unfortunately, was destroyed in World War II
                        and has not been rebuilt since then).
                    </p>
                    <p>
                        In 1939, by the request of President Quezon, Doña Margarita
                        Roxas vda. De Soriano, granddaughter of the Spaniard Inigo,
                        subdivided Hacienda Calauan and sold it to the tenants, part
                        of what remained was converted into a rest house and a
                        swimming pool and it became one of the tourist attractions
                        until 1956.
                    </p>
                    <div class="services__details__img">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="{{asset('homepage/assets/img/images/plaza.jpg')}}" alt="" />
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('homepage/assets/img/images/san-isidro-1.jpg')}}" alt="" />
                            </div>
                        </div>
                    </div>
                    <p>
                        The town got its name from the term “Kalawang” which means
                        rust. It was claimed that for centuries lumps of rust surfaced
                        and drifted gently on a body of water called Macalawang
                        Spring. This spring was situated nearly three (3) kilometers
                        from the town proper. Another interesting premise upon which
                        the name Calauan was chosen has a little story to tell… During
                        the early part of Spanish sovereignty over the Philippines,
                        there was a village located west of the town where an old man
                        found a cross made of stone. Since Christianity was being
                        introduced in the town the people felt they should treat such
                        cross with reverence. They held a mass at the spot where the
                        stone cross was found. To the surprised of all, during the
                        celebration of the mass, water sprang out from the exact place
                        where the stone was located. The water was yellowish and
                        “rusty”.
                    </p>
                    <p>
                        To commemorate this mysterious event, the people built a
                        church on this site. They saw to it that altar was constructed
                        right on the spot where the water had sprung out. The village
                        had grown larger and then populated and then became the town
                        proper. Being mostly farmers, the people chose to honor San
                        Isidro Labrador and San Roque as their Patron Saints. They
                        celebrate the PINYA FESTIVAL every 15th of May. carried out to
                        reach the desired ends
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
