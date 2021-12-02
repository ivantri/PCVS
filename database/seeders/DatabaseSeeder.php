<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\tb_vaccine::insert([
            [
                "manufacturer"=>"Sinopharm",
                "vaccinename"=>"Sinovac"
            ],[
                "manufacturer"=>"Oxford",
                "vaccinename"=>"Astrazeneca"
            ],
        ]);

        \App\Models\tb_healthcare::insert([
            [
                "centrename"=>"Juju Healthcare",
                "address"=>"Jl. Merpati nomor 22, Kerobokan, Badung."
            ],[
                "centrename"=>"Bali Healing",
                "address"=>"Jl. Gatot Subroto nomor 22, Pererenan, Denpasar."
            ],
        ]);
    }
}
