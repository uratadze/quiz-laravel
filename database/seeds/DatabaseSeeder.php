<?php

use Illuminate\Database\Seeder;
use App\Modules\Quiz\Database\Seeds\QuizSeeder;
use App\Modules\Quiz\Database\Seeds\OptionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(QuizSeeder::class);
         $this->call(OptionSeeder::class);
    }
}
