<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $this->call(Street_seeder::class);
            $this->call(Transport_seeder::class);
            $this->call(Transport_Street_seeder::class);
    }
}
