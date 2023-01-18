<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Player;
use Illuminate\Database\Seeder;
use \App\Models\Sport;
use \App\Models\Position;
use \App\Models\Trainer;
use \App\Models\Team;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Sport::factory(10)->create();
        Position::factory(4)->create();
        Trainer::factory(10)->create();
        Team::factory(7)->create();
        Player::factory(30)->create();

    }
}
