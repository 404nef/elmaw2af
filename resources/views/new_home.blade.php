@include('layouts.new_app')
<div class="se-pre-con" style="display: none">
    <h1>Please wait</h1>
</div>
<div class="hide-loader">
<!-- Slider -->
<div class="slider">
    <div class="callbacks_container">
        <ul class="rslides" id="slider">
            <li>
                <div class="w3layouts-banner-top w3layouts-banner-top1">
                    <div class="banner-dott">
                        <div class="container">
                            <div class="slider-info">
                                <div class="col-md-8">
                                    <h3>Want to go somewhere but lost <br> in the  transportaion system ?</h3>
                                    <h6></h6>
                                    <h6>IT IS OUR JOB TO GUIDE YOU!</h6>>
                                    <h6>Put your location and your destination to find out the way !</h6>
                                </div>
                                <div class="col-md-4">
                                    <div class="banner-form-agileinfo">
                                        <h5>Need To <span>Transport</span>?</h5>
                                        <p>Just put your location and your destination to find out the way !</p>
                                        <form action="{{route("Graph.start")}}" method="post">
                                            {{csrf_field()}}
                                            <select class="form-control option-w3ls" name="location" id="location">
                                                <option value="t_from">Transport From</option>
                                                @foreach($streets as $street)
                                                    <option value="{{$street->id}}">{{$street->street_name}}</option>
                                                @endforeach
                                            </select>
                                            <select class="form-control option-w3ls" name="destination" id="destination">
                                                <option value="t_to">Transport To</option>
                                                @foreach($streets as $street)
                                                    <option value="{{$street->id}}">{{$street->street_name}}</option>
                                                @endforeach
                                            </select>
                                            <button  id="display_transport_form" class="hvr-shutter-in-vertical">Get started</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </div>
    <div class="clearfix"></div>
</div>
<!-- //Slider -->

    <!--TypesOfTransports-->
    <section id="TypesOfTransports" class="col-xs-12">
        <div class="container">
            <div class="heading">
                <h3>Types of Transports</h3>
            </div>
            <div class="container">
            <div class="row wrapper text-center">
                <div class="col-md-4 col-xs-12 text-center">
                    <img src="{{asset('bus.png')}}" class="img-fluid rounded-circle mb-1" width="250" height="250">
                    <h1 class="display-2 text-success">Bus</h1>
                </div>
                <div class="col-md-4 col-xs-12 text-center">
                    <img src="{{asset('metro.png')}}" class="img-fluid rounded-circle mb-5" width="250" height="250">
                    <h1 class="display-2 text-primary">Metro</h1>

                </div>
                <div class="col-md-4 col-xs-12 text-center">
                    <img src="{{asset('microbus.png')}}" class="img-fluid rounded-circle mb-5" width="250" height="250">
                    <h1 class="display-2 text-danger">MicroBus</h1>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- team -->
    <div class="team" id="team">
        <div class="container">
            <div class="heading">
                <h3>Team</h3>
            </div>
            <div class="wthree_team_grids">
                <div class="col-md-3 wthree_team_grid">
                    <div class="hovereffect">
                        <img src="images/hussien.jpg" alt=" " class="img-responsive" />
                        <div class="overlay">
                            <h6>CREW</h6>
                            <div class="rotate">
                                <p class="group1">
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </p>
                                <hr>
                                <hr>
                                <p class="group2">
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <h4>Hussien Mahmoud</h4>
                    <p>Full Stack developer</p>
                </div>
                <div class="col-md-3 wthree_team_grid">
                    <div class="hovereffect">
                        <img src="images/khalid.jpg" alt=" " class="img-responsive" />
                        <div class="overlay">
                            <h6>CREW</h6>
                            <div class="rotate">
                                <p class="group1">
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </p>
                                <hr>
                                <hr>
                                <p class="group2">
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <h4>Khalid Alaa</h4>
                    <p>Full Stack developer</p>
                </div>
                <div class="col-md-3 wthree_team_grid">
                    <div class="hovereffect">
                        <img src="images/ahmed.jpg" alt=" " class="img-responsive" />
                        <div class="overlay">
                            <h6>CREW</h6>
                            <div class="rotate">
                                <p class="group1">
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </p>
                                <hr>
                                <hr>
                                <p class="group2">
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <h4>Ahmed Mahmoud</h4>
                    <p>Full Stack developer</p>
                </div>
                <div class="col-md-3 wthree_team_grid">
                    <div class="hovereffect">
                        <img src="images/ramy.png" alt=" " class="img-responsive" />
                        <div class="overlay">
                            <h6>CREW</h6>
                            <div class="rotate">
                                <p class="group1">
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </p>
                                <hr>
                                <hr>
                                <p class="group2">
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <h4>Ramy Magdy</h4>
                    <p>Web Designer</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //team -->

    <div class="row">
    <!-- Counter -->
    <div class="col-md-12 services-bottom">
        <div class="col-md-6 agileits_w3layouts_about_counter_left">
            <div class="countericon">
                <i class="fa fa-truck" aria-hidden="true"></i>
            </div>
            <div class="counterinfo">
                <p class="counter">{{$transport_count}}</p>
                <h3>Transport vehicles</h3>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="col-md-6 agileits_w3layouts_about_counter_left">
            <div class="countericon">
                <i class="fa fa-fighter-jet" aria-hidden="true"></i>
            </div>
            <div class="counterinfo">
                <p class="counter">{{$street_count}}</p>
                <h3>Street</h3>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
        <div class="col-md-6 agileits_w3layouts_about_counter_left">
            <div class="countericon">
                <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
            <div class="counterinfo">
                <p class="counter">1</p>
                <h3>Years Of Service</h3>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="col-md-6 agileits_w3layouts_about_counter_left">
            <div class="countericon">
                <i class="fa fa-user" aria-hidden="true"></i>
            </div>
            <div class="counterinfo">
                <p class="counter">{{$users_count}}</p>
                <h3>Happy clients</h3>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    </div>
    <div class="clearfix"> </div>
    <!-- //Counter -->

@include('layouts.new_footer')
</div>
<style>
    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('/255.gif') center no-repeat #fff;
    }
    .se-pre-con h1 {
        position: absolute;
        width: 100%;
        bottom: 10%;
        text-align: center;
    }
</style>
<!-- loader Icon -->
</body>
