@extends('Admin.Dashboard')

@section('content')

    <style>
        #buttons{
            padding: 50px;
        }
    </style>

<section id="buttons">
    <div class="container text-center justify-content-center">
        <div class="row">
            <div class="col-sm-4">


                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddtransportModal">
                    Add Transport
                </button>

            </div>
            <div class="col-sm-4">

                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#AddStreetmodal">
                    Add Street
                </button>

            </div>
            <div class="col-sm-4">

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddRouteModal">
                    Add Route
                </button>


            </div>
        </div>


    </div>


    <div class="modal fade" id="AddtransportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{route('Add.transport')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="cost">Transport number</label>
                            <input type="text" name="Transport_number" required="required" class="from-control">
                        </div>
                        <div class="form-group">
                            <label for="transporttype">Transport Type</label>
                            <select class="form-control" required="required" name="Transport_type" id="transporttype">
                                <option value="bus">Bus</option>
                                <option value="train">train</option>
                                <option value="microbus">microbus</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cost">Cost</label>
                            <input type="text" name="Ticket_cost" required="required" class="from-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="AddStreetmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <form action="{{route('Add.street')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Street name</label>
                            <input type="text" name="streetname" required="required" class="form-control" id="exampleFormControlInput1" placeholder="Street name">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Longtitude</label>
                            <input type="text" name="lang" required="required" class="form-control" id="exampleFormControlInput1" placeholder="Street name">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Latitude</label>
                            <input type="text" name="lat" required="required" class="form-control" id="exampleFormControlInput1" placeholder="Street name">
                        </div>
                        <div class="form-group">
                            <Button class="btn btn-primary">Add</Button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="AddRouteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <form action="" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="transportid">Transport Id</label>
                            <select class="form-control" required="required" name="transport_id" id="transportid">
                                <option id="" value="">1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="streetfromid">Transport Id</label>
                            <select class="form-control" required="required" name="street_id" id="streetfromid">
                                <option id="" value="">1</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="streettoid">Transport Id</label>
                            <select class="form-control" required="required" name="street_next_id" id="streettoid">
                                <option id="" value="">1</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="streettoid">Transport Id</label>
                            <select class="form-control" required="required" name="street_prev_id" id="streettoid">
                                <option id="" value="">1</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</section>









@endsection