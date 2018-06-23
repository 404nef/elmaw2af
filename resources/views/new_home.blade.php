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
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </p>
                                <hr>
                                <hr>
                                <p class="group2">
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fab fa-dribbble"></i>
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
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </p>
                                <hr>
                                <hr>
                                <p class="group2">
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fab fa-dribbble"></i>
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
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </p>
                                <hr>
                                <hr>
                                <p class="group2">
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fab fa-dribbble"></i>
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
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </p>
                                <hr>
                                <hr>
                                <p class="group2">
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fab fa-dribbble"></i>
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
                <i class="fas fa-bus"></i><i class="fas fa-subway"></i>
            </div>
            <div class="counterinfo">
                <p class="counter">{{$transport_count}}</p>
                <h3>Transport vehicles</h3>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="col-md-6 agileits_w3layouts_about_counter_left">
            <div class="countericon">
                <i class="fas fa-road"></i>
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


    <section id="locateus">
        <div class="w3ls_address_mail_footer_grids">
            <div class="heading">
                <h2>locate us</h2>
            </div>
            <div class="container">
                <div class="col-md-8 contactleft">
                    <div style="width: 100%"><iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=30.076735429532363,31.287242165390012&amp;q=+(Our%20location)&amp;ie=UTF8&amp;t=&amp;z=17&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Create Google Map</a></iframe></div><br />
                </div>
                <div class="col-md-4 contactright">
                    <h3>Contact Address</h3>
                    <div class="w3ls_footer_grid_left">
                        <div class="wthree_footer_grid_left">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <p>Ain shams university<span>Abbasya</span></p>
                    </div>
                    <div class="w3ls_footer_grid_left">
                        <div class="wthree_footer_grid_left">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <p>+(000) 123 4565 32 <span>+(010) 123 4565 35</span></p>
                    </div>
                    <div class="w3ls_footer_grid_left">
                        <div class="wthree_footer_grid_left">
                            <i class="fas fa-envelope-square"></i>
                        </div>
                        <p><a href="mailto:info@example.com">Elmaw2af@gmail.com</a>

                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </section>







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
