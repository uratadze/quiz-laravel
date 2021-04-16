<?php

namespace App\Modules\Quiz\Database\Seeds;

use Illuminate\Database\Seeder;
use  App\Modules\Quiz\Models\Quiz;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quizzes = [
            [
                'title' => 'რომელი პროგრამული ენა გირჩევნიათ?',
                'creator'  => 'გიორგი ურატაძე',
                'description' => 'აირჩიეთ ის პროგრამული ენა რომელთან შეხებაც გქონიათ',
                'picture_path' => 'https://static1.smartbear.co/smartbearbrand/media/images/blog/what%E2%80%99s-the-best-programming-language-to-learn-first.png?ext=.png',
                'status' => true,
                'multi_select' => true,
                'started_at' => now(),
                'ended_at' => now()->add(1, 'year'),
            ],
            [
                'title' => 'რომელი ტიპის ვებ სერვისს იყენებთ ყველაზე ხშირად ?',
                'creator'  => 'გიორგი ურატაძე',
                'description' => 'ჩამოთვლილთაგან ეირჩიეთ მხოლოდ ერთი',
                'picture_path' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzHz1dJbENzM23kpPOU0p2dUZX_kGSTlWRI14yaPTJW2cA2ui3wBUwiieOrHt0U3i4E_I&usqp=CAU',
                'status' => true,
                'multi_select' => false,
                'started_at' => now(),
                'ended_at' => now()->add(1, 'year'),
            ],

            [
                'title' => 'როგორი ანაზღაურება იქნება თქვენთვის მისაღები?',
                'creator'  => 'გიორგი ურატაძე',
                'description' => 'ჩამოთვლილთაგან ეირჩიეთ მხოლოდ ერთი',
                'picture_path' => 'https://img.etimg.com/thumb/msid-80829269,width-1200,height-900,imgsize-266007,overlay-economictimes/photo.jpg',
                'status' => true,
                'multi_select' => false,
                'started_at' => now(),
                'ended_at' => now()->add(1, 'year'),
            ],

            [
                'title' => 'ჩამოთვლილთაგან რომელ საიტებზე უყურებთ ფილმებს ?',
                'creator'  => 'გიორგი ურატაძე',
                'description' => 'ჩამოთვლილთაგან ეირჩიეთ მხოლოდ ერთი',
                'picture_path' => 'https://s3-us-west-2.amazonaws.com/flx-editorial-wordpress/wp-content/uploads/2018/03/13153742/RT_300EssentialMovies_700X250.jpg',
                'status' => true,
                'multi_select' => true,
                'started_at' => now(),
                'ended_at' => now()->add(1, 'year'),
            ],

            [
                'title' => 'რომელი ფრეიმვორკს იყენებთ?',
                'creator'  => 'გიორგი ურატაძე',
                'description' => 'აირჩიეთ ის ფრეიმვორკი რომელთან უშუალო შეხება გქონიათ',
                'picture_path' => 'https://data-flair.training/blogs/wp-content/uploads/sites/2/2019/07/JavaScript-Framework-2.jpg',
                'status' => false,
                'multi_select' => false,
                'started_at' => now(),
                'ended_at' => now()->add(1, 'year'),
            ],
            [
                'title' => 'რომელი სისტემას ანიჭებთ უპირატესობას?',
                'creator'  => 'გიორგი ურატაძე',
                'description' => 'აირჩიეთ ის ოპერაციული სისტემა რომელიც მოგწონთ',
                'picture_path' => 'https://lh3.googleusercontent.com/proxy/4JtcSfODXrrZ_TlmESg4Ua-XrKE7FTB43FMa0iF2cKW5_NC2JtZVQy_xgeg6hqPualobuw7hyVx9A8g6Jpv0m9gWF5P9R6YcoBkdmrN9Zcbq',
                'status' => true,
                'multi_select' => false,
                'started_at' => now()->add(1, 'year'),
                'ended_at' => now(),
            ],
        ];

        if(Quiz::get()->count() == 0)
        {
            foreach($quizzes as $quiz)
            {
                Quiz::updateOrCreate($quiz);
            }
        }

    }
}
