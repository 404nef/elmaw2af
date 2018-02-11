<?php

use Illuminate\Database\Seeder;

class Transport_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transport = new \App\Transport;
        $transport->Transport_number=180;
        $transport->Transport_type='Bus';
        $transport->Ticket_cost=3;
        $transport->save();


        $transport1 = new \App\Transport;
        $transport1->Transport_number=184;
        $transport1->Transport_type='Bus';
        $transport1->Ticket_cost=3;
        $transport1->save();



        $transport2 = new \App\Transport;
        $transport2->Transport_number=229;
        $transport2->Transport_type='Bus';
        $transport2->Ticket_cost=3;
        $transport2->save();





        $transport3= new \App\Transport;
        $transport3->Transport_number=941;
        $transport3->Transport_type='Bus';
        $transport3->Ticket_cost=3;
        $transport3->save();



        $transport5= new \App\Transport;
        $transport5->Transport_number=25;
        $transport5->Transport_type='Bus';
        $transport5->Ticket_cost=3;
        $transport5->save();


        $transport6= new \App\Transport;
        $transport6->Transport_number=35;
        $transport6->Transport_type='Bus';
        $transport6->Ticket_cost=3;
        $transport6->save();
    }
}
