<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    {{-- <script src="https://kit.fontawesome.com/5ddddbe850.js" rossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="./">
    <title></title>

    <style>
        .swiper {
            width: 100%;
            margin-top: 4rem;
            display: flex;
            border: solid black 0.5;
            background-color: red;

        }

        .swiper-slide {
            max-width: 350px;
        }

        .menu__card img {
            width: 350px;
            height: 300px;
        }
    </style>

</head>

<body>
    <section class="first">
        <div class="accueil">
            <div class="nav">
                <div>
                    <a href="{{ route('first') }}" id="kabaa">Kabaa</a>
                </div>

                <div class="aide">
                    <a href="{{ route('signup') }}">INSCRIRE MON RESTAURANT</a> | <a href="{{ route('publicit') }}">PAGE
                        PUBLICITAIRE</a>
                </div>
            </div>
            <div class="buttons">
                <div>
                    <button class="télécharger">
                        <a href=""> l'application</a>
                    </button>
                    <button class="connexion"><a href="{{ route('authentication') }}">Connexion</a></button>
                </div>
            </div>
            <div class="accueilimg">
                <p>
                    Découvrez et reservez les meilleurs <br />
                    restaurants
                </p>

                <div>
                    <input type="text" placeholder="Rechercher un restaurant" />
                    <button class="connexion"><a href="">Rechercher</a></button>
                </div>
            </div>
        </div>
    </section>
    <section class="first">
        <div class="middle">
            <!-- <div> -->
            <div class="bgGreen">
                <p>
                    Découvrez le top 100 près <br />
                    de vous
                </p>
                <img src="./image/chiken-bucket-7201681_640-removebg-preview.png" alt="" />
            </div>
            {{-- <div class="card">
                @foreach ($products as $product)
                    <div class="pizzeria">
                        <img src="{{ asset('db/' . $product->image) }}" alt="{{ $product->nom }}" />
                        <div class="pizzeriaText">

                            <h3>{{ $product->name }}</h3>

                            <p>
                                {!! $product->long_description !!}
                            </p>
                            <p>
                                {{ $product->short_description }}
                            </p>
                            <p>
                            <h3>prix</h3> <br>
                            {{ $product->price }} <i>fcfa</i>
                            </p>
                        </div>

                        <div class="divreduction">
                            <div class="reduction">
                                <p>jusqu'à -50%</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="pizzeria">
                    <img src="./image/outdoor-dining-1846137_1280.jpg" alt="" />
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
                    <div class="divreduction">
                        <div class="reduction">
                            <p>jusqu'à -50%</p>
                        </div>
                    </div>
                </div>
                <div class="pizzeria">
                    <img src="./image/outdoor-dining-1846137_1280.jpg" alt="" />
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
                    <div class="divreduction">
                        <div class="reduction">
                            <p>jusqu'à -50%</p>
                        </div>
                    </div>
                </div>
                <div class="pizzeria">
                    <img src="image/outdoor-dining-1846137_1280.jpg" alt="" />
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
                    <div class="divreduction">
                        <div class="reduction">
                            <p>jusqu'à -50%</p>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Slider main container -->
            {{-- <div class="swiper-container"> --}}
            <div class="swiper-wrapper" style="display: flex; width: 95%; overflow-x:scroll; gap:30px;">
                @foreach ($products as $product)
                    <div class="swiper-slide">
                        <a href="{{ '/restaurant' }}">
                            <div class="menu__card">
                                <img src="{{ asset('db/' . $product->image) }}" alt="{{ $product->nom }} style " />
                                <div class="menu__card__details">
                                    <h4>{!! $product->name !!}</h4>
                                    <h4>{!! $product->long_description !!}</h4>
                                    {{ $product->price }} <i>fcfa</i> <br>
                                    <a href="#">
                                        Passer la commande
                                        <span><i class="ri-arrow-right-line"></i></span>
                                    </a>
                                </div>
                            </div>
                        </a>

                    </div>
                @endforeach
            </div>


            //export
            
            {{-- @foreach ($products as $product)
            <div class="box">
                <p class="date"> {{ $product->price }} <i>fcfa</i> </p>
                <div class="img-box">
                    {{-- <img src="./image/salad-with-salad-with-eggs-cucumber-cucumber_1034052-104252.Avif" alt=""> --}}
                    {{-- <img src="{{ asset('db/' . $product->image) }}" alt="{{ $product->nom }} style " />

                </div> --}} --
                {{-- <div class="detail">
                    <h1>{!! $product->name !!} <br><span><h4>{!! $product->short_description !!}</h4></span></h1>
                    <p>
                        <h4>{!! $product->long_description !!}</h4>

                    </p>
                    <a href="#shop" class="btn">Passer la commande</a>
                </div>
            </div>
            @endforeach --}}

            //export

            <!-- Pagination (optionnel si tu as configuré la pagination dans Swiper) -->
            <div class="swiper-pagination"></div>
            {{-- </div> --}}





            <a href="{{ route('menu') }}"><button
                    style="margin-top: 3%; background-color:rgba(4, 87, 60, 0.948) ;width: 180px; height: 45px; color: white; border-raduis: 5px; font-size:1.2rem">voir
                    plus</button></a>
            <!-- </div> -->
        </div>
    </section>
    <section class="first">
        <div class="middle">
            <div class="card">
                <div class="about">
                    <p>
                        <span> A propos de kabaa. <br /> </span>
                    </p>
                    <p>
                        <span>
                            vous appréciez aussi les brunchs entre amis le dimanche en ville
                            ou les dîners en amoureux ? <br />
                            venez découvrir les meilleures tables du moment sur Kabaa, parmi
                            une sélection de plus de 60 000 adresses <br />
                            dans le monde entier. <br />
                        </span>
                    </p>
                    <p>
                        <span>
                            Tous les jours, retrouvez des promotions allant jusqu’à -50% sur
                            la carte. De quoi se faire plaisir sans se ruiner ! <br />
                            Kabaa est le moyen le plus rapide, disponible 24h/24, pour
                            trouver un bon plan resto près de chez vous, ou une expérience
                            <br />
                            culinaire partout ailleurs. Laissez-vous guider par plus de 20
                            millions d’avis vérifiés de notre communauté et partagez les
                            vôtres. Seuls les clients ayant honoré leur réservation peuvent
                            déposer un avis et poster leurs photos de plats.
                        </span>
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="inscrirerestoImg">
                    <img src="./image/chef-4625935_1280.jpg" alt="" id="chef">
                </div>
                <div class="inscrirerestotext">
                    <h2>Inscrivez votre restaurant </h2>
                    <p>
                        Donnez-nous plus de détails, et nous vous <br> contacterons le plus rapidement possible.
                    </p>
                    <button><a href="{{ route('signup') }}">VOIR PLUS D'INFORMATION</a></button>
                </div>
            </div>
        </div>
    </section>
    <section class="first">
        <div class="middle">
            <div class="card">
                <div class="inscrirerestotext">
                    <h2>Déjà un client? </h2>
                    <p>
                        Connectez-vous à Kabaa Manager et contactez-nous avec le Chat. </p>
                    <button><a href="{{ route('authentication') }}">CONNECTEZ-VOUS A KABAA</a></button>
                </div>
                <div class="inscrirerestoImg">
                    <img src="./image/woman-7431896_640.jpg" alt="" id="chef2">
                </div>
            </div>
            <br> <br>
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
        </div>


    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        // Initialisation du swiper
        const swiper = new Swiper(".swiper-container", {
            slidesPerView: "auto", // Ajuste le nombre de slides visibles en fonction de la taille du conteneur
            spaceBetween: 30, // Espace entre les slides en pixels
            loop: true, // Active la boucle infinie
            autoplay: {
                delay: 2500, // 2.5 secondes de délai entre les slides
                disableOnInteraction: false, // L'autoplay ne s'arrête pas si l'utilisateur interagit avec le slider
            },
            pagination: {
                el: ".swiper-pagination", // Sélecteur pour la pagination
                clickable: true, // Permet de cliquer sur la pagination pour naviguer entre les slides
            },
        });

        // Gestion du survol pour arrêter/reprendre l'autoplay
        const swiperContainer = document.querySelector('.swiper-container');
        swiperContainer.addEventListener('mouseover', () => {
            swiper.autoplay.stop(); // Arrête l'autoplay lorsque la souris survole le carrousel
        });

        swiperContainer.addEventListener('mouseout', () => {
            swiper.autoplay.start(); // Redémarre l'autoplay lorsque la souris quitte le carrousel
        });
    </script>

</body>

</html>
