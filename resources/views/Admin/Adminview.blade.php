@extends('Admin.Dashboard')

@section('content')

    <style>
        #content{
            padding: 50px;
        }
    </style>

<section id="content">
<div class="container text-center">
@if($whattoshow=='Reviews')


    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">From</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>


@foreach($reviews as $review)

    <tr>
        <th scope="row">{{$review->id}}</th>
        <td>{{$review->email}}</td>
        <td><a href="{{route('review.view',['id'=>$review->id])}}" class="btn btn-primary"> View</a></td>
    </tr>
@endforeach
        </tbody>
    </table>





 @elseif($whattoshow=='streets')


    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Street_Name</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>

        @foreach($streets as $street)
            <tr>
                <th scope="row">{{$street->id}}</th>
                <td>{{$street->street_name}}</td>
                <td>
                    <form action="{{route('Admin.edit')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="hidden" name="whattoedit" value="street">
                            <input type="hidden" name="street_id" value="{{$street->id}}">
                            <button class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </td>
                <td>
                    <form action="{{route('Admin.remove')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="hidden" name="whattodelete" value="street">
                            <input type="hidden" name="street_id" value="{{$street->id}}">
                            <button class="btn btn-primary">Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>




 @else






    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Transport number</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>

        @foreach($transports as $transport)
            <tr>
                <th scope="row">{{$transport->id}}</th>
                <td>{{$transport->Transport_number}}</td>
                <td>
                    <form action="{{route('Admin.edit')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="hidden" name="whattoedit" value="transport">
                            <input type="hidden" name="transport_id" value="{{$transport->id}}">
                            <button class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </td>
                <td>
                    <form action="{{route('Admin.remove')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="hidden" name="whattodelete" value="transport">
                            <input type="hidden" name="transport_id" value="{{$transport->id}}">
                            <button class="btn btn-primary">Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>







@endif













</div>

</section>


@endsection