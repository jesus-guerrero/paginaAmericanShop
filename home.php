<?php include("menu2/cabecera.php"); ?>
<?php 
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

?>









<link rel="stylesheet" href="menu2/estilos.css">
<link rel="stylesheet" href="css/logo.css">


<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img width="1000" height="300" src="img\bannerLondon4.png" class="d-block w-100" alt="...">
        </div>
        <!-- <div class="carousel-item">
            <img width="1000" height="200" src="menu2\imgmenu\leds.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img width="1000" height="200" src="img\kitsol.png" class="d-block w-100" alt="...">
        </div> -->
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Carousel wrapper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
</script>

<br />


    <div class="card"  style=" width: 1160px;
    height: 85px; background-color: #665283;">
                  
        <div class="card-header">
            <h1 class="container text-center" style="font-family: Didot; font-size: 45px; margin-bottom: 18px; color: #fff">CONOZCA NUESTROS PRODUCTOS</h1>
            <h1>     </h1>
        </div>
    </div>

<!-- Corusel noticias -->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

        <div class="carousel-item active">
            <div class="container">

                <div class="card"  style=
                "width: 45srem;
                background-color: #171a1f;">
                    <div style="
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        min-height: 50vh;
                        background-color:#171a1f;
                        margin-top: 40px;">
                        
                        <img src="img\zapatos.jpg" class="d-block w-50" width="1000px" height="400px" alt="...">
                    </div>

                    <div class="card-body" >
                    </div>

                    <div class="abs-center" style="margin: 30px">
                        <h3 class="card-title" style="color:#fff">Zapatos</h3>
                        <p class="card-text" style="color:#fff">
                            Encuentra en nuestra tienda los zapatos que siempre quisiste al mejor precio y la mejor calidad.

                        </p>
                    </div>

                    <a href="compras.php" class="btn-m">Click para comprar </a>
                </div>
            </div>
        </div>


        <div class="carousel-item">
            <div class="container">

                <div class="card" style=
                "width: 45srem;
                background-color: #171a1f;">
                    <div style="
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        min-height: 50vh;
                        background-color: #171a1f;
                        margin-top: 40px;">
                        <img src="img\caquetas.jpg" width="1000px" height="400px" class="d-block w-50" alt="...">
                        <!-- <iframe width="800" height="400" style="" src="https://www.youtube.com/embed/5-ifwZmo8a0"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe> -->
                    </div>

                    <div class="card-body">
                    </div>

                    <div class="abs-center" style=
                    "margin: 30px">
                        <h3 class="card-title"  style="color:#fff">CHAQUETAS</h3>
                        <p class="card-text" style="color:#fff"> 
                            La mejor calidad y variedad en todo tipo de chaquetas.
                            <br />

                        </p>
                    </div>
                    
                    <a href="compras.php" class="btn-m">Click para comprar </a>
                </div>

            </div>

        </div>

        
        <div class="carousel-item">
            <div class="container">

                <div class="card" style=
                "width: 45srem;
                background-color: #171a1f;">
                    <div style="
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        min-height: 50vh;
                        margin-top: 40px;">
                        <img src="img\camisetas.jpg" width="1000px" height="400px" class="d-block w-50" alt="...">
                    </div>

                    <div class="card-body">
                    </div>
                    <div class="abs-center" style="margin: 30px">
                    <h3 class="card-title"  style="color:#fff">Camisetas</h3>
                        <p class="card-text" style="color:#fff"> 
                            Los mejores diseños, a la moda y en todas las tallas.
                            <br />
                          

                        </p>
                    </div>
                    <a href="compras.php" class="btn-m">Click para comprar </a>

                </div>
            </div>
        </div>



        

 
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>



<script src="https://widget.chatbot.com/loader.js" async></script>
<!-- Start of ChatBot (www.chatbot.com) code -->
<script type="text/javascript">
    window._be = window._be || {};
    window.__be.id = "665de26400047f000720baa3";
    (function() {
        var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
        be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
    })();
</script>
<noscript>You need to <a href="https://www.chatbot.com/help/chat-widget/enable-javascript-in-your-browser/" rel="noopener nofollow">enable JavaScript</a> in order to use the AI chatbot tool powered by <a href="https://www.chatbot.com/" rel="noopener nofollow" target="_blank">ChatBot</a></noscript>
<!-- End of ChatBot code -->

<?php include("menu2/pie.php"); ?>