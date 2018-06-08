<html>

<head>

    @include('layouts.links')
    <title>Dashboard</title>

    <style>
        #header{
            background-color: #2e6da4;
            padding: 50px;
            font-size: 100px;
        }
        #cards{
            padding: 100px;
            background: #F2F2F2;
            color: white;
            font-size: 30px;
        }
    </style>
</head>



<body>

<section id="header">
    <div class="container text-center text-white">
        <p><i class="fas fa-archive"></i> Dashboard</p>
    </div>
</section>


<section id="cards">

    <div class="container  text-center justify-content-center">
        <div class="row">



            <div class="col-sm-4">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Reviews</div>
                    <div class="card-body">
                        <h5 class="card-title">{{count($reviews)}}</h5>
                        <form action="{{route('Admin.show')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type = "hidden" name="whattoshow" value="Reviews">
                                <button class="btn btn-secondary">View</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-sm-4">

                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Streets</div>
                    <div class="card-body">
                        <h5 class="card-title">{{count($streets)}}</h5>
                        <form action="{{route('Admin.show')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type = "hidden" name="whattoshow" value="streets">
                                <button class="btn btn-secondary">View</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <div class="col-sm-4">

                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header">Transports</div>
                    <div class="card-body">
                        <h5 class="card-title">{{count($transports)}}</h5>
                        <form action="{{route('Admin.show')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type = "hidden" name="whattoshow" value="transports">
                                <button class="btn btn-secondary">View</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>



<main class="py-4">
    @yield('content')
</main>




@include('layouts.footer')

</body>






</html>