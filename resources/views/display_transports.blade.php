<?php use App\Transport;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transports</title>
    <link rel="stylesheet" type="text/css" href="css/display_transports.css">
</head>

<body>
    <?php $counter=0; ?>
    <?php $counter1=0; ?>
    <?php $counter2=0; ?>
    <?php $counter3=0; ?>
    @if(count($v_best_routes1) > 0)
        <div class="transit-result-heading">
            <h2>Direct Transport Options</h2>
        </div>
        <div class="transit-result">
            @foreach ($v_best_routes1 as $bestroute)
                @if($counter1 == 6)
                    @break
                @endif

                <?php $transportselected =Transport::find($bestroute[count($bestroute)-1]);?>
                <div class="route-col">
                    <ul>
                        <li><span></span>
                            <div>
                                <div class="title">Bus <?php echo $transportselected['Transport_number']; ?></div>
                                <div class="info">From {{$bestroute[0]}} To {{$v_dest}}</div>
                                <div class="type">Ticket: <?php echo $transportselected['Ticket_cost']; ?> EGP</div>
                            </div> <span class="number"><span>01</span> <span>ARRIVED</span></span>
                        </li>
                    </ul>
                </div>

                    <?php
                    $counter++;
                    ?>
                    <?php
                    $counter1++;
                    ?>
            @endforeach
</div>
            <div class="clear"></div>
    @endif

    @if(count($v_best_routes2) > 0)
        <div class="transit-result-heading">
            <h2>Two Transits Options</h2>
        </div>
        <div class="transit-result">
            <?php $break_index=0;
            $total_cost=0;
            $before_break_index=0;?>
            @foreach ($v_best_routes2 as $bestroute)

                    @if($counter2 == 6)
                        @break
                    @endif

                <?php for($i =5;$i<count($bestroute);$i+=2){?>
                    <?php $break_index=0;$total_cost=0;?>
                    <?php $transportselected1 =Transport::find($bestroute[$i-2]);
                        $transportselected2 =Transport::find($bestroute[$i]);
                            ?>
                        @if($transportselected1 != $transportselected2)
                             <?php
                            $break_index=$i-3;
                            $total_cost = $transportselected1['Ticket_cost']+$transportselected2['Ticket_cost'];



                            break;
                            ?>

                         @endif


                <?php }?>

                    <div class="route-col">
                        <ul>
                            <li><span></span>
                                <div>
                                    <div class="title">Bus <?php echo $transportselected1['Transport_number']; ?></div>
                                    <div class="info">From {{$bestroute[0]}} To {{$bestroute[$break_index]}}</div>
                                    <div class="type">Ticket: <?php echo $transportselected1['Ticket_cost']; ?> EGP</div>
                                </div><span class="number"><span>01</span><span>SWITCH</span></span>
                            </li>
                            <li><span></span>
                                <div>
                                    <div class="title">Bus <?php echo $transportselected2['Transport_number']; ?></div>
                                    <div class="info">From {{$bestroute[$break_index]}} To {{$v_dest}}</div>
                                    <div class="type">Ticket: <?php echo $transportselected2['Ticket_cost']; ?> EGP<br><br> Trip cost: <?php echo $total_cost;?> EGP</div>
                                </div> <span class="number"><span>02</span> <span>ARRIVED</span></span>
                            </li>
                        </ul>
                    </div>

                <?php
                $counter++;
                ?>
                    <?php $counter2++; ?>
            @endforeach
        </div>
            <div class="clear"></div>
    @endif

    @if(count($v_best_routes3) > 0)
            <div class="transit-result-heading">
            <h2>Three Transits Options</h2>
            </div>
            <div class="transit-result">
            <?php $break_index=[];$transport1=[];$transport2=[];?>
            @foreach ($v_best_routes3 as $bestroute)
                @if($counter3 == 3)
                    @break
                @endif
                <?php $break_index=[];$transport1=[];$transport2=[];?>

                <?php for($i =5;$i<count($bestroute);$i+=2){?>
                <?php if(count($break_index) ==2)
                    {
                        break;
                    }?>
                <?php $transportselected1 =Transport::find($bestroute[$i-2]);
                $transportselected2 =Transport::find($bestroute[$i]);
                ?>
                @if($transportselected1 != $transportselected2)
                    <?php

                    array_push($break_index,$i-3);
                        array_push($transport1,$transportselected1);
                        array_push($transport2,$transportselected2);

                    ?>

                @endif


                <?php }?>

                <div class="route-col">
                    <ul>
                        <li><span></span>
                            <div>
                                <div class="title">Bus <?php echo $transport1[0]['Transport_number']; ?></div>
                                <div class="info">From {{$bestroute[0]}} To {{$bestroute[$break_index[0]]}}</div>
                                <div class="type">Ticket: <?php echo $transport1[0]['Ticket_cost']; ?> EGP</div>
                            </div><span class="number"><span>01</span><span>SWITCH</span></span>
                        </li>
                        <li><span></span>
                            <div>
                                <div class="title">Bus <?php echo $transport2[0]['Transport_number'] ?></div>
                                <div class="info">From {{$bestroute[$break_index[0]]}} To {{$bestroute[$break_index[1]]}}</div>
                                <div class="type">Ticket: <?php echo $transport2[0]['Ticket_cost']; ?> EGP</div>
                            </div> <span class="number"><span>02</span><span>SWITCH</span> </span>
                        </li>
                        <li><span></span>
                            <div>
                                <div class="title">Bus <?php echo $transport2[1]['Transport_number']; ?> </div>
                                <div class="info">From {{$bestroute[$break_index[1]]}} To {{$v_dest}}</div>
                                <div class="type">Ticket: <?php echo $transport2[1]['Ticket_cost']; ?> EGP<br><br> Trip cost: <?php  echo ($transport2[1]['Ticket_cost']+$transport2[0]['Ticket_cost']+$transport1[0]['Ticket_cost']) ;?> EGP</div>
                            </div> <span class="number"><span>03</span> <span>ARRIVED</span></span>
                        </li>
                    </ul>
                </div>

                <?php
                $counter++;
                ?>
                <?php $counter3++; ?>
            @endforeach
        </div>
            <div class="clear"></div>
    @endif




<div class="clear"></div>
</body>
</html>
