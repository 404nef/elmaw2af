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
    public $currentroute =[];
    public $bestroutes=[];
    public function startgraph(Request $request){
        $this->constructgraph(Street::find($request->location)->street_name,Street::find($request->destination)->street_name);
        //print_r($this->Routes);
        /*foreach ($this->Routes as $key => $value) {
              echo "<h1>Childs of".$key."<br>";
                  foreach ($value as $val) {
                      $st = Street::findorFail($val);
                      echo $st['street_name']."->";
                  }
                  echo "<br><br>";
          }
        */
        foreach ($this->bestroutes as $bestroute) {
            for($i = 0 ; $i<count($bestroute) ;$i++)
            {
                if($i%2==0){
                    echo "Street name :".$bestroute[$i]."<br>";
                }else{
                    echo "Transport number : ".$bestroute[$i];
                    echo"<br>";
                }
            }
            echo "<br><br><br><br><br>";
        }
    }
    public function constructgraph($location,$destination){
        $this->initialdestination=Street::where('street_name',$destination)->first();
        if(!in_array($location,$this->currentroute)) {
            array_push($this->currentroute, $location);
            array_push($this->currentroute, -1);
        }
        //print_r($this->currentroute);
        //print_r($this->bestroutes);
        if($location!=$destination) {
            $this->Routes[$location] = $this->findchilds($location);
            foreach ($this->Routes as $key => $value) {
                if ($key == $location) {
                    for($i =0 ; $i < count($value) ;$i+=2) {
                        print_r($this->currentroute);
                        $st = Street::findorFail($value[$i]);
                        array_push($this->currentroute, $st['street_name']);
                        array_push($this->currentroute, $value[$i+1]);
                        $this->constructgraph($st['street_name'], $destination);
                        array_pop($this->currentroute);
                        array_pop($this->currentroute);

                    }
                }
            }
        }else{
            if($location==$destination) {
                if (!in_array($this->currentroute,$this->bestroutes)) {
                    array_push($this->bestroutes, $this->currentroute);
                }
            }
        }
    }
    public function findchilds($location){
        $street = Street::where('street_name',$location)->first();
        $transports = DB::table('street_transport')->where('street_id',$street['id'])->get();
        $children = [];
        //echo "<br><br><br><br>";
        //echo "Childs of" .$location."<br>";
        //print_r($this->currentroute);

        if(count($transports)>0) {
            foreach ($transports as $transport) {
                if ($transport->street_next_id!=0) {
                    $st = Street::find($transport->street_next_id);
                    if( !in_array($st['street_name'],$this->currentroute)) {
                        array_push($children, $transport->street_next_id);
                        array_push($children, $transport->transport_id);
                    }
                }
                if ($transport->street_prev_id!=0) {
                    $st = Street::find($transport->street_prev_id);
                    if( !in_array($st['street_name'],$this->currentroute)) {
                        //echo "prev".$st['street_name']."<br>";
                        array_push($children, $transport->street_prev_id);
                        array_push($children, $transport->transport_id);
                    }
                }
            }
        }
        //print_r($this->currentroute);
        //print_r($children);
        //echo "<br><br><br><br>";
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