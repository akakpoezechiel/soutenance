<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/RestaurantPage.css') }}">

    <title>Document</title>
</head>
<body>

    <section class="command">
        <div class="backPass">
            <div class="passhalf">
                <div class="passhalftext">
                    <p>
                        Nous vous satisfaisons le plus <br> vite possible!
                    </p>
                </div>
                <div class="content">
                    
                    <div class="paiememnt">

                        <select name="" id="paiememnt">
                            <option value="">FLOOZ</option>
                            <option value="">Tmoney</option>
                        </select>


                    </div>

                    <div class="livraison">

                        <select name="" id="livraison">
                            <option value="">Passer récupérer</option>
                           <a href="/notfound"> <option value="">Livrer</option></a>
                        </select>


                    </div>
                    
                </div>

            <div class="bottompass">
                <div class="quantité">
                    <input type="number" name="" id="quantité" placeholder="Saisissez la quantité">
                </div>
                <div class="validation">
                    <a href=""> </a>
                    <button type="submit" id="validation"><a href="">Valider votre commande</a></button>
                </div>
            </div>

                
            </div>
            <div class="rondImg">

                <img src="{{ URL::asset('db/' . $product->image, ) }}" alt="" id="rondImg">
                <p id="{{ URL::asset('db/' . $product->price, ) }}" ></p>

            </div>
            
        </div>
    </section>

    <script>
        const img = document.getElementById('rondImg');
        let angle = 0;
        setInterval(() => {
            angle += 1;
            img.style.transform = `rotate(${angle}deg)`;
        }, 60);

    </script>

    <SCript>

function showOrderSummary(imageUrl, price) 
        // Récupérer les éléments HTML où afficher l'image et le prix
        const orderSummaryDiv = document.getElementByClass('rondImg');
        const orderImage = document.getElementById('rondImg');
        const orderPrice = document.getElementById('order-price');

        // Mettre à jour l'image et le prix
        orderImage.src = imageUrl;
        orderPrice.textContent = "Prix: " + price + " fcfa";

        // Afficher la div avec le résumé de la commande
        orderSummaryDiv.style.display = 'block';


    </SCript>
    
</body>
</html>