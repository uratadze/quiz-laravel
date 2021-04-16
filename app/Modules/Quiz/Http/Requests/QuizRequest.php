<?php

namespace App\Modules\Quiz\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Modules\Quiz\Http\Validation\Rules\QuizCheck;

class QuizRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'quiz' => ['required_without:quiz_one', new QuizCheck],
            'quiz_one' => ['required_without:quiz', new QuizCheck],
        ];
    }
}
