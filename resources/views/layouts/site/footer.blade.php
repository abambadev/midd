<!-- footer-area-start -->
<div class="footer-area blue-bg pt-75" id="footer">
    <div class="container">
        <div class="footer-address-area pb-20">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="footer-address-wraaper mb-30">
                        <div class="footer-address-icon">
                            <i class="ti-headphone-alt"></i>
                        </div>
                        <div class="footer-address-text">
                            <span>+ 225 47 790 119</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="footer-address-wraaper mb-30">
                        <div class="footer-address-icon">
                            <i class="ti-email"></i>
                        </div>
                        <div class="footer-address-text">
                            <span>support@lifesoftci.com</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="footer-address-wraaper mb-30">
                        <div class="footer-address-icon">
                            <i class="ti-home"></i>
                        </div>
                        <div class="footer-address-text">
                            <span>Yop, Abidjan, Côte d'Ivoire</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-middle-area pt-80 pb-45">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="footer-middle-wrapper mb-30">
                        <div class="footer-logo">
                            <a href="{{ route('Site-HomeGetShow') }}"><img src="/file/image/website/logo/midd.jpeg"
                                    alt="Logo MIDD" style="width: 200px; height: 200px; margin-top: -25px" /></a>
                        </div>
                        <div class="footer-middle-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Minima maxime quam architecto quo inventore harum ex magni, dicta impedit etc... .</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="footer-wrapper mb-30">
                        <h4 class="footer-title">Contactez-nous</h4>
                        <form action="{{ route('Site-HomePostShow') }}" id="question-form" method="post">
                            @csrf
                            <input type="hidden" name="recaptcha" id="recaptcha">
                            <div class="row">
                                <div class="col-xl-12 col-md-12">
                                    <input name="name" placeholder="Nom :" type="text" required>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <input name="email" placeholder="Email :" type="email" required>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <input name="phone" placeholder="Téléphone :" type="number" required>
                                </div>
                                <div class="col-md-12 text-center">
                                    <textarea name="msg" cols="30" rows="10" placeholder="Message : "
                                        required></textarea>
                                    <button type="submit">Envoyer</button>
                                </div>
                            </div>
                            <p class="ajax-response"></p>
                        </form>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="footer-middle-wrapper">
                        <h4 class="footer-title">Suivez-nous</h4>
                        <div class="footer-icon">
                            <a href="https://www.facebook.com/midd"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/midd"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.youtube.com/channel/UCBqXWKEZZ4d8ZfcgWE681ZQ"><i
                                    class="fab fa-youtube"></i></a>
                            <a href="https://www.linkedin.com/company/midd"><i
                                    class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="footer-wrapper mb-30" style="margin-top: 25px;">
                        <!--<h4 class="footer-title">Newsletter</h4>-->
                        <div class="footer-info">
                            <p>
                                Inscrivez-vous à notre newsletter pour être informé de toutes nos promotions et
                                dernières actualités.
                            </p>
                        </div>
                        <div class="subscribe-form">
                            <center>
                                <form action="#">
                                    <input placeholder="Entre votre email" type="email">
                                    <a href="" class="btn">S'inscrire</a>
                                </form>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area pt-20 pb-20">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="copyright">
                        <p>
                            <i class="fa fa-copyright"></i>
                            {{ date('Y')}} | Développé par
                            <a href="https://lifesoftci.com">LifeSoft-ci</a>
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="footer-bottom-img text-md-right">
                        <img src="/file/image/website/footer/footer.png" alt="footer bg" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer-area-end -->
