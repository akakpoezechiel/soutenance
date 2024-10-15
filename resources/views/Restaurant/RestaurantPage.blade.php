<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lowSun - Flower shop website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> 
    <link rel="stylesheet" href="{{ asset('css/RestaurantPage.css') }}">
</head>
<body>
    
    <section class="blog" id="blog">
        <h1 class="heading">From the blog</h1>
        <p style="text-align: center; text-transform: uppercase; font-size: 4rem;">Last post</p>
        <div class="box-container">
            {{-- <div class="box">
                <p class="date">5000frcfa</p>
                <div class="img-box">
                    <img src="./image/pizza_144627-39498.avif" alt="">
                </div>
                <div class="detail">
                    <h1>Pizza au bon frommage <br><span>By ezechiel - Octobre 19, 2024</span></h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam eveniet optio commodi sit
                        fugiat quaerat quam,
                        vero aut beatae porro accusantium molestiae consequatur necessitatibus amet sapiente accusamus
                        cumque adipisci repellendus.
                    </p>
                    <a href="/restaurant/passCommand" class="btn">Passer la commande</a>
                </div>
            </div> --}}
            {{-- <div class="box">
                <p class="date">7000frcfa</p>
                <div class="img-box">
                    <img src="./image/bugger.jpg" alt="">
                </div>
                <div class="detail">
                    <h1>Bugger <br><span>By ezechiel - Octobre 19, 2024</span></h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam eveniet optio commodi sit
                        fugiat quaerat quam,
                        vero aut beatae porro accusantium molestiae consequatur necessitatibus amet sapiente accusamus
                        cumque adipisci repellendus.
                    </p>
                    <a href="#shop" class="btn">Passer la commande</a>
                </div>
            </div> --}}
            {{-- <div class="box">
                <p class="date">8000frcfa</p>
                <div class="img-box">
                    <img src="./image/plate-french-fries-with-ketchup-bottle-top_1301290-789.jpg" alt="">
                </div>
                <div class="detail">
                    <h1>frite <br><span>By ezechiel - Octobre 19, 2024</span></h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam eveniet optio commodi sit
                        fugiat quaerat quam,
                        vero aut beatae porro accusantium molestiae consequatur necessitatibus amet sapiente accusamus
                        cumque adipisci repellendus.
                    </p>
                    <a href="#shop" class="btn">Passer la commande</a>
                </div>
            </div> --}}
            {{-- <div class="box">
                <p class="date">10000frcfa</p>
                <div class="img-box">
                    <img src="./image/roasted-chicken-with-vegetables-plate_23-2147954251.Avif" alt="">
                </div>
                <div class="detail">
                    <h1>Poulet roti <br><span>By ezechiel - Octobre 19, 2024</span></h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam eveniet optio commodi sit
                        fugiat quaerat quam,
                        vero aut beatae porro accusantium molestiae consequatur necessitatibus amet sapiente accusamus
                        cumque adipisci repellendus.
                    </p>
                    <a href="#shop" class="btn">Passer la commande</a>
                </div>
            </div> --}}
            
           
            @foreach ($products as $product)
            <div class="box">
                <p class="date"> {{ $product->price }} <i>fcfa</i> </p>
                <div class="img-box">
                    {{-- <img src="./image/salad-with-salad-with-eggs-cucumber-cucumber_1034052-104252.Avif" alt=""> --}}
                    <img src="{{ asset('db/' . $product->image) }}" alt="{{ $product->nom }} style " />

                </div>
                <div class="detail">
                    <h1>{!! $product->name !!} <br><span><h4>{!! $product->short_description !!}</h4></span></h1>
                    <p>
                        <h4>{!! $product->long_description !!}</h4>

                    </p>
                    <a href="#shop" class="btn">Passer la commande</a>
                </div>
            </div>
            @endforeach
            {{-- <div class="box">
                <p class="date">14000frcfa</p>
                <div class="img-box">
                    <img src="./image/spaghetti-with-tomato-olives_2829-14138.Avif" alt="">
                </div>
                <div class="detail">
                    <h1>Spagheti<br><span> <h4>{!! $product->short_description !!}</h4>
                    </span></h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam eveniet optio commodi sit
                        fugiat quaerat quam,
                        vero aut beatae porro accusantium molestiae consequatur necessitatibus amet sapiente accusamus
                        cumque adipisci repellendus.
                    </p>
                    <a href="#shop" class="btn">Passer la commande</a>
                </div>
            </div> --}}
        </div>

    </section>


    <script type="script.js"></script>
</body>
</html>