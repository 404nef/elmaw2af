    <style type="text/css">
        #searchsection{
            background: url("{{asset('bg.jpeg')}}");
            background-attachment: fixed;
            background-size: cover;
            padding: 50px;
        }
    </style>
    <section id="searchsection">
        <div class="container wrapper">
            <div class="row">
                <div class="col-md-10  text-white  d-none d-lg-block">
                    <h1 class="display-4 " style="font-family: 'Roboto Slab', serif;">Want to go somewhere but lost <br> in the  transportaion system ?</h1>
                    <h2 class="display-1 text-green "><strong>IT IS OUR JOB TO GUIDE YOU!</strong></h2>
                    <h3 class="display-4 text-white " style="font-family: 'Noto Serif', serif;">Put your location and your destination to find out the way !</h3>
                </div>
                <div class="col-md-2 col-sm-12  text-white text-center ">
                    <div class="card bg-success " id="searchcard" style="width: 23rem;">
                        <div class="card-body " >
                            <h5 class="card-title display-4">Get Started !</h5>
                            <form action="{{route("Graph.start")}}" class="" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="location" class=""><h3 class="display-4" style="font-family: 'Lobster', cursive;">Location</h3></label>
                                    <select class="form-control form-control-lg " name="location" id="location">
                                        @foreach($streets as $street)
                                        <option value="{{$street->id}}">{{$street->street_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="destination" class=""><h3 class="display-4" style="font-family: 'Lobster', cursive;">Destination</h3></label>
                                    <select class="form-control form-control-lg" name="destination" id="destination">
                                        @foreach($streets as $street)
                                            <option value="{{$street->id}}">{{$street->street_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn btn-primary form-control" type="submit"><h3>YALLA !</h3></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>