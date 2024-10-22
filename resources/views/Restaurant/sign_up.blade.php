<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" />
    {{-- <script src="https://kit.fontawesome.com/5ddddbe850.js" rossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="./">
    <title></title>
</head>

<body>
    <section class="first">

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
                    <a href=""> télécharger l'application</a>
                </button>
                <button class="connexion"><a href="{{ route('authentication') }}">Connexion</a></button>
            </div>
        </div>


    </section>

    <section class="first">
        <div class="container">
            <div class="restoblock">
                <span>
                    Inscrivez votre restaurant sur kaba
                </span>


                <div class="">
                    <div class="singupText">
                        <p>
                            Testez Kabaa Manager, notre logiciel <br> de réservation et de gestion de <br> tables, sans
                            engagement de <br> durée. Visibilité et inscription <br> gratuite. Facturation à
                            l'utilisation : <br> les commissions sont basées sur le <br> nombre de couverts réservés et
                            <br> honorés.
                        </p>
                    </div>
                </div>
                <div class="">
                    <div class="singupText">
                        <p>
                            Testez Kabaa Manager, notre logiciel <br> de réservation et de gestion de <br> tables, sans
                            engagement de <br> durée. Visibilité et inscription <br> gratuite. Facturation à
                            l'utilisation : <br> les commissions sont basées sur le <br> nombre de couverts réservés et
                            <br> honorés.
                        </p>
                    </div>
                </div>
                <div class="">
                    <div class="singupText">
                        <img src="./image/outdoor-dining-1846137_1280.jpg" alt="">
                    </div>
                </div>



            </div>

            <div class="containerInput">
                {{-- <form action="{{ route('restaurant.store') }} " method="POST">
                  @if (session('success'))
                  <div class="alert alert-success" id="success-message"  style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; margin: 20px 0;">
                      {{ session('success') }}
                  </div>
              @endif
      
              @if (session('error'))
                  <div class="alert alert-danger" id="error-message"  style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px; margin: 20px 0;">
                      {{ session('error') }}
                  </div>
              @endif


                    @csrf
                    <label for="nom_restaurant">Nom du restaurant</label>
                    <input type="text" name="nom_restaurant" id="nom_restaurant">

                    <label for="adresse_restaurant">Son adresse</label>
                    <input type="text" name="adresse_restaurant" id="adresse_restaurant">

                    <div class="rowInput">
                        <div class="shortDiv">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" id="nom">
                        </div>
                        <div class="shortDiv">
                            <label for="prenom">Prenom</label>
                            <input type="text" name="prenom" id="prenom">
                        </div>
                    </div>

                    <div class="rowInput">
                        <div class="shortDiv">
                            <label for="adresse">Adresse</label>
                            <input type="text" name="adresse" id="adresse">
                        </div>
                        <div class="shortDiv">
                            <label for="numero_telephone">Numéro de téléphone</label>
                            <input type="text" name="numero_telephone" id="numero_telephone">
                        </div>
                    </div>

                    <button type="submit">Inscrire</button>
                </form> --}}

                @if (session('error'))
                <div class="alert alert-danger">
                    {{-- <p>user</p> --}}
                    {{ session('error') }}
                </div>
            @endif
    
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

                <form action="{{ route('restaurant.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="nom_restaurant">Nom du restaurant</label>
                        <input type="text" id="nom_restaurant" name="nom_restaurant" placeholder="Nom du restaurant" required>
                    </div>
        
                    <div class="form-group">
                        <label for="adresse_restaurant">Adresse du restaurant</label>
                        <input type="text" id="adresse_restaurant" name="adresse_restaurant" placeholder="Adresse (Map)" required>
                    </div>
        
                    <div class="form-group">
                        <label for="numero_telephone">Numéro de téléphone</label>
                        <input type="text" id="numero_telephone" name="numero_telephone" placeholder="Numéro de téléphone" required>
                    </div>
        
                    <div class="form-group">
                        <label for="email_restaurant">Email du restaurant</label>
                        <input type="email" id="email_restaurant" name="email_restaurant" placeholder="Email du restaurant" required>
                    </div>
        
                    <div class="form-group">
                        <label for="nom_proprietaire">Nom du propriétaire</label>
                        <input type="text" id="nom_proprietaire" name="nom_proprietaire" placeholder="Nom du propriétaire" required>
                    </div>
                    <div class="form-group">

                        {{-- <input type="hidden" name="admin_id" value="{{ $adminId }}"> --}}

                    </div>
        
                    <button type="submit" class="btn">Créer le Restaurant</button>
                </form>

            </div>
        </div>
    </section>

    <section class="first">
        <div class="kabaapub">
            <h2>Ce que vous pouvez attendre de Kabaa</h2>
            <div class="card">
                <div class="visibilité">
                    <img src="./image/icon-visibility.png" alt="" />
                    <h3>obtenez plus de visibilité en ligne</h3>
                    <p>TheFork Manager est la <br> première plate-forme de <br> recherche et de réservation de <br>
                        restaurants, disponible <br> dans 12 pays ! Vous <br> pouvez dès maintenant <br> vous doter
                        gratuitement <br> d’une page <br> personnalisée affichable <br> sur tous les appareils.</p>

                </div>
                <div class="visibilité">
                    <img src="./image/icon-table.png" alt="" />
                    <h3>Augmentez votre taux <br> d'occupation</h3>
                    <p>Un modèle de gestion <br> gagnant-gagnant sans <br> aucun risque pour votre <br> restaurant.
                        Proposez des <br> offres spéciales ou <br> participez au programme <br> de fidélité YUMS et aux
                        <br> festivals pour augmenter <br> vos réservations en <br>saison creuse.</p>
                </div>
                <div class="visibilité">
                    <img src="./image/icon-ghost.png" alt="" />
                    <h3>Luttez contre les no- <br>shows</h3>
                    <p>Réduisez le nombre des <br> no-shows à l’aide des <br> outils de Kabaa tels que <br> les emails
                        de <br> confirmation <br> automatiques et les <br> SMS, le score de fiabilité <br> des clients
                        et la prise <br> d’empreinte <br>de carte de <br> crédit.</p>
                </div>
                <div class="visibilité">
                    <img src="./image/icon-expert.png" alt="" />
                    <h3>Faites appel aux <br> experts du secteur</h3>
                    <p>Les équipes de Kabaa <br> collaborent avec 60000 <br> restaurants depuis plus <br> de 12 ans afin
                        de les <br> aider à développer leur <br> activité via des <br> formations gratuites, des <br>
                        prestations de conseil <br> assurées par des <br>experts,et un support <br> client 7 jours sur
                        7.</p>

                </div>
            </div>

            <h2>Vous souhaitez attirer plus de clients dans votre restaurant?</h2>
            <p>Associez-vous à Kabaa dès aujourd'hui : c'est simple et vous pouvez annuler à tout moment !</p>

            <a href="{{ route('menu') }}"><button
                    style="margin-top: 3%; background-color:rgba(4, 87, 60, 0.948) ;width: 180px; height: 45px; color: white; border-raduis: 5px; font-size:1.2rem">COMMENCEZ</button></a>


        </div>
        </div>
    </section>


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

    <script>
      // Fonction pour faire disparaître les messages après 5 secondes
      window.onload = function() {
          const successMessage = document.getElementById('success-message');
          const errorMessage = document.getElementById('error-message');
  
          if (successMessage) {
              setTimeout(() => {
                  successMessage.style.display = 'none';
              }, 3000); // 5000 ms = 5 secondes
          }
  
          if (errorMessage) {
              setTimeout(() => {
                  errorMessage.style.display = 'none';
              }, 3000); // 5000 ms = 5 secondes
          }
      }
  </script>

</body>

</html>
