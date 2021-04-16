<?php

namespace App\Modules\Quiz\Database\Seeds;

use Illuminate\Database\Seeder;
use App\Modules\Quiz\Models\QuizOption;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            [
                'quiz_id' => 1,
                'option' => 'python',
            ],
            [
                'quiz_id' => 1,
                'option' => 'php',
            ],
            [
                'quiz_id' => 1,
                'option' => 'java',
            ],
            [
                'quiz_id' => 1,
                'option' => 'c#',
            ],
            [
                'quiz_id' => 2,
                'option' => 'rest',
            ],
            [
                'quiz_id' => 2,
                'option' => 'soap',
            ],
            [
                'quiz_id' => 3,
                'option' => '2000GEL/Month',
            ],
            [
                'quiz_id' => 3,
                'option' => '1000GEL/Month',
            ],
            [
                'quiz_id' => 3,
                'option' => '700GEL/Month',
            ],
            [
                'quiz_id' => 3,
                'option' => '4000GEL/Month',
            ],
            [
                'quiz_id' => 4,
                'option' => 'adjaranet',
            ],
            [
                'quiz_id' => 4,
                'option' => 'croconet',
            ],
            [
                'quiz_id' => 4,
                'option' => 'geositebi',
            ],
            [
                'quiz_id' => 4,
                'option' => 'movie.ge',
            ],
            [
                'quiz_id' => 5,
                'option' => 'laravel',
            ],
            [
                'quiz_id' => 5,
                'option' => 'symfony',
            ],
            [
                'quiz_id' => 6,
                'option' => 'mac os',
            ],
            [
                'quiz_id' => 6,
                'option' => 'windows',
            ],
            [
                'quiz_id' => 6,
                'option' => 'ubuntu',
            ],
        ];

        if(QuizOption::get()->count() == 0)
        {
            foreach ($options as $option)
            {
                QuizOption::updateOrCreate($option);
            }
        }
    }
}
