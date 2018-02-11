<?php

use Illuminate\Database\Seeder;

class Transport_Street_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transport=\App\Transport::find(1);
        $transport->streets()->attach([1,2,3,4,5,6]);
        $transport->save();


        $transport=\App\Transport::find(2);
        $transport->streets()->attach([6,5,4,7,8,9,10,11,12,13,14]);
        $transport->save();


        $transport=\App\Transport::find(3);
        $transport->streets()->attach([15,16,10,17,18]);
        $transport->save();


        $transport=\App\Transport::find(4);
        $transport->streets()->attach([26,27,28,29,10]);
        $transport->save();


        $transport=\App\Transport::find(5);
        $transport->streets()->attach([19,20,21,8,3,22,10,23,18,24,25]);
        $transport->save();


        $transport=\App\Transport::find(6);
        $transport->streets()->attach([30,10,31,32,33]);
        $transport->save();






    }
}
