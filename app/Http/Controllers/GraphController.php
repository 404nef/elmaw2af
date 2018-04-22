<?php
namespace App\Http\Controllers;
use App\Street;
use App\Transport;
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
    public $badroutes=[];
    public $tranzites=[];
    public $numbers=[];
    public $costestmiation=[];
    public $types=[];
    public $costtillnow=0;
    public $besttypes=[];
    public $failed=[];
    public $roadtodestination=[];
    public $done=false;



    public function get_coordinates($city, $street, $province)
    {
        $address = "Salah Salem Street";
        $url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response);
        echo $lat = $response_a->results[0]->geometry->location->lat;
        echo "<br />";
        echo $long = $response_a->results[0]->geometry->location->lng;
    }


    public function GetDrivingDistance($lat1, $lat2, $long1, $long2)
    {
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins="."30.049374".","."31.274628"."&destinations="."30.066912".","."31.285209"."&mode=driving&language=pl-PL";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
        $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
        $time = $response_a['rows'][0]['elements'][0]['duration']['text'];
        print_r (array('distance' => $dist, 'time' => $time));
    }
    public function mergsorttranzites(&$bestroutes,&$costetimation,&$number,&$besttypes,&$finalbestroutesres,&$finalnumbersres,&$finalcostestimationres,&$finalbesttypesres){

        if(count($bestroutes)==1){
            return ;
        }
        $leftbestroute =[];
        $rightbestroute = [];
        $leftnumbers =[];
        $rightnumbers = [];
        $leftcostestmiation =[];
        $rightcostestmiation = [];
        $leftbesttypes=[];
        $rightbesttypes = [];


        $middle = (int) ( count($bestroutes)/2 );

        for( $i=0; $i < $middle; $i++ ){
            $leftbestroute[]=$bestroutes[$i];
            $leftnumbers[]=$number[$i];
            $leftcostestmiation[]=$costetimation[$i];
            $leftbesttypes[]=$besttypes[$i];
        }

        // Make right
        for( $i = $middle; $i < count($bestroutes); $i++ ){
            $rightbestroute[]=$bestroutes[$i];
            $rightnumbers[]=$number[$i];
            $rightcostestmiation[]=$costetimation[$i];
            $rightbesttypes[]=$besttypes[$i];
        }

        $this->mergsorttranzites($leftbestroute,$leftcostestmiation,$leftnumbers,$leftbesttypes,$finalbestroutesres,$finalnumbersres,$finalcostestimationres,$finalbesttypesres);
        $this->mergsorttranzites($rightbestroute,$rightcostestmiation,$rightnumbers,$rightbesttypes,$finalbestroutesres,$finalnumbersres,$finalcostestimationres,$finalbesttypesres);
        $this->mergetwoarrays($leftbestroute,$rightbestroute,$leftcostestmiation,$rightcostestmiation,$leftnumbers,$rightnumbers,$leftbesttypes,$rightbesttypes,$finalbestroutesres,$finalnumbersres,$finalcostestimationres,$finalbesttypesres);
        //return;


    }
    public function mergetwoarrays(&$leftbestroute,&$rightbestroute,&$leftcostestmiation,&$rightcostestmiation,&$leftnumbers,&$rightnumbers,&$leftbesttypes,&$rightbesttypes,&$finalbestroutesres,&$finalnumbersres,&$finalcostestimationres,&$finalbesttypesres){

        $resultbesttoutes = [];
        $resultnumbers = [];
        $resultbesttypes = [];
        $resultcostestimation = [];

        while(count($leftbestroute) > 0 || count($rightbestroute) > 0){
            if(count($leftbestroute) > 0 && count($rightbestroute) > 0){
                if($leftnumbers[0] < $rightnumbers[0]){
                    $resultbesttoutes[]=array_shift($leftbestroute);
                    $resultnumbers []= array_shift($leftnumbers);
                    $resultbesttypes []= array_shift($leftbesttypes);
                    $resultcostestimation []= array_shift($leftcostestmiation) ;
                } else {
                    $resultbesttoutes[]=array_shift($rightbestroute);
                    $resultnumbers []= array_shift($rightnumbers);
                    $resultbesttypes []= array_shift($rightbesttypes);
                    $resultcostestimation []= array_shift($rightcostestmiation) ;
                }
            } elseif (count($leftbestroute) > 0){
                $resultbesttoutes[]=array_shift($leftbestroute);
                $resultnumbers []= array_shift($leftnumbers);
                $resultbesttypes []= array_shift($leftbesttypes);
                $resultcostestimation []= array_shift($leftcostestmiation) ;
            } elseif (count($rightbestroute) > 0){
                $resultbesttoutes[]=array_shift($rightbestroute);
                $resultnumbers []= array_shift($rightnumbers);
                $resultbesttypes []= array_shift($rightbesttypes);
                $resultcostestimation []= array_shift($rightcostestmiation) ;
            }



        }
        print_r($resultnumbers);
        /*$finalbestroutesres=$resultbesttoutes;
        $finalbesttypesres=$resultbesttypes;
        $finalcostestimationres=$resultcostestimation;
        $finalnumbersres=$resultnumbers;
        */
        //return ;

    }
    public function sortaccordingtranzites(){
        for($i = 0 ; $i < count($this->bestroutes) ; $i++){
            for($j=$i+1;$j<count($this->bestroutes);$j++){
                if($this->numbers[$i]>$this->numbers[$j]){
                    $temp =$this->bestroutes[$i];
                    $this->bestroutes[$i]=$this->bestroutes[$j];
                    $this->bestroutes[$j]=$temp;
                    $temp=$this->numbers[$i];
                    $this->numbers[$i]=$this->numbers[$j];
                    $this->numbers[$j]=$temp;
                    $temp=$this->costestmiation[$i];
                    $this->costestmiation[$i]=$this->costestmiation[$j];
                    $this->costestmiation[$j]=$temp;
                    $temp=$this->besttypes[$i];
                    $this->besttypes[$i]=$this->besttypes[$j];
                    $this->besttypes[$j]=$temp;
                }
            }
        }
    }
    public function startgraph(Request $request){
        $this->initiallocation=Street::find($request->location)->street_name;
        $arrival = Street::find($request->destination)->street_name;
        //$transports = DB::table('street_transport')->where('street_id',$request->destination)->get();

        //echo "<br><br><br><br>";
        //echo "Childs of" .$location."<br>";
        //print_r($this->currentroute);


        $this->constructgraph($this->initiallocation,$arrival);

        $finalbestroutesres=[];

        $finalnumbersres=[];

        $finalcostestimationres=[];

        $finalbesttypesres=[];
        $this->sortaccordingtranzites();
        //print_r($this->numbers);
        //$this->mergsorttranzites($this->bestroutes,$this->costestmiation,$this->numbers,$this->besttypes,$finalbestroutesres,$finalnumbersres,$finalcostestimationres,$finalbesttypesres);
        //print_r($finalnumbersres);

        return view('result')->with('bestroutes',$this->bestroutes)->with('costestimation',$this->costestmiation)->with('besttypes',$this->besttypes)->with("destination",$arrival)->with('numbers',$this->numbers);
    }
    public function constructgraph($location,$destination){
        $this->initialdestination=Street::where('street_name',$destination)->first();
        if($location==$this->initiallocation) {
            array_push($this->currentroute, $location);
            array_push($this->currentroute, -1);
        }
        //print_r($this->currentroute);
        //print_r($this->bestroutes);

        if($location!=$destination&&count(array_unique($this->tranzites))<=2) {
            $this->Routes[$location] = $this->findchilds($location);
            if(count($this->Routes[$location])>0) {
                foreach ($this->Routes as $key => $value) {
                    if ($key == $location) {
                        for ($i = 0; $i < count($value); $i += 2) {
                            if(count($this->tranzites)>0){
                                //print_r($this->tranzites);
                                $st = Street::findorFail($value[$i]);
                                $transportneeded = Transport::findorFail($value[$i + 1]);
                                if($value[$i+1]!=$this->tranzites[count($this->tranzites)-1]&&!in_array($value[$i + 1],$this->tranzites)) {
                                    array_push($this->currentroute, $st['street_name']);
                                    array_push($this->currentroute, $transportneeded->Transport_number);
                                    array_push($this->tranzites, $value[$i + 1]);
                                    array_push($this->types,$transportneeded->Transport_type);
                                    $this->costtillnow+=$transportneeded->Ticket_cost;
                                    //echo $this->costtillnow;
                                    //echo "<br>";

                                    $this->constructgraph($st['street_name'], $destination);

                                    $this->costtillnow-=$transportneeded->Ticket_cost;
                                    //echo $this->costtillnow;
                                    //echo "<br>";
                                    array_pop($this->currentroute);
                                    array_pop($this->currentroute);
                                    array_pop($this->tranzites);
                                    array_pop($this->types);
                                }else if ($value[$i+1]==$this->tranzites[count($this->tranzites)-1]&&in_array($value[$i + 1],$this->tranzites)){
                                    array_push($this->currentroute, $st['street_name']);
                                    array_push($this->currentroute, $transportneeded->Transport_number);
                                    array_push($this->tranzites, $value[$i + 1]);
                                    array_push($this->types,$transportneeded->Transport_type);
                                    if(true) {
                                        $this->constructgraph($st['street_name'], $destination);
                                    }else{
                                        if (!in_array($this->currentroute,$this->bestroutes)) {
                                            array_push($this->bestroutes, $this->currentroute);
                                            array_push($this->numbers,count(array_unique($this->tranzites)));
                                            array_push($this->costestmiation,$this->costtillnow);
                                            array_push($this->besttypes,$this->types);


                                        }
                                    }
                                    array_pop($this->currentroute);
                                    array_pop($this->currentroute);
                                    array_pop($this->tranzites);
                                    array_pop($this->types);
                                }
                            }else{

                                $transportneeded = Transport::findorFail($value[$i + 1]);
                                $st = Street::findorFail($value[$i]);
                                array_push($this->currentroute, $st['street_name']);
                                array_push($this->currentroute, $transportneeded->Transport_number);
                                array_push( $this->tranzites,$value[$i + 1]);
                                $this->costtillnow+=$transportneeded->Ticket_cost;
                                //echo $this->costtillnow;
                                //echo "<br>";
                                array_push($this->types,$transportneeded->Transport_type);
                                $this->constructgraph($st['street_name'], $destination);

                                $this->costtillnow-=$transportneeded->Ticket_cost;
                                //echo $this->costtillnow;
                                //echo "<br>";
                                array_pop($this->currentroute);
                                array_pop($this->currentroute);
                                array_pop($this->tranzites);
                                array_pop($this->types);
                            }
                        }


                    }
                }
            }
        }else{
            if($location==$destination) {
                if (!in_array($this->currentroute,$this->bestroutes)) {
                    array_push($this->bestroutes, $this->currentroute);
                    array_push($this->numbers,count(array_unique($this->tranzites)));
                    array_push($this->costestmiation,$this->costtillnow);
                    array_push($this->besttypes,$this->types);


                }else{

                    array_push($this->failed,$this->currentroute);

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
                    if( !in_array($st['street_name'],$this->currentroute) && !in_array($st['street_name'],$this->failed)) {
                        array_push($children, $transport->street_next_id);
                        array_push($children, $transport->transport_id);
                    }
                }
                if ($transport->street_prev_id!=0) {
                    $st = Street::find($transport->street_prev_id);
                    if( !in_array($st['street_name'],$this->currentroute) &&!in_array($st['street_name'],$this->failed)) {
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

    public function filtercost(Request $request){
        $a = unserialize($request->costestimation);

        $this->costestmiation =  $a;
        $this->bestroutes = unserialize($request->bestroutes);

        $this->besttypes =  unserialize($request->besttypes);
        $this->numbers =  unserialize($request->numbers);

        for($i = 0 ; $i < count($this->bestroutes) ; $i++){
            for($j=$i+1;$j<count($this->bestroutes);$j++){

                if($this->costestmiation[$i]<$this->costestmiation[$j]){
                    $temp =$this->bestroutes[$i];
                    $this->bestroutes[$i]=$this->bestroutes[$j];
                    $this->bestroutes[$j]=$temp;
                    $temp=$this->numbers[$i];
                    $this->numbers[$i]=$this->numbers[$j];
                    $this->numbers[$j]=$temp;
                    $temp=$this->costestmiation[$i];
                    $this->costestmiation[$i]=$this->costestmiation[$j];
                    $this->costestmiation[$j]=$temp;
                    $temp=$this->besttypes[$i];
                    $this->besttypes[$i]=$this->besttypes[$j];
                    $this->besttypes[$j]=$temp;
                }
            }
        }
        $des = $request->destination;
        return view('result')->with('bestroutes',$this->bestroutes)->with('costestimation',$this->costestmiation)->with('besttypes',$this->besttypes)->with("destination",$des)->with('numbers',$this->numbers);

    }
}