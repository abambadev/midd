@extends('layouts.site.master')

@section('content')

<!-- slider-start -->
<div class="slider-area pos-relative blue-gradient wave-shape">
    <div class="slider-active">
        <div class="single-slider slider11-height d-flex align-items-center"
            style="background-image:url(file/image/website/slider/2.jpeg); height: 400px !important">
            <div class="container">
                <div class="row ">
                    <div class="col-xl-7 col-lg-7">
                        <div class="slider-content pt-70">
                            <h1 data-animation="fadeInUp" data-delay=".3s">Mouvement des Instituteurs pour la Défense de leur Droits</h1>
                            <a class="btn" data-animation="fadeInRight" data-delay=".7s"
                            href="{{ route('Site-RegisterGetShow') }}">J'adhère Maintenant</a>
                        </div>
                    </div>
                    {{-- <div class="col-xl-5 d-none d-md-none d-lg-none d-xl-block">
                        <div class="slider-img" data-animation="fadeInUp" data-delay=".9s">
                            <img src="/file/image/website/slider/2.jpg" alt="slide 1" />
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider-start -->
<!-- we-are-area-start -->
<div class="we-are-area pt-120 pb-90" id="about">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8">
                <div class="we-are-wrapper mb-30">
                    <div class="we-are-text">
                        <h2>Nous sommes le meilleur mouvement pour porter assistance aux droits des instituteurs.</h2>
                        <p>Notre mission est claire: vous aider à placer votre commerce, votre activité ou vos données
                            en ligne avec
                            de la facilité, de la performance et de la sécurité.
                            Ainsi, chaque jour, nos ingénieurs travaillent dur pour trois choses essentielles pour vous:
                            <ul class="custom-list">
                                <li>Vous faire profiter de nouvelles fonctionnalités utiles afin de donner de la
                                    performance à vos
                                    applications ou permettre à votre site d'être trouvé facilement sur le net.</li>
                                <li>Facilité la vente de vos services en ligne avec une infrastructure technologique
                                    robuste,
                                    surveillance de performance et d'application 24h/24</li>
                                <li>Réduire les temps de configurations de vos serveurs en s'occupant tout ce qui vous
                                    semble trop
                                    technique.</li>
                            </ul>

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="we-are-img mb-30">
                    <img src="/file/image/website/slider/1.jpeg" style="height:500px" alt="1" />
                    <!--<img src="/file/image/website/bg/1.png" alt="1" />-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- we-are-area-end -->

<!-- purchase-area-start -->
<div class="purchase-area pt-65 pb-50" style="background-image:url(file/image/website/bg/bg1.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-9">
                <div class="purchase-text mb-20">
                    <h2>Vous recherchez une assistance pour reclamer vos droits ?</h2>
                    <span>Nous sommes à votre service!</span>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3">
                <div class="purchase-button text-md-right mb-20">
                    <a class="btn" href="{{ route('Site-RegisterGetShow') }}">Rejoingnez nous</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- purchase-area-end -->

<!-- service-area-start -->
<div class="service-area pt-110 pb-55" id="services">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                <div class="section-title text-center mb-55">
                    <h2>Nos services</h2>
                    <p class="text-center">MIDD vous offre une gamme complète de services pour revendiquer les droits des Instituteurs.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="service-wrapper text-center mb-65">
                    <div class="service-img">
                        <img src="/file/image/website/service/service1.png" alt="service1" />
                    </div>
                    <div class="service-text">
                        <h4>Adhésion</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Minima maxime quam architecto quo
                            inventore harum ex magni, dicta impedit. </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="service-wrapper text-center mb-65">
                    <div class="service-img">
                        <img src="/file/image/website/service/service2.png" alt="service2" />
                    </div>
                    <div class="service-text">
                        <h4>Devenir Membre</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Minima maxime quam architecto quo
                            inventore harum ex magni, dicta impedit. </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="service-wrapper text-center mb-65">
                    <div class="service-img">
                        <img src="/file/image/website/service/service3.png" alt="service3" />
                    </div>
                    <div class="service-text">
                        <h4>Reclamation de Droits</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Minima maxime quam architecto quo
                            inventore harum ex magni, dicta impedit. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service-area-end -->

<!-- service-list-area-start -->
<div class="service-list-area pt-110 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-5">
                <div class="service-list-img mb-30">
                    <img src="/file/image/website/slider/1.jpeg" style="width:500px; height:500px" alt="bg1" />
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7">
                <div class="service-list-wraaper mb-30">
                    <div class="service-list-text">
                        <h2>Mouvement des Instituteurs pour la Défense de leurs Droits !</h2>
                        <p>Nous surveillons vos dorits 24 heures sur 24 et 7 jours sur 7, en utilisant les dernières
                            technologies
                            disponibles, et appliquons des politiques de sécurité strictes. Ainsi cela vous garantit:
                        </p>
                        <br/>
                    </div>
                    <ul class="custom-list">
                        <li>adipisicing elit. Minima maxime quam architecto </li>
                        <li>adipisicing elit. Minima maxime quam architecto </li>
                        <li>adipisicing elit. Minima maxime quam architecto </li>
                        <li>adipisicing elit. Minima maxime quam architecto </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service-list-area-end -->

<!-- testimonila-area-start -->
<div class="testimonial-area gray-bg pt-110 pb-120" id="temoignage">
    <div class="container">
        <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
            <div class="section-title text-center mb-60">
                <h2>Nos adhérents parlent de nous</h2>
                <p class="text-center">
                    Réjoignez notre mouvement pour bénéficier de tous les advantages du
                        des<span style="color: #1d1d92; font-weight: bold">  Instituteurs pour la Défense de leurs Droits.</span>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="testimonial-active owl-carousel">
                <div class="col-xl-12">
                    <div class="testimonial-wrapper">
                        <div class="testimonial-text">
                            <p>"En tant que chef entreprise, la performance et la sécurité des données sont mes
                                principaux critères
                                pour le choix de mon d'un hébergeur. Ce que je préfère avec les offres de Wini Hosting
                                c’est d’avoir
                                réussi à ajouter à cela la simplicité ! Avec cet hébergeur, on ne se prend pas la tête,
                                l’espace client
                                est super simple tout comme la configuration des emails, alors que je n’avais aucune
                                connaissance, j’ai
                                créé mes 15 adresses emails en moins de 15 minutes et tout fonction nickel !"</p>
                        </div>
                        <div class="testimonial-content">
                            <div class="testimonial-img">
                                <img src="/file/image/website/testimonial/1.png" alt="1" />
                            </div>
                            <div class="testimonial-info">
                                <h4>Adama BAMBA</h4>
                                <span>Entrepreneur</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="testimonial-wrapper">
                        <div class="testimonial-text">
                            <p>"J'ai hébergé plusieurs sites chez Wini Hosting et je n'ai jamais eu de problème
                                particulier. A chaque
                                fois que cela était nécessaire, ils m'ont toujours assisté de bout en bout jusqu’à la
                                prise en compte de
                                ma demande. J'ai essayé beaucoup d'hébergeur et de mon expérience chez Wini Hosting est
                                très clairement
                                mon préféré. Une des choses qui me marque, c’est la simplicité et la robustesse des
                                outils qui sont mis
                                à ma disposition à travers le panel d’administration ! "</p>
                        </div>
                        <div class="testimonial-content">
                            <div class="testimonial-img">
                                <img src="/file/image/website/testimonial/2.png" alt="2" />
                            </div>
                            <div class="testimonial-info">
                                <h4>Assouman OUATTARA</h4>
                                <span>Instituteur Abengourou</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="testimonial-wrapper">
                        <div class="testimonial-text">
                            <p>"En tant que developpeur, Les serveurs cloud managés me permettent d’héberger les sites
                                de mes clients
                                à un excellent rapport qualité-prix. Peu de downtime, je peux me consacrer à 100% à
                                l'acquisition de
                                leads qualifés pour mes clients à l'aide de Google AdWords. L'interface de gestion est
                                très intuitive et
                                bien réalisée. Le support est super réactif en cas de problème. Bravo les gars vous êtes
                                à l'écoute du
                                client et ceux jusqu'à prendre en compte toutes les demandes! "</p>
                        </div>
                        <div class="testimonial-content">
                            <div class="testimonial-img">
                                <img src="/file/image/website/testimonial/3.png" alt="3" />
                            </div>
                            <div class="testimonial-info">
                                <h4>David KOFFI</h4>
                                <span>Developpeur</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonila-area-end -->

@endsection
