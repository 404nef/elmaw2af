

        
        
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
                #filters{
                    padding : 50px;
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

        <!--Fliters Section -->
        <section id="filters">
        <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                    <form action="{{route('Filter.cost')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="costestimation" value="{{serialize($costestimation)}}">
                    <input type="hidden" name="bestroutes" value="{{ serialize($bestroutes) }}">
                    <input type="hidden" name="besttypes" value="{{ serialize($besttypes) }}">
                    <input type="hidden" name="numbers" value="{{ serialize($numbers) }}">
                    <input type="hidden" name="destination" value="{{ $destination }}">

                    <button class="btn btn-block btn-success" type="submit"><i class="far fa-money-bill-alt"></i>

  Cost</button>
                    </form>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                    <form action="/" method="get">
                    {{csrf_field()}}
                    <button class="btn btn-block btn-primary" type="submit"><i class="fas fa-home"></i>

   Back to home</button>
                    </form>
                    </div>
                    

                </div>
            </div>
        </div>

        </section>
        <!--Results-->
        <section id="results">
            <div class="container">
                <div class="row wrapper">
                    @for($i = 0 ; $i < count($bestroutes); $i++)
                    <div class="col-sm-12 col-xs-12 ">
                        <div class="card text-center routes align-content  border-rounded mb-3">
                            <div class="card-body text-center ">
                                <h5 class="card-title"><strong><i class="fas fa-road"></i> Route {{$i+1}}</strong></h5>
                                @for($j=0;$j<count($bestroutes[$i]);$j++)
                                 @if($j%2!=0&&$bestroutes[$i][$j]!=-1)
                                <!--type==bus-->
                                @if($bestroutes[$i][$j]!=$bestroutes[$i][$j-2])
                                <div class="d-flex flex-row">
                                    <img src="{{asset('bus.png')}}" class="img-fluid rounded-circle mr-3" style="width: 100px;height: 100px;" alt=""> <strong class="mt-5">{{$bestroutes[$i][$j]}} <br> From {{$bestroutes[$i][$j-3]}} <br> </strong>
                                </div>
                                @endif
                                @endif
                                @endfor
                                <div class="d-flex flex-row">
                                    <img src="{{asset('destinationreached.png')}}" class="img-fluid  mr-3" style="width: 100px;height: 100px;" alt=""> <strong class="mt-5">{{$destination}}</strong>
                                </div>
                                <a href="#" class="btn btn-success"><img src="{{asset('maps.png')}}" width="30" height="30" class="img-fluid mr-3" alt=""> Visualize route</a>

                            </div>


                            <div class="card-footer  text-white bg-success">
                                <strong>Cost estimated : {{$costestimation[$i]}} <i class="far fa-money-bill-alt"></i></strong>
                                <br>
                                <strong>Time estimated : 30 <i class="fas fa-clock"></i></strong>
                            </div>


                        </div>



                    </div>

                    @endfor


                </div>
            </div>
        </section>



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
                                    <label for="Email" class="display-6">Email</label>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text "><i class="fas fa-at"></i></div>
                                        <input type="text" class="form-control"required name="email" id="Email" placeholder="example@example.com">
                                    </div>
                                </div>
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

        <!--Contact Us From-->
        @include('layouts.footer')
        </body>