<?php

namespace App\Http\Controllers;

use App\Review;
use App\Street;
use App\Transport;
use Illuminate\Http\Request;

class Admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function delete(Request $request){
        if($request->whattodelete=='street'){

            $street = Street::find($request->street_id);
            $street->delete();

        }else{

            $transport = Transport::find($request->transport_id);
            $transport->delete();


        }
        return redirect()->route('Admin.index');
    }
    public function returnediting(Request $request){

                if($request->whattoedit=='street'){

                    $street = Street::find($request->street_id);
                    return view('Admin.Adminedit')->with('whattoedit',$request->whattoedit)->with('streets',Street::all())->with('transports',Transport::all())->with('reviews',Review::all())->with('street',$street);

                }else{

                        $transport = Transport::find($request->transport_id);
                        return view('Admin.Adminedit')->with('whattoedit',$request->whattoedit)->with('streets',Street::all())->with('transports',Transport::all())->with('reviews',Review::all())->with('transport',$transport);



                }
    }
    public function  Addstreet(Request $request){

        $this->validate($request,[
           'streetname'=>'required',
            'lat'=>'required',
            'lang'=>'required',
        ]);
        $check = Street::where('street_name',$request->streetname)->get()->first();

        if($check==null){
            $st = new Street();
            $st->street_name = $request->streetname;
            $st->lang=$request->lang;
            $st->lat = $request->lat;
            $st->save();
        }

        return redirect()->back();
    }
    public function editneeded(Request $request){
        if($request->whattosave=='transport'){
            $this->validate($request,[
                'Transport_number'=>'required',
                'Transport_type'=>'required',
                'Ticket_cost'=>'required',
            ]);
            $check = Transport::where('Transport_number',$request->Transport_number)->get()->first();
            if($check==null||$check->id==$request->transport_id){
                $transport = Transport::find($request->transport_id);
                $transport->Transport_number=$request->Transport_number;
                $transport->Transport_type = $request->Transport_type;
                $transport->Ticket_cost = $request->Ticket_cost;

                $transport->save();
            }


        }else{


            $this->validate($request,[
                'streetname'=>'required',
                'lat'=>'required',
                'lang'=>'required',
            ]);



            $check = Street::where('street_name',$request->streetname)->get()->first();

            if($check==null||$check->id=$request->street_id){
                $st = Street::find($request->street_id);
                $st->street_name = $request->streetname;
                $st->lang=$request->lang;
                $st->lat = $request->lat;
                $st->save();
            }

        }

        return redirect()->route('Admin.index');
    }
    public function AddTransport(Request $request){

        $this->validate($request,[
            'Transport_number'=>'required',
            'Transport_type'=>'required',
            'Ticket_cost'=>'required',
        ]);

        $check = Transport::where('Transport_number',$request->Transport_number)->get()->first();


        if($check==null){
            $transport = new Transport();
            $transport->Transport_number=$request->Transport_number;
            $transport->Transport_type = $request->Transport_type;
            $transport->Ticket_cost = $request->Ticket_cost;

            $transport->save();
        }



        return redirect()->back();

    }

    public function AddRoute(Request $request){

            $this->validate($request,[
                'transport_id'=>'required',
                'street_id'=>'required',
                'street_next_id'=>'required',
                'street_prev_id'=>'required',
            ]);

        return redirect()->back();


    }

    public function returnreview($id){

        $review = Review::find($id);
        return view('Admin.Adminreview')->with('review',$review)->with('streets',Street::all())->with('transports',Transport::all())->with('reviews',Review::all());
    }

    public function index()
    {
        return view('Admin.AdminAdd')->with('streets',Street::all())->with('transports',Transport::all())->with('reviews',Review::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if($request->whattoshow=='Reviews'){

            return view('Admin.Adminview')->with('whattoshow',$request->whattoshow)->with('reviews',Review::all())->with('streets',Street::all())->with('transports',Transport::all());

        }elseif ($request->whattoshow=='streets'){

            return view('Admin.Adminview')->with('whattoshow',$request->whattoshow)->with('streets',Street::all())->with('transports',Transport::all())->with('reviews',Review::all());
        }else{
            return view('Admin.Adminview')->with('whattoshow',$request->whattoshow)->with('transports',Transport::all())->with('streets',Street::all())->with('reviews',Review::all());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
