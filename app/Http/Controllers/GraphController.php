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
    public $stackarray = [];
    public $suggestedroutes =[];
    public $goodroutes=[];


    public function startgraph(Request $request){
        $this->constructgraph(Street::find($request->location)->street_name,Street::find($request->destination)->street_name);
        foreach ($this->Routes as $key => $value) {
            echo "<h1> Child of ".$key."</h1>";
                foreach ($value as $val) {

                        $st = Street::findorFail($val);
                        echo $st['street_name']."--->";

                    }
                    echo "<br><br><br><br>";
                }

        /*foreach ($this->goodroutes as $goodroute) {
                        foreach ($goodroute as $value){
                            if($value==end($goodroute)) {
                                echo "<h2>" . $value . "</h2>";
                            }else{
                                echo "<h2>" . $value . "-></h2>";
                            }
                        }
                        echo "<br><br><br><br><br>";
            }
        */
    }

    public function constructgraph($location,$destination){

            $this->initialdestination=Street::where('street_name',$destination)->first();
            $this->Vistied[$location]=0;
            $this->Routes[$location] = $this->findchilds($location);


               array_push($this->suggestedroutes,$location);
               foreach ($this->Routes as $key => $value) {
                   if ($key == $location) {
                       foreach ($value as $val) {
                           if ($val == $this->initialdestination->id) {
                               array_push($this->suggestedroutes,$destination);
                               array_push($this->goodroutes,$this->suggestedroutes);
                               $this->suggestedroutes=[];
                               continue;
                           } else {
                               $st = Street::findorFail($val);
                               //echo "<h1> Child of ".$location."</h1> - > ".$st['street_name']."<br><br>";
                               $this->constructgraph($st['street_name'], $destination);
                           }
                       }
                   }
               }

               
    }


    public function findchilds($location){
        $street = Street::where('street_name',$location)->first();
        $transports = DB::table('street_transport')->where('street_id',$street['id'])->get();
        $children = [];
        $addtostack=false;
        if(count($transports)>0) {
            foreach ($transports as $transport) {

                if ($transport->street_next_id!=0) {

                    $st = Street::find($transport->street_next_id);
                    if( !array_key_exists($st['street_name'],$this->stackarray)) {

                        array_push($children, $transport->street_next_id);
                        $addtostack=true;
                    }
                }

                if ($transport->street_prev_id!=0) {

                    $st = Street::find($transport->street_prev_id);
                    if( !array_key_exists($st['street_name'],$this->stackarray)) {

                        array_push($children, $transport->street_prev_id);
                        $addtostack=true;
                    }
                }


            }
            if($addtostack){
                $this->stackarray[$location]=0;
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
