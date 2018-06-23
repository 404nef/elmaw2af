<?php

$time = 0;
?>



<head>

    <style type="text/css">
        #map {
            height: 400px;
            width: 100%;
        }
        #reviews{
            background: url("{{asset('review.jpg')}}");
            background-attachment: fixed;
            background-size: cover;
            padding: 20px;

        }
        #message{
            background: linear-gradient(0deg,rgba(255,0,150,0.3),rgba(255,0,0,0.3)),url("{{asset('greenbg.jpg')}}");
        }
        #filters{
            padding : 20px;
        }
    </style>

    @include('layouts.links')

    <title>Your Result</title>


</head>
<body>

<!--MessageSection-->
<section id="message">
    <div class="container text-center text-white">
        @if(count($bestroutes)>0)
        <h1 class="display-3">Hurray we found you a solution !</h1>
            @else
            <h1 class="display-3">No solution !</h1>
        @endif
    </div>
</section>

<!--Fliters Section -->
<section id="filters">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-12">
                <form action="{{route('Filter.cost')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="costestimation" value="{{serialize($costestimation)}}">
                    <input type="hidden" name="bestroutes" value="{{ serialize($bestroutes) }}">
                    <input type="hidden" name="besttypes" value="{{ serialize($besttypes) }}">
                    <input type="hidden" name="numbers" value="{{ serialize($numbers) }}">
                    <input type="hidden" name="bestlatlong" value="{{ serialize($bestlatlong) }}">
                    <input type="hidden" name="destination" value="{{ $destination }}">

                    <button class="btn btn-block btn-success" type="submit"><i class="far fa-money-bill-alt"></i>

                        Cost</button>
                </form>
            </div>
            <div class="col-sm-4 col-xs-12">
                <form action="{{route('Filter.transport')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="costestimation" value="{{serialize($costestimation)}}">
                    <input type="hidden" name="bestroutes" value="{{ serialize($bestroutes) }}">
                    <input type="hidden" name="besttypes" value="{{ serialize($besttypes) }}">
                    <input type="hidden" name="numbers" value="{{ serialize($numbers) }}">
                    <input type="hidden" name="bestlatlong" value="{{ serialize($bestlatlong) }}">
                    <input type="hidden" name="destination" value="{{ $destination }}">
                    <button class="btn btn-block btn-warning" type="submit"><i class="fas fa-home"></i>
                        Number of transports</button>
                </form>
            </div>

            <div class="col-sm-4 col-12">
                <form action="/" method="get">
                    {{csrf_field()}}
                    <button class="btn btn-block btn-primary" type="submit"><i class="fas fa-home"></i>Back to home</button>
                </form>
            </div>


        </div>
    </div>
    </div>

</section>
<script !src="">
    function estimate(index){
        $("#timeestimate" + index).text(0);
        var pausecontent = <?php echo json_encode($bestlatlong); ?>;
        var finalarr = pausecontent[index];
        for(var i = 0 ; i < finalarr.length;i+=2){
            if(i+3<finalarr.length-1){
                var counter = 0;
                var origin1 = new google.maps.LatLng(finalarr[i], finalarr[i+1]);
                var destinationB = new google.maps.LatLng(finalarr[i+2], finalarr[i+3]);
                var service = new google.maps.DistanceMatrixService();
                service.getDistanceMatrix(
                    {
                        origins: [origin1],
                        destinations: [destinationB],
                        travelMode: 'DRIVING',
                    }, callback);
                function callback(response, status) {
                    if (status != "ZERO_RESULTS") {
                        //console.log("Route "+index,response,"Lats1" + lat1 +" "+ long2+" lats "+" "+lat2+" "+ long2);
                        if(response!=null) {
                            var results = response.rows[0].elements;
                            var element = results[0];
                            counter = Math.ceil(element.duration.value / 60);

                            $("#timeestimate" + index).text((parseInt($("#timeestimate" + index).text()) + counter));
                        }
                    }
                }
            }
        }
    }
