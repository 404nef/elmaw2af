<?php

namespace App\Http\Controllers;

use App\Street;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;class GraphController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $Routes = [];
    public $Vistied=[];
    public $initiallocation;
    public $initialdestination;



    public function constructgraph($location,$destination){
        $this->initiallocation=Street::where('street_name',$destination)->first();
        $this->initialdestination=Street::where('street_name',$destination)->first();
        $this->Routes[$location] = $this->findchilds($location,$location);
        foreach ($this->Routes as $key => $value) {
            // $arr[3] will be updated with each value from $arr...
           foreach ($value as $val) {
               if ($val == $this->initialdestination->id) {
                   continue;
               } else {
                   $st = Street::find($val);
                   $this->constructgraph($st['street_name'], $destination);
               }
           }
        }
    }
    public function findchilds($parent,$location){
        $street = Street::where('street_name',$location)->first();
        $transports = DB::table('street_transport')->where('street_id',$street->id)->get();
        $children = [];

        if(count($transports)>0) {
            foreach ($transports as $transport) {
                if ($transport->street_next_id!=0|| $transport->street_next_id == $this->initialdestination->id || $transport->street_next_id != $this->initiallocation->id) {
                    //$st = Street::find($transport->street_next_id);
                    array_push($children, $transport->street_next_id);
                }

                if ($transport->street_prev_id!=0|| $transport->street_prev_id == $this->initialdestination->id || $transport->street_prev_id != $this->initiallocation->id) {
                    //$st = Street::find($transport->street_prev_id);
                    array_push($children, $transport->street_prev_id);
                }
            }
        }

        return $children;


    }
    public function index()
    {
        //
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
    public function show($id)
    {
        //
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
