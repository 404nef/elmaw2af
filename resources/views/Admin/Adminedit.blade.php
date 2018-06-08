
@extends('Admin.Dashboard')

@section('content')

    <style>
        #streetedit{
            padding: 50px;
        }
        #transportedit{
            padding: 50px;
        }
    </style>



@if($whattoedit=='street')



<section id="streetedit">
    <div class="container text-center justify-content-center">
        <p><h1 class="display-5">Edit street</h1></p>
        <form action="{{route('Admin.save')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <input type="hidden" name="whattosave" value="street">
                <input type="hidden" name="street_id" value="{{$street->id}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Street name</label>
                <input type="text" name="streetname" value="{{$street->street_name}}" required="required" class="form-control" id="exampleFormControlInput1" placeholder="Street name">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Longtitude</label>
                <input type="text" name="lang" value="{{$street->lang}}" required="required" class="form-control" id="exampleFormControlInput1" placeholder="Street name">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Latitude</label>
                <input type="text" name="lat" value="{{$street->lat}}" required="required" class="form-control" id="exampleFormControlInput1" placeholder="Street name">
            </div>
            <div class="form-group">
                <Button class="btn btn-primary">Update</Button>
            </div>
        </form>
    </div>
</section>



@else

<section id="transportedit">
    <div class="container justify-content-center text-center">
        <form action="{{route('Admin.save')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <input type="hidden" name="whattosave" value="transport">
                <input type="hidden" name="transport_id" value="{{$transport->id}}">
            </div>
            <div class="form-group">
                <label for="cost">Transport id</label>
                <input type="text" name="Transport_number" value="{{$transport->Transport_number}}" required="required" class="from-control">
            </div>
            <div class="form-group">
                <label for="transporttype">Transport Id</label>
                <select class="form-control" required="required" name="Transport_type" id="transporttype">
                    @if($transport->Transport_type=='bus')
                    <option id="" value="bus">Bus</option>
                        <option id="" value="train">Train</option>
                        <option id="" value="microbus">Microbus</option>
                     @elseif($transport->Transport_type=='train')
                        <option id="" value="train">Train</option>
                        <option id="" value="bus">Bus</option>
                        <option id="" value="microbus">Microbus</option>
                    @else
                        <option id="" value="microbus">Microbus</option>
                        <option id="" value="train">Train</option>
                        <option id="" value="bus">Bus</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="cost">Cost</label>
                <input type="text" name="Ticket_cost" value="{{$transport->Ticket_cost}}" required="required" class="from-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</section>





 @endif






















@endsection