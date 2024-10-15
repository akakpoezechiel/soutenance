<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" />
    {{-- <script src="https://kit.fontawesome.com/5ddddbe850.js" rossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="./">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title></title>
</head>

<body>
    <section class="first">
        <div class="accueil">
            <div class="nav">
                <div>
                <a href="{{ route('first') }}" id="kabaa">Kabaa</a>
              </div>
                
                <div class="aide">
                  <a href="{{ route('signup') }}">INSCRIRE MON RESTAURANT</a> | <a href="{{ route('publicit') }}">PAGE PUBLICITAIRE</a>
                </div>
              </div>
            <div class="buttons">
                <div>
                    <button class="télécharger">
                        <a href=""> télécharger l'application</a>
                    </button>
                    <button class="connexion"><a href="{{ route('authentication') }}">Connexion</a></button>
                </div>
            </div>
            <div class="publicitimg">
                <div>
                    <div >
                        <marquee direction="right">Nos prix à votre merci pour donner goût à vos saveurs!</marquee>
                    </div>
                    <div>
                        <marquee direction="left">Nos prix à votre merci pour donner goût à vos saveurs!</marquee>
                    </div>
                </div>

            </div>
            <div class="publicitéContent">
                <div class="publicité">
                    <p>Obtenez des reductions <br> jusqu'à 50%</p>
                </div>
            </div>
        </div>
    </section>
    <section class="test">
        <div class="middle">
            <!-- <div> -->
            <div data-aos="fade-left" data-aos-anchor-placement="bottom-center">

                <div class="card">
                    <div class="pizzeria">
                        <div>
                            <img src="./image/outdoor-dining-1846137_1280.jpg" alt="" />
                        </div>
                        <div class="pizzeriaText">

                            <div class="pizzeriaText">

                                <i>pizzeria</i> <br />
                                <span>Restaurant de la paix</span>
                                <p>
                                    un cadre idéal pour vos <br />
                                    épanouissements<br />
                                    et l’expérience de la saveur. <br />
                                    Prix moyen: 2500frs
                                </p>
                            </div>
                        </div>
                        <div class="divreduction">
                            <div class="reduction">
                                <p>jusqu'à -50%</p>
                            </div>
                        </div>
                    </div>
                    <div class="pizzeria">
                        <div>
                            <img src="./image/outdoor-dining-1846137_1280.jpg" alt="" />
                        </div>
                        <div class="pizzeriaText">

                            <div class="pizzeriaText">

                                <div class="pizzeriaText">

                                    <i>pizzeria</i> <br />
                                    <span>Restaurant de la paix</span>
                                    <p>
                                        un cadre idéal pour vos <br />
                                        épanouissements<br />
                                        et l’expérience de la saveur. <br />
                                        Prix moyen: 2500frs
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="divreduction">
                            <div class="reduction">
                                <p>jusqu'à -50%</p>
                            </div>
                        </div>
                    </div>
                    <div class="pizzeria">
                        <div>
                            <img src="./image/outdoor-dining-1846137_1280.jpg" alt="" />
                        </div>
                        <div class="pizzeriaText">

                            <div class="pizzeriaText">

                                <div class="pizzeriaText">

                                    <i>pizzeria</i> <br />
                                    <span>Restaurant de la paix</span>
                                    <p>
                                        un cadre idéal pour vos <br />
                                        épanouissements<br />
                                        et l’expérience de la saveur. <br />
                                        Prix moyen: 2500frs
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="divreduction">
                            <div class="reduction">
                                <p>jusqu'à -50%</p>
                            </div>
                        </div>
                    </div>
                    <div class="pizzeria">
                        <div>
                            <img src="./image/outdoor-dining-1846137_1280.jpg" alt="" />
                        </div>
                        <div class="pizzeriaText">

                            <div class="pizzeriaText">

                                <div class="pizzeriaText">

                                    <i>pizzeria</i> <br />
                                    <span>Restaurant de la paix</span>
                                    <p>
                                        un cadre idéal pour vos <br />
                                        épanouissements<br />
                                        et l’expérience de la saveur. <br />
                                        Prix moyen: 2500frs
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="divreduction">
                            <div class="reduction">
                                <p>jusqu'à -50%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div data-aos="fade-right">


                <div class="card">
                    <div class="pizzeria">
                        <img src="./image/outdoor-dining-1846137_1280.jpg" alt="" />
                        <div class="pizzeriaText">

                            <div class="pizzeriaText">

                                <i>pizzeria</i> <br />
                                <span>Restaurant de la paix</span>
                                <p>
                                    un cadre idéal pour vos <br />
                                    épanouissements<br />
                                    et l’expérience de la saveur. <br />
                                    Prix moyen: 2500frs
                                </p>
                            </div>
                        </div>
                        <div class="divreduction">
                            <div class="reduction">
                                <p>jusqu'à -50%</p>
                            </div>
                        </div>
                    </div>
                    <div class="pizzeria">
                        <img src="./image/outdoor-dining-1846137_1280.jpg" alt="" />
                        <div class="pizzeriaText">

                            <div class="pizzeriaText">

                                <i>pizzeria</i> <br />
                                <span>Restaurant de la paix</span>
                                <p>
                                    un cadre idéal pour vos <br />
                                    épanouissements<br />
                                    et l’expérience de la saveur. <br />
                                    Prix moyen: 2500frs
                                </p>
                            </div>
                        </div>
                        <div class="divreduction">
                            <div class="reduction">
                                <p>jusqu'à -50%</p>
                            </div>
                        </div>
                    </div>
                    <div class="pizzeria">
                        <img src="./image/outdoor-dining-1846137_1280.jpg" alt="" />
                        <div class="pizzeriaText">

                            <div class="pizzeriaText">

                                <i>pizzeria</i> <br />
                                <span>Restaurant de la paix</span>
                                <p>
                                    un cadre idéal pour vos <br />
                                    épanouissements<br />
                                    et l’expérience de la saveur. <br />
                                    Prix moyen: 2500frs
                                </p>
                            </div>
                        </div>
                        <div class="divreduction">
                            <div class="reduction">
                                <p>jusqu'à -50%</p>
                            </div>
                        </div>
                    </div>
                    <div class="pizzeria">
                        <img src="image/outdoor-dining-1846137_1280.jpg" alt="" />
                        <div class="pizzeriaText">

                            <div class="pizzeriaText">

                                <i>pizzeria</i> <br />
                                <span>Restaurant de la paix</span>
                                <p>
                                    un cadre idéal pour vos <br />
                                    épanouissements<br />
                                    et l’expérience de la saveur. <br />
                                    Prix moyen: 2500frs
                                </p>
                            </div>
                        </div>
                        <div class="divreduction">
                            <div class="reduction">
                                <p>jusqu'à -50%</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div data-aos="fade-left">
                <div class="card">
                    <div class="pizzeria">
                        <img src="./image/outdoor-dining-1846137_1280.jpg" alt="" />
                        <div class="pizzeriaText">

                            <div class="pizzeriaText">

                                <i>pizzeria</i> <br />
                                <span>Restaurant de la paix</span>
                                <p>
                                    un cadre idéal pour vos <br />
                                    épanouissements<br />
                                    et l’expérience de la saveur. <br />
                                    Prix moyen: 2500frs
                                </p>
                            </div>
                        </div>
                        <div class="divreduction">
                            <div class="reduction">
                                <p>jusqu'à -50%</p>
                            </div>
                        </div>
                    </div>
                    <div class="pizzeria">
                        <img src="./image/outdoor-dining-1846137_1280.jpg" alt="" />
                        <div class="pizzeriaText">

                            <div class="pizzeriaText">

                                <i>pizzeria</i> <br />
                                <span>Restaurant de la paix</span>
                                <p>
                                    un cadre idéal pour vos <br />
                                    épanouissements<br />
                                    et l’expérience de la saveur. <br />
                                    Prix moyen: 2500frs
                                </p>
                            </div>
                        </div>
                        <div class="divreduction">
                            <div class="reduction">
                                <p>jusqu'à -50%</p>
                            </div>
                        </div>
                    </div>
                    <div class="pizzeria">
                        <img src="./image/outdoor-dining-1846137_1280.jpg" alt="" />
                        <div class="pizzeriaText">

                            <div class="pizzeriaText">

                                <i>pizzeria</i> <br />
                                <span>Restaurant de la paix</span>
                                <p>
                                    un cadre idéal pour vos <br />
                                    épanouissements<br />
                                    et l’expérience de la saveur. <br />
                                    Prix moyen: 2500frs
                                </p>
                            </div>
                        </div>
                        <div class="divreduction">
                            <div class="reduction">
                                <p>jusqu'à -50%</p>
                            </div>
                        </div>
                    </div>
                    <div class="pizzeria">
                        <img src="image/outdoor-dining-1846137_1280.jpg" alt="" />
                        <div class="pizzeriaText">

                            <div class="pizzeriaText">

                                <i>pizzeria</i> <br />
                                <span>Restaurant de la paix</span>
                                <p>
                                    un cadre idéal pour vos <br />
                                    épanouissements<br />
                                    et l’expérience de la saveur. <br />
                                    Prix moyen: 2500frs
                                </p>
                            </div>
                        </div>
                        <div class="divreduction">
                            <div class="reduction">
                                <p>jusqu'à -50%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
        <br> <br>
        
        </div>


    </section>
    <div class="footer">
        <div>
            <span>Télécharger note application</span>
            <a href=""><img src="./image/téléchargement-removebg-preview.png" alt=""></a>
        </div>
        <div>
            <a href=""><span>A propos</span> </a>
            <a href=""><span>Contacts</span></a>
            <a href=""> <span>Vous êtes restaurant?</span></a>
            <a href=""><span>Blog</span></a>
            <a href=""><span>Restaurants à proximité</span></a>

        </div>
        <div>
            <a href=""><span>Programme de fidélité</span> </a>
            <a href=""><span>Conditions d’utilisation</span></a>
            <a href=""> <span>Accord d’utilisation de cookies</span></a>
            <a href=""><span>Nous recrutons</span></a>
        </div>
        {{-- <p>�� 2021 Kabaa. Tous droits réservés.</p> --}}
        <div class="social">
            <a href="#"><i class="fab fa-facebook-square"></i></a>
            <a href="#"><i class="fab fa-twitter-square"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
