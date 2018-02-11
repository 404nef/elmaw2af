
        <head>

            <style type="text/css">
                #reviews{
                    background: url("{{asset('review.jpg')}}");
                    background-attachment: fixed;
                    background-size: cover;
                    padding: 20px;

                }
                #message{
                    background-image: url("{{asset('greenbg.jpg')}}");
                }
            </style>

            @include('layouts.links')

            <title>Your Result</title>

        </head>
        <body>

        <!--MessageSection-->
        <section id="message">
        <div class="container text-center text-white">
            <h1 class="display-3">Hurray we found you a solution !</h1>
        </div>
        </section>

        <!--Results-->
        <section id="results">
            <div class="container">
                <div class="row wrapper">
                    <div class="col-sm-4 col-xs-12">
                        <div class="card text-center routes border-rounded mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><strong><i class="fas fa-road"></i> Route 1</strong></h5>
                                <div class="d-flex flex-row">
                                    <img src="{{asset('bus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 100px;" alt=""> <strong class="mt-5">Bus Number</strong>
                                </div>
                                <div class="d-flex flex-row">
                                    <img src="{{asset('metro.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 90px;" alt=""> <strong class="mt-5">Metro Number</strong>

                                </div>
                                <div class="d-flex flex-row mb-5">
                                    <img src="{{asset('microbus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 90px;" alt=""> <strong class="mt-5">Microbus Number</strong>
                                </div>
                                <a href="#" class="btn btn-success"><img src="{{asset('maps.png')}}" width="30" height="30" class="img-fluid mr-3" alt=""> Visualize route</a>
                            </div>
                            <div class="card-footer  text-white bg-success">
                                <strong>Cost estimated : 5 <i class="far fa-money-bill-alt"></i></strong>
                                <br>
                                <strong>Time estimated : 30 <i class="fas fa-clock"></i></strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="card text-center routes border-rounded mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><strong><i class="fas fa-road"></i> Route 1</strong></h5>
                                <div class="d-flex flex-row">
                                    <img src="{{asset('bus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 100px;" alt=""> <strong class="mt-5">Bus Number</strong>
                                </div>
                                <div class="d-flex flex-row">
                                    <img src="{{asset('metro.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 90px;" alt=""> <strong class="mt-5">Metro Number</strong>

                                </div>
                                <div class="d-flex flex-row mb-5">
                                    <img src="{{asset('microbus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 90px;" alt=""> <strong class="mt-5">Microbus Number</strong>
                                </div>
                                <a href="#" class="btn btn-success"><img src="{{asset('maps.png')}}" width="30" height="30" class="img-fluid mr-3" alt=""> Visualize route</a>
                            </div>
                            <div class="card-footer  text-white bg-success">
                                <strong>Cost estimated : 5 <i class="far fa-money-bill-alt"></i></strong>
                                <br>
                                <strong>Time estimated : 30 <i class="fas fa-clock"></i></strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="card text-center routes border-rounded mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><strong><i class="fas fa-road"></i> Route 1</strong></h5>
                                <div class="d-flex flex-row">
                                    <img src="{{asset('bus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 100px;" alt=""> <strong class="mt-5">Bus Number</strong>
                                </div>
                                <div class="d-flex flex-row">
                                    <img src="{{asset('metro.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 90px;" alt=""> <strong class="mt-5">Metro Number</strong>

                                </div>
                                <div class="d-flex flex-row mb-5">
                                    <img src="{{asset('microbus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 90px;" alt=""> <strong class="mt-5">Microbus Number</strong>
                                </div>
                                <a href="#" class="btn btn-success"><img src="{{asset('maps.png')}}" width="30" height="30" class="img-fluid mr-3" alt=""> Visualize route</a>
                            </div>
                            <div class="card-footer  text-white bg-success">
                                <strong>Cost estimated : 5 <i class="far fa-money-bill-alt"></i></strong>
                                <br>
                                <strong>Time estimated : 30 <i class="fas fa-clock"></i></strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="card text-center routes border-rounded mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><strong><i class="fas fa-road"></i> Route 1</strong></h5>
                                <div class="d-flex flex-row">
                                    <img src="{{asset('bus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 100px;" alt=""> <strong class="mt-5">Bus Number</strong>
                                </div>
                                <div class="d-flex flex-row">
                                    <img src="{{asset('metro.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 90px;" alt=""> <strong class="mt-5">Metro Number</strong>

                                </div>
                                <div class="d-flex flex-row mb-5">
                                    <img src="{{asset('microbus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 90px;" alt=""> <strong class="mt-5">Microbus Number</strong>
                                </div>
                                <a href="#" class="btn btn-success"><img src="{{asset('maps.png')}}" width="30" height="30" class="img-fluid mr-3" alt=""> Visualize route</a>
                            </div>
                            <div class="card-footer  text-white bg-success">
                                <strong>Cost estimated : 5 <i class="far fa-money-bill-alt"></i></strong>
                                <br>
                                <strong>Time estimated : 30 <i class="fas fa-clock"></i></strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="card text-center routes border-rounded mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><strong><i class="fas fa-road"></i> Route 1</strong></h5>
                                <div class="d-flex flex-row">
                                    <img src="{{asset('bus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 100px;" alt=""> <strong class="mt-5">Bus Number</strong>
                                </div>
                                <div class="d-flex flex-row">
                                    <img src="{{asset('metro.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 90px;" alt=""> <strong class="mt-5">Metro Number</strong>

                                </div>
                                <div class="d-flex flex-row mb-5">
                                    <img src="{{asset('microbus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 90px;" alt=""> <strong class="mt-5">Microbus Number</strong>
                                </div>
                                <a href="#" class="btn btn-success"><img src="{{asset('maps.png')}}" width="30" height="30" class="img-fluid mr-3" alt=""> Visualize route</a>
                            </div>
                            <div class="card-footer  text-white bg-success">
                                <strong>Cost estimated : 5 <i class="far fa-money-bill-alt"></i></strong>
                                <br>
                                <strong>Time estimated : 30 <i class="fas fa-clock"></i></strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="card text-center routes border-rounded mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><strong><i class="fas fa-road"></i> Route 1</strong></h5>
                                <div class="d-flex flex-row">
                                    <img src="{{asset('bus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 100px;" alt=""> <strong class="mt-5">Bus Number</strong>
                                </div>
                                <div class="d-flex flex-row">
                                    <img src="{{asset('metro.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 90px;" alt=""> <strong class="mt-5">Metro Number</strong>

                                </div>
                                <div class="d-flex flex-row mb-5">
                                    <img src="{{asset('microbus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 90px;" alt=""> <strong class="mt-5">Microbus Number</strong>
                                </div>
                                <a href="#" class="btn btn-success"><img src="{{asset('maps.png')}}" width="30" height="30" class="img-fluid mr-3" alt=""> Visualize route</a>
                            </div>
                            <div class="card-footer  text-white bg-success">
                                <strong>Cost estimated : 5 <i class="far fa-money-bill-alt"></i></strong>
                                <br>
                                <strong>Time estimated : 30 <i class="fas fa-clock"></i></strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="card text-center routes border-rounded mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><strong><i class="fas fa-road"></i> Route 1</strong></h5>
                                <div class="d-flex flex-row">
                                    <img src="{{asset('bus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 100px;" alt=""> <strong class="mt-5">Bus Number</strong>
                                </div>
                                <div class="d-flex flex-row">
                                    <img src="{{asset('metro.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 90px;" alt=""> <strong class="mt-5">Metro Number</strong>

                                </div>
                                <div class="d-flex flex-row mb-5">
                                    <img src="{{asset('microbus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 90px;" alt=""> <strong class="mt-5">Microbus Number</strong>
                                </div>
                                <a href="#" class="btn btn-success"><img src="{{asset('maps.png')}}" width="30" height="30" class="img-fluid mr-3" alt=""> Visualize route</a>
                            </div>
                            <div class="card-footer  text-white bg-success">
                                <strong>Cost estimated : 5 <i class="far fa-money-bill-alt"></i></strong>
                                <br>
                                <strong>Time estimated : 30 <i class="fas fa-clock"></i></strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="card text-center routes border-rounded mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><strong><i class="fas fa-road"></i> Route 1</strong></h5>
                                <div class="d-flex flex-row">
                                    <img src="{{asset('bus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 100px;" alt=""> <strong class="mt-5">Bus Number</strong>
                                </div>
                                <div class="d-flex flex-row">
                                    <img src="{{asset('metro.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 90px;" alt=""> <strong class="mt-5">Metro Number</strong>

                                </div>
                                <div class="d-flex flex-row mb-5">
                                    <img src="{{asset('microbus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 90px;" alt=""> <strong class="mt-5">Microbus Number</strong>
                                </div>
                                <a href="#" class="btn btn-success"><img src="{{asset('maps.png')}}" width="30" height="30" class="img-fluid mr-3" alt=""> Visualize route</a>
                            </div>
                            <div class="card-footer  text-white bg-success">
                                <strong>Cost estimated : 5 <i class="far fa-money-bill-alt"></i></strong>
                                <br>
                                <strong>Time estimated : 30 <i class="fas fa-clock"></i></strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="card text-center routes border-rounded mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><strong><i class="fas fa-road"></i> Route 1</strong></h5>
                                <div class="d-flex flex-row">
                                    <img src="{{asset('bus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 100px;" alt=""> <strong class="mt-5">Bus Number</strong>
                                </div>
                                <div class="d-flex flex-row">
                                    <img src="{{asset('metro.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 90px;" alt=""> <strong class="mt-5">Metro Number</strong>

                                </div>
                                <div class="d-flex flex-row mb-5">
                                    <img src="{{asset('microbus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 90px;" alt=""> <strong class="mt-5">Microbus Number</strong>
                                </div>
                                <a href="#" class="btn btn-success"><img src="{{asset('maps.png')}}" width="30" height="30" class="img-fluid mr-3" alt=""> Visualize route</a>
                            </div>
                            <div class="card-footer  text-white bg-success">
                                <strong>Cost estimated : 5 <i class="far fa-money-bill-alt"></i></strong>
                                <br>
                                <strong>Time estimated : 30 <i class="fas fa-clock"></i></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    <!--Review Section-->
        <section id="reviews">
            <div class="container ">
                <h1 class="display-2 text-white text-center">Was it helpful ?</h1>
                <hr>
                <hr class="footerhr">
                <div class=" flex-row justify-content-center " >
                    <div class="card" id="reviewfrom">
                        <div class="card-header bg-success text-white">
                            <h2 class="display-5 ">Your review <i class="fas fa-arrow-circle-down"></i></h2>
                        </div>
                        <div class="card-body">
                            <form action="" class="" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="Email" class="display-6">Email</label>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text "><i class="fas fa-at"></i></div>
                                        <input type="text" class="form-control" name="email" id="Email" placeholder="example@example.com">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="review" class="display-6">Your Review</label>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text "><i class="fas fa-pencil-alt"></i></div>
                                    <textarea name="review" class="form-control" id="review" cols="30" rows="10" placeholder="Your review"></textarea>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer bg-success">
                            <button class="btn btn-primary btn-block"><i class="fas fa-envelope-open mr-2"></i>Send</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>




        <!--Contact Us From-->
        @include('layouts.footer')
        </body>