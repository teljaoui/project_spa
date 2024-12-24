<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Spa</title>
</head>

<body>
    <header>
        <nav class="header-top">
            <div>
                <ul>
                    <li><a href=""><i class="fa-solid fa-location-dot"></i> Test , Test , N00</a></li>
                    <li><a href=""><i class="fa-solid fa-envelope"></i> info@gmail.com</a></li>
                </ul>
                <ul>
                    <li><a href=""><i class="fa-solid fa-phone"></i> +212 652583234</a></li>
                    <li><a href=""><i class="fa-brands fa-whatsapp"></i> +212 652583234</a></li>
                </ul>
            </div>
        </nav>
        <nav class="header-bottom">
            <div>
                <ul>
                    <li class="logo">
                        <a href="/" onclick="shownavhome()"><img src="img/logotop.png"
                                alt=""srcset=""><span>Spa</span></a>
                        <button class="xmark" onclick="closenavhome()"><i class="fa-solid fa-xmark"></i></button>
                    </li>
                </ul>
                <ul>
                    <li><a href="/" class="navigation" onclick="closenavhome()">Home <i
                                class="fa-solid fa-arrow-right"></i></a></li>
                    <li><a href="#services" class="navigation" onclick="closenavhome()">Service <i
                                class="fa-solid fa-arrow-right"></i></a></li>
                    <li><a href="#home-contact" class="navigation" onclick="closenavhome()">Contact <i
                                class="fa-solid fa-arrow-right"></i></a></li>
                </ul>
                <ul>
                    <li class="reserve"><a href="" onclick="closenavhome()">Réserver</a></li>
                </ul>
                <ul class="contact">
                    <hr class="mx-4 bg-light my-3">
                    <div>
                        <li><a href="" onclick="closenavhome()"><i class="fa-solid fa-envelope"></i></a></a></li>
                        <li><a href="" onclick="closenavhome()"><i class="fa-solid fa-phone"></i></a></li>
                        <li><a href="" onclick="closenavhome()"><i class="fa-brands fa-whatsapp"></i></a></li>
                        <li><a href="" onclick="closenavhome()"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="" onclick="closenavhome()"><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a href="" onclick="closenavhome()"><i class="fa-brands fa-telegram"></i></a></li>
                    </div>
                </ul>
            </div>
        </nav>
        <nav class="phone">
            <ul class="px-3 pt-2">
                <li class="logo"><a href=""><img src="img/logotop.png" alt=""
                            srcset=""><span>Spa</span></a>
                </li>
                <li>
                    <button onclick="shownavhome()"><i class="fa-solid fa-bars"></i></button>
                </li>
            </ul>
        </nav>
    </header>
    <section class="home-top" id="home-top">
        <div class="content">
            <h5>Beauty Services</h5>
            <p>Give yourself this moment . <br>
                make an appointment in just a click</p><br>
            <a href="">make an appointment</a>
        </div>
    </section>
    <section class="home-service" id="services">
        <div class="container">
            <div class="title">
                <h5>Our Services</h5>
                <hr class="hr">
                <p>You will love looking great every day </p>
            </div>
            <div class="services-content">
                <div class="services">
                    <div class="item">
                        <img src="img/service1.jpg" alt="">
                        <p>Soins du visage</p>
                    </div>
                    <div class="item">
                        <img src="img/service2.jpg" alt="">
                        <p>Massages</p>
                    </div>
                    <div class="item">
                        <img src="img/service3.jpg" alt="">
                        <p>Soins corporels</p>
                    </div>
                    <div class="item">
                        <img src="img/service4.jpg" alt="">
                        <p>Manucure et pédicure</p>
                    </div>
                    <div class="item">
                        <img src="img/service5.jpg" alt="">
                        <p>Services de coiffure</p>
                    </div>
                    <div class="item">
                        <img src="img/service6.jpg" alt="">
                        <p>Épilation</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="home-reserve">
        <div class="text-center align-items-center py-5">
            <h5 class="pb-2">Special offers</h5>
            <p class="pb-3">make an appointment in just a click</p>
            <a href="">make an appointment</a>
        </div>
    </section>
    <section class="home-contact" id="home-contact">
        <div class="container">
            <div class="title">
                <h5>Contact Us</h5>
                <hr class="hr">
                <p>Feel free to get in touch with us now for more details</p>
            </div>
            <div class="contact-content py-5">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 text-center p-3">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1042.7205685396775!2d-6.892672860081739!3d33.930028342842256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sma!4v1735063356628!5m2!1sfr!2sma"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 text-start p-3">
                        <ul>
                            <li><a href=""><i class="fa-solid fa-location-dot"></i>Test , Test , N00</a></li>
                            <li><a href=""><i class="fa-solid fa-envelope"></i>info@gmail.com</a></li>
                            <li><a href=""><i class="fa-solid fa-phone"></i>+212 652583234</a></li>
                            <li><a href=""><i class="fa-brands fa-whatsapp"></i>+212 652583234</a></li>
                            <li><a href=""><i class="fa-brands fa-instagram"></i>test_test</a></li>
                            <li><a href=""><i class="fa-brands fa-facebook"></i>Test Test</a></li>
                            <li><a href=""><i class="fa-brands fa-telegram"></i>+212 652583234</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="logo pb-3">
                        <a href="/"><img src="img/logo.jpg" alt=""srcset=""></a>
                    </div>
                    <div>
                        <p>Welcome to one of the finest salon and spa experiences in your area, where relaxation and
                            rejuvenation await!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <h5>Office</h5>
                    <li><a href=""><i class="fa-solid fa-location-dot"></i>Test , Test , N00</a></li>
                    <li><a href=""><i class="fa-solid fa-envelope"></i>info@gmail.com</a></li>
                    <li><a href=""><i class="fa-solid fa-phone"></i>+212 652583234</a></li>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <h5>Links</h5>
                    <li><a href="/" class="navigation">Home</a></li>
                    <li><a href="#services" class="navigation">Service</a>
                    </li>
                    <li><a href="#home-contact" class="navigation">Contact Us</a></li>
                    <li><a href="">Make An Appointment</a></li>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 media">
                    <h5>Get In Touch</h5>
                    <li><a href=""><i class="fa-brands fa-whatsapp"></i>+212 652583234</a></li>
                    <li><a href=""><i class="fa-brands fa-instagram"></i>test_test</a></li>
                    <li><a href=""><i class="fa-brands fa-facebook"></i>Test Test</a></li>
                    <li><a href=""><i class="fa-brands fa-telegram"></i>+212 652583234</a></li>
                </div>

            </div>
        </div>
        <div class="py-4 w-100">
            <p class="mx-auto fs-5">Teljaoui Mohamed © 2024. All Rights Reserved.</p>
        </div>
    </footer>
   

    <script src="main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
