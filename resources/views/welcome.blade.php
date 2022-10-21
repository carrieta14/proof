<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!--Styles -->

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        .container {
            padding: 60px 0;
            width: 90%;
            max-width: 1000px;
            margin: auto;
            overflow: hidden;
        }

        .titulo {
            color: #642a73;
            font-size: 30px;
            text-align: center;
            margin-bottom: 60px;
        }

        header {
            width: 100%;
            height: 600px;

            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(103, 9, 121, 0.6024159663865547) 60%, rgba(0, 212, 255, 0.6024159663865547) 100%), url(https://cursos.aiu.edu/images/Cuando-una-institucion-educativa-calla-ENTRADA-1.jpg);

            background-size: cover;
            background-attachment: fixed;
            position: relative;
        }

        nav {
            text-align: right;
            padding: 30px 50px 0 0;
        }

        nav>a {
            color: #fff;
            font-weight: 300;
            text-decoration: none;
            font-size: 16px;
            margin-right: 10px;
        }

        nav>a:hover {
            text-decoration: underline;
        }

        header .text-header {
            display: flex;
            height: 430px;
            width: 100%;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .text-header h1 {
            font-size: 50px;
            color: #fff;
        }

        .text-header h2 {
            font-size: 30px;
            font-weight: 300;
            color: #fff;
        }

        .wave {
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .container-about-us {
            display: flex;
            justify-content: space-evenly;
        }

        .picture-about-us {
            width: 48%;
        }

        .container-about-us .contents-text {
            width: 48%;
        }

        .contents-text h3 {
            margin-bottom: 15px;
        }

        .contents-text h3 span {
            background: #4d0686;
            color: #fff;
            border-radius: 50%;
            display: inline-block;
            text-align: center;
            width: 30px;
            height: 30px;
            padding: 3px;
            box-shadow: 0 0 6px 0 rgba(0, 0, 0, .5);
            margin-right: 5px;
        }

        .contents-text p {
            padding: 0px 0px 30px 15px;
            font-weight: 300;
            text-align: justify;
        }

        .portfolio {
            background: #f2f2f2;
        }

        .gallery-port {
            display: flex;
            justify-content: space-evenly;
            flex-wrap: wrap;

        }

        .picture-port {
            width: 24%;
            margin-bottom: 10px;
            overflow: hidden;
            position: relative;
            cursor: pointer;
            box-shadow: 0 0 6px 0 rgba(0, 0, 0, .5);
        }

        .picture-port>img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .hover-gallery {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            transform: scale(0);
            background: hsla(273, 91%, 27%, 0.7);
            transition: transform .5s;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .hover-gallery img {
            width: 50px;
        }

        .hover-gallery p {
            color: #fff;
        }

        .picture-port:hover .hover-gallery {
            transform: scale(1);
        }

        .cards {
            display: flex;
            justify-content: space-evenly;
        }

        .cards .card {
            background: #4d0686;
            display: flex;
            width: 46%;
            height: 200px;
            align-items: center;
            justify-content: space-evenly;
            border-radius: 5px;
            box-shadow: 0 0 6px 0 rgba(0, 0, 0, .5);
        }

        .cards .card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 3px solid #fff;
            border-radius: 50%;
            display: block;
        }

        .cards .card > .content-text-card{
            width: 60%;
            color: #fff;

        }

        .cards .card > .content-text-card p{
            font-weight: 300;
            padding-top: 5px;
        }
        
        .about-services{
            background: #f2f2f2;
            padding-bottom: 30px;
        }

        .service-cont{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .service-ind{
            width: 28%;
            text-align: center;
        }

        .service-ind img{
            width: 90%;
        }

        .service-ind h3{
            margin: 10px 0;
        }

        .service-ind p{
            font-weight: 300;
            text-align: justify;
        }

        footer{
            background: #414141;
            padding: 60px 0 30px 0;
            margin: auto;
            overflow: hidden;
        }

        .container-footer{
            display: flex;
            width: 90%;
            justify-content: space-evenly;
            margin: auto;
            padding-bottom: 50px;
            border-bottom: 1px solid gray;
        }

        .content-foot{
            text-align: center;
        }

        .content-foot h4{
            border-bottom: 3px solid purple;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        .content-foot p{
            color: #ccc;

        }

        .titulo-final{
            text-align: center;
            font-size: 24px;
            margin: 20px 0 0 0;
            color: lightgrey;
        }
    </style>
</head>

<body class="antialiased">
    <header>
        <nav>
            @if (Route::has('login'))
            @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endauth
            @endif

        </nav>
        <section class="text-header">
            <h1>Create and manage your institution</h1>
            <h2>In an easy and fast way from a web site</h2>
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.99 C150.00,150.00 349.20,-49.99 500.00,49.99 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
            </svg>
        </div>
    </header>
    <main>
        <section class="container about-us">
            <h2 class="titulo">What do we offer?</h2>
            <div class="container-about-us">
                <img src="https://www.umsa.edu.mx/childcontrol/Sistemas_control/Administrador/Imagenes_plan/1_bannerM2_2020_06_03_18-15-43.png" alt="" class="picture-about-us">
                <div class="contents-text">
                    <h3><span>1</span>The best tools</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero ab quidem culpa a doloribus, dolor reprehenderit totam quia omnis libero? Similique iure libero odio ratione harum assumenda eius perspiciatis enim?</p>
                    <h3><span>2</span>The best services</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero ab quidem culpa a doloribus, dolor reprehenderit totam quia omnis libero? Similique iure libero odio ratione harum assumenda eius perspiciatis enim?</p>
                </div>
            </div>
        </section>
        <section class="portfolio">
            <div class="container">
                <h2 class="titulo">Portfolio</h2>
                <div class="gallery-port">
                    <div class="picture-port">
                        <img src="https://cursodeadministraciondeempresas.com/wp-content/uploads/2020/08/1.jpg" alt="">
                        <div class="hover-gallery">
                            <img src="https://www.pngkey.com/png/full/120-1209359_iconmonstr-target-3-icon-1-01-target-white.png" alt="">
                            <p>Our Work</p>
                        </div>
                    </div>
                    <div class="picture-port">
                        <img src="https://elinsignia.com/wp-content/uploads/2019/07/integracion-1.jpg" alt="" width="800px" height="600px">
                        <div class="hover-gallery">
                            <img src="https://www.pngkey.com/png/full/120-1209359_iconmonstr-target-3-icon-1-01-target-white.png" alt="">
                            <p>Our Work</p>
                        </div>
                    </div>
                    <div class="picture-port">
                        <img src="https://conceptodefinicion.de/wp-content/uploads/2019/05/Administraci%C3%B3n-.jpg" alt="">
                        <div class="hover-gallery">
                            <img src="https://www.pngkey.com/png/full/120-1209359_iconmonstr-target-3-icon-1-01-target-white.png" alt="">
                            <p>Our Work</p>
                        </div>
                    </div>
                    <div class="picture-port">
                        <img src="https://uem.edu.mx/wp-content/uploads/2021/01/6909-scaled-1024x732.jpg" alt="">
                        <div class="hover-gallery">
                            <img src="https://www.pngkey.com/png/full/120-1209359_iconmonstr-target-3-icon-1-01-target-white.png" alt="">
                            <p>Our Work</p>
                        </div>
                    </div>
                    <div class="picture-port">
                        <img src="https://es.pimex.co/blog/wp-content/uploads/sites/2/2020/08/9.jpg" alt="">
                        <div class="hover-gallery">
                            <img src="https://www.pngkey.com/png/full/120-1209359_iconmonstr-target-3-icon-1-01-target-white.png" alt="">
                            <p>Our Work</p>
                        </div>
                    </div>
                    <div class="picture-port">
                        <img src="https://www.softwarelogisticaydistribucion.eu/wp-content/uploads/2021/07/administracion-de-procesos.png" alt="">
                        <div class="hover-gallery">
                            <img src="https://www.pngkey.com/png/full/120-1209359_iconmonstr-target-3-icon-1-01-target-white.png" alt="">
                            <p>Our Work</p>
                        </div>
                    </div>
                    <div class="picture-port">
                        <img src="https://valls.email/wp-content/uploads/2020/02/Colas-de-proyecto-Business-Central.jpg" alt="">
                        <div class="hover-gallery">
                            <img src="https://www.pngkey.com/png/full/120-1209359_iconmonstr-target-3-icon-1-01-target-white.png" alt="">
                            <p>Our Work</p>
                        </div>
                    </div>
                    <div class="picture-port">
                        <img src="https://ingenieriasamat.es/wp-content/uploads/2019/02/AutoProcesos-Portada-01-640x480.jpg" alt="">
                        <div class="hover-gallery">
                            <img src="https://www.pngkey.com/png/full/120-1209359_iconmonstr-target-3-icon-1-01-target-white.png" alt="">
                            <p>Our Work</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="customers container">
                <h2 class="titulo">Our customers</h2>
                <div class="cards">
                    <div class="card">
                        <img src="https://orientacion.universia.net.co/imgs2011/imagenes/servicio-a-2020_01_27_190137@2x.jpg" alt="">
                        <div class="content-text-card">
                            <h4>Name</h4>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam, eum.</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://f.hubspotusercontent00.net/hubfs/53/Tiposdeclientes.jpeg" alt="">
                        <div class="content-text-card">
                            <h4>Name</h4>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam, eum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="about-services">
                <div class="container">
                    <h2 class="titulo">Our services</h2>
                    <div class="service-cont">
                        <div class="service-ind">
                            <img src="https://www.businessprocessincubator.com/wp-content/uploads/2020/06/www.flokzu.comapi-vs-open-source-01-1-1-5ad32e70ddf27d8d9034b20aa6751cf79c7c9800.png" alt="">
                            <h3>Name</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, voluptatem?</p>
                        </div>
                        <div class="service-ind">
                            <img src="https://www3.ubu.es/ubucevblog/wp-content/uploads/2020/05/2.jpg" alt="">
                            <h3>Name</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, voluptatem?</p>
                        </div>
                        <div class="service-ind">
                            <img src="https://www3.ubu.es/ubucevblog/wp-content/uploads/2020/05/1.jpg" alt="">
                            <h3>Name</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, voluptatem?</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container-footer">
            <div class="content-foot">
                <h4>Phone</h4>
                <p>+57(318)-567-1345</p>
            </div>
            <div class="content-foot">
                <h4>Email</h4>
                <p>example@example.com</p>
            </div>
            <div class="content-foot">
                <h4>Location</h4>
                <p>Barranquilla-Atlantico Calle 59 #74B-145</p>
            </div>
        </div>
        <h2 class="titulo-final">&copy; Xero Desing | Cristian Arrieta</h2>
    </footer>

</body>

</html>