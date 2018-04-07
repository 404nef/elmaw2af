<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Links-->
        @include('layouts.links')


        

        <style type="text/css">
        
        #loader-wrapper .loader-section {
                position: fixed;
                top: 0;
                width: 51%;
                height: 100%;
                background: #222222;
                z-index: 1000;
        }
        
        #loader-wrapper .loader-section.section-left {
            left: 0;
        }
        
        #loader-wrapper .loader-section.section-right {
            right: 0;
        }
        
        </style>

    </head>
    <body>

    <!--Donate section-->
    <section id="donatesection">
        <div class="alert alert-primary text-center alert-dismissible fade show align-items-center" role="alert">
            <strong>Donate !</strong> Help us improving the quality of over product
            <form action="your-server-side-code" class="mt-2" method="POST">
                <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button "
                        data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
                        data-amount="1000"
                        data-name="الموقف"
                        data-description=""
                        data-image="{{asset('logo.jpeg')}}"
                        data-locale="auto"
                        data-zip-code="false">
                </script>
            </form>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </section>

    <!--IntroSection-->
    @include('layouts.mainform')

    <!--TypesOfTransports-->
    <section id="TypesOfTransports" class="wrapper">
        <h1 class="display-2 text-green text-center  mb-5"><strong>Types of transports</strong></h1>
        <div class="container">
            <div class="row wrapper text-center">
                <div class="col-md-4 center-block">
                    <img src="{{asset('bus.png')}}" class="img-fluid rounded-circle mb-1" width="250" height="250">
                    <h1 class="display-2 text-success">Bus</h1>
                </div>
                <div class="col-md-4 center-block">
                    <img src="{{asset('metro.png')}}" class="img-fluid rounded-circle mb-5" width="250" height="250">
                    <h1 class="display-2 text-primary">Metro</h1>

                </div>
                <div class="col-md-4 center-block">
                    <img src="{{asset('microbus.png')}}" class="img-fluid rounded-circle mb-5" width="250" height="250">
                    <h1 class="display-2 text-danger">MicroBus</h1>
                </div>
            </div>
        </div>
    </section>

<!--Meet the crewsection-->
    <section id="meetthecrew" class="py-10 wrapper">
        <div class="container text-center mb-5  w3-animate-left">
            <h1 class="display-1 text-green " style="font-family: 'Noto Serif', serif;"> <strong> Meet the crew ! </strong></h1>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="row text-center card-deck ">
            <div class="col-sm-3 mb-5">
                <div class="card auth shadow w3-animate-left" style="width: 18rem;">
                    <img class="card-img-top rounded-circle align-self-center" style="width: 150px ; height: 150px" src="{{asset('khalid.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title display-4">Khalid Alaa</h3>
                        <h5 class="card-subtitle"><strong>Back-end/Front-end Developer</strong></h5>
                        <p class="card-text ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    </div>
                    <div class="card-body">
                        <a href="#" class="card-link"><img src="{{asset('fbicon.png')}}" class="rounded-circle" style="width: 55px;height: 50px" alt=""></a>
                        <a href="#" class="card-link"><img src="{{asset('ticon.png')}}" class="rounded-circle" style="width: 60px;height: 60px" alt=""></a>
                        <a href="#" class="card-link"><img src="{{asset('linkedin.png')}}" class="rounded-circle" style="width: 55px;height: 55px" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-5">
                <div class="card auth shadow w3-animate-left" style="width: 18rem;">
                    <img class="card-img-top rounded-circle align-self-center" style="width: 150px ; height: 150px" src="{{asset('hussien.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title display-4"> Hussien Mahmoud</h3>
                        <h5 class="card-subtitle"><strong>Back-end/Front-end Developer</strong></h5>
                        <p class="card-text ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    </div>
                    <div class="card-body">
                        <a href="#" class="card-link"><img src="{{asset('fbicon.png')}}" class="rounded-circle" style="width: 55px;height: 50px" alt=""></a>
                        <a href="#" class="card-link"><img src="{{asset('ticon.png')}}" class="rounded-circle" style="width: 60px;height: 60px" alt=""></a>
                        <a href="#" class="card-link"><img src="{{asset('linkedin.png')}}" class="rounded-circle" style="width: 55px;height: 55px" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-5">
                <div class="card auth shadow w3-animate-left" style="width: 18rem;">
                    <img class="card-img-top rounded-circle align-self-center" style="width: 150px ; height: 150px" src="{{asset('ahmed.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title display-4"> Ahmed Mahmoud</h3>
                        <h5 class="card-subtitle"><strong>Back-end/Front-end Developer</strong></h5>
                        <p class="card-text ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    </div>
                    <div class="card-body">
                        <a href="#" class="card-link"><img src="{{asset('fbicon.png')}}" class="rounded-circle" style="width: 55px;height: 50px" alt=""></a>
                        <a href="#" class="card-link"><img src="{{asset('ticon.png')}}" class="rounded-circle" style="width: 60px;height: 60px" alt=""></a>
                        <a href="#" class="card-link"><img src="{{asset('linkedin.png')}}" class="rounded-circle" style="width: 55px;height: 55px" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-5">
                <div class="card auth shadow w3-animate-left" style="width: 18rem;">
                    <img class="card-img-top rounded-circle align-self-center" style="width: 150px ; height: 150px" src="{{asset('ramy.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title display-4"> Ramy Magdy</h3>
                        <h5 class="card-subtitle"><strong>Web designer / Photoshop designer</strong></h5>
                        <p class="card-text ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    </div>
                    <div class="card-body">
                        <a href="#" class="card-link"><img src="{{asset('fbicon.png')}}" class="rounded-circle" style="width: 55px;height: 50px" alt=""></a>
                        <a href="#" class="card-link"><img src="{{asset('ticon.png')}}" class="rounded-circle" style="width: 60px;height: 60px" alt=""></a>
                        <a href="#" class="card-link"><img src="{{asset('linkedin.png')}}" class="rounded-circle" style="width: 55px;height: 55px" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Transports-->
    <section id="transportsavaialable">
        <div class="container">
        <div class="row wrapper ml-5">
            <div class="col-md-4  center-block w3-animate-opacity mb-5"> <img src="{{asset('cta.jpg')}}" class=" rounded-circle  " width="250" height="250"></div>
            <div class="col-md-4 center-block w3-animate-opacity mb-5 "> <img src="{{asset('metroegypt.png')}}" class="rounded-circle   "width="250" height="250"></div>
            <div class="col-md-4 center-block w3-animate-opacity mb-5 ">  <img src="{{asset('traffic.png')}}" class="rounded-circle   "width="230" height="250"></div>
        </div>
        </div>
    </section>



    <!--Contact Us Footer-->
    @include('layouts.footer')







    <!--Top button section -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-angle-up"></i></button>



    <!--To top buttopn scrtip-->
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

    <!--FadeinFunctionFroTrnasports-->


    </body>
</html>
