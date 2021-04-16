<?php

namespace App\Modules\Quiz\Http\Validation\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Services\QuizService;

class QuizCheck implements Rule
{

    public function passes($attribute, $value)
    {
        $quizService = new QuizService;
        return !$quizService->validatetionRule($value);
    }

    public function message()
    {
        return 'შენ უკვე მიეცი ხმა!';
    }
}