</script>
<!--Results-->
<section id="results">
    <div class="container">
        <div class="row wrapper">
            @for($i = 0 ; $i < count($bestroutes); $i++)
                <div class="col-12 col-sm-6  ">
                    <div class="card text-center routes align-content  border-rounded mb-3">
                        <div class="card-footer  text-white bg-danger">
                            <strong>Cost estimated : {{$costestimation[$i]}} <i class="far fa-money-bill-alt"></i></strong>
                            <br>
                            <strong>Time estimated : <span id="timeestimate{{$i}}">Estimate it now</span> mins <i class="fas fa-clock"></i></strong>

                        </div>
                        <?php array_push($bestroutes[$i],$destination); ?>
                        <div class="card-body text-center ">
                            <h5 class="card-title"><strong><i class="fas fa-road"></i> Route {{$i+1}}</strong></h5>
                        @for($j=0;$j<count($bestroutes[$i]);$j++)
                            @if($j%2!=0&&$bestroutes[$i][$j]!=-1)
                                <!--type==bus-->
                                    @if($bestroutes[$i][$j]!=$bestroutes[$i][$j-2])
                                        <?php $t = \App\Transport::where('Transport_number',$bestroutes[$i][$j])->get()->first(); ?>
                                        <div class="d-flex flex-row">
                                            @if($t->Transport_type=="Bus")
                                            <img src="{{asset('bus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 100px;" alt=""> <strong class="mt-5">{{$bestroutes[$i][$j]}} <br> From {{$bestroutes[$i][$j-3]}} <br> </strong>
                                            @else
                                                <img src="{{asset('metro.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 100px;" alt=""> <strong class="mt-5">{{$bestroutes[$i][$j]}} <br> From {{$bestroutes[$i][$j-3]}} <br> </strong>
                                            @endif
                                        </div>

                                    @endif
                                @endif
                            @endfor

                            <div class="d-flex flex-row">

                                <img src="{{asset('destinationreached.png')}}" class="img-fluid  mr-3" style="width: 100px;height: 100px;" alt=""> <strong class="mt-5">{{$destination}}</strong>
                            </div>
                            <div class="d-flex flex-row mt-3 justify-content-center">
                                <button class="btn btn-success mr-2" onclick="estimate({{$i}})"><i class="fas fa-clock"></i> EstimateTime</button>
                                <a href="#" onclick="initMap({{$i}})" data-toggle="modal" id="{{$i}}" data-target="#mapModal" class="btn btn-danger"><img src="{{asset('maps.png')}}" width="30" height="30" class="img-fluid mr-3" alt=""> Visualize route</a>
                            </div>
                        </div>


                    </div>



                </div>

        @endfor

        <!-- The Modal -->
            <div class="modal fade" id="mapModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Route Map</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div id="map"></div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if(\Illuminate\Support\Facades\Auth::user())
    <!--Review Section-->
    <section id="reviews">
        <div class="container ">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1 class="display-2 text-white text-center">Was it helpful ?</h1>
            <hr>
            <hr class="footerhr">
            <div class=" flex-row justify-content-center " >
                <div class="card" id="reviewfrom">
                    <div class="card-header bg-success text-white">
                        <h2 class="display-5 ">Your review <i class="fas fa-arrow-circle-down"></i></h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('ReviewsController.store')}}"  method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="review" class="display-6">Your Review</label>
                                <div class="input-group-prepend">
                                    <div class="input-group-text "><i class="fas fa-pencil-alt"></i></div>
                                    <textarea name="review" required class="form-control" id="review" cols="30" rows="10" placeholder="Your review"></textarea>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer bg-success">
                        <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-envelope-open mr-2"></i>Send</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endif
<script>

    $(document).ready(function(e){
        $('.search-panel .dropdown-menu').find('a').click(function(e) {
            e.preventDefault();
            var param = $(this).attr("href").replace("#","");
            var concept = $(this).text();
            $('.search-panel span#search_concept').text(concept);
            $('.input-group #search_param').val(param);
        });
    });

</script>

<!-- google maps start-->
<script>
    var buttonid=0;

    $('#mapModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        buttonid=button.attr('id');
    })
    function initMap(index) {
        /*add long and lat for markers here*/

        var map;
        var pausecontent = <?php echo json_encode($bestlatlong); ?>;
        var finalarr = pausecontent[index];

        console.log(finalarr);
        for(var i = 0 ; i < finalarr.length-2;i+=2) {
            if(i==0) {
                var point = {lat: finalarr[i], lng: finalarr[i+1]};

                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 13,
                    center: point
                });
                var point = {lat: finalarr[i], lng: finalarr[i+1]};
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(finalarr[i], finalarr[i+1]),
                    animation : google.maps.Animation.DROP,
                    title: String(i/2+1),
                    map: map

                });
                marker.setIcon('http://maps.google.com/mapfiles/ms/icons/blue-dot.png');


            }else  {
                if(i+1 == finalarr.length-3) {
                    /*add markers here with the lat and long created above*/
                    var point = {lat: finalarr[i], lng: finalarr[i + 1]};
                    var marker = new google.maps.Marker({
                        icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|ddd',
                        position: new google.maps.LatLng(finalarr[i], finalarr[i + 1]),
                        animation: google.maps.Animation.DROP,
                        title: String(i/2 +1),
                        map: map
                    });



                }else{
                    var point = {lat: finalarr[i], lng: finalarr[i + 1]};
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(finalarr[i], finalarr[i + 1]),
                        animation: google.maps.Animation.DROP,
                        title: String(i/2+1),
                        map: map
                    });



                }
            }
        }
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyq8c94veFymCqLodwZXWsZHliezON15Y">
</script>
<!-- end of google maps -->

<!--Contact Us From-->
<!-- footer -->
<footer>
    <div class="copyright">
        <div class="container">
            <p>© 2018 ELMAW2AF. All rights reserved</p>
        </div>
    </div>
</footer>
<!-- //footer -->
<style>
    .copyright{
        padding:1.5em 0;
        text-align:center;
        background:#212121;
        background: #151515;
    }
    .copyright p{
        color:#b5b5b5;
        font-size:1em;
        margin:0;
        letter-spacing: 1px;
    }
    .copyright p a{
        color: #23B684;
        text-decoration: none;
    }
    .copyright p a:hover{
        color:#FFFFFF;
    }
</style>
</body>