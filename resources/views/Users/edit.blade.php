<head>
    @include('layouts.links')
    <title>Edit your profile</title>
    <style type="text/css">
        #greetings{
            background-image: url("{{asset('greenbg.jpg')}}");
        }
        #profile{
            background: linear-gradient(0deg,rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url("{{asset('editprofilebgd.jpg')}}");
            background-attachment: fixed;
            background-size: cover;
        }
        #myhistory{
            padding: 50px;
        }
    </style>
</head>
<body>


<section id="greetings">
    <div class="container text-center text-white">
        <h1 class="display-3">Hello,{{\Illuminate\Support\Facades\Auth::user()->name}} !</h1>
    </div>
</section>

<section id="profile">

    <div class="container" id="infosection"><!--Containerstart-->
        <div class="row"><!--rowstart-->

            <div class="col-md-12"><!--col1start-->

            <form action="{{route('Edit.profile')}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="card mt-5">
                    <div class="card-header">
                        Info
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" class="form-control" name="email" id="email" placeholder="example@example.com">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" id="username" class="form-control" placeholder="Username">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="password">
                        </div>
                        <div class="d-flex flex-row justify-content-center form-group"><button class="btn btn-primary btn-block" type="submit"><i class="far fa-save mr-2"></i>Save changes</button></div>

                    </div>
                </div>
             </form>
            </div><!--col2end-->


        </div><!--rowend-->
    </div><!--Containerend-->

</section>


<section id="myhistory ">
    <div class="container text-center">
        <h1 class="display-5">My History</h1>
        <table class="table text-center">
            <thead>
            <tr>
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col">Go</th>
            </tr>
            </thead>
            <tbody>
            {{count($histories)}}
            @foreach($histories as $history)
            <tr>

                <td>{{\App\Street::find($history->from_id)->street_name}}</td>
                <td>{{\App\Street::find($history->to_id)->street_name}}</td>
                <td>
                    <form action="{{route('Graph.start')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="hidden" name="location" value="{{$history->from_id}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="destination" value="{{$history->to_id}}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">YALLA</button>
                        </div>
                    </form></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>

















<!--Contact Us From-->
@include('layouts.footer')
</body>