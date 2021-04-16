<?php

namespace App\Modules\Quiz\Http\Controllers;

use App\Services\QuizService;
use App\Modules\Quiz\Http\Requests\QuizRequest;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    /**
     * @var QuizService
     */
    private $quizService;

    /**
     * QuizController constructor.
     * @param QuizService $quizService
     */
    public function __construct(QuizService $quizService)
    {
        $this->quizService = $quizService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('quiz::index')
            ->with('quizzes', $this->quizService->getSortedQioz()->get());
    }

    /**
     * @param QuizRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(QuizRequest $request)
    {
        $this->quizService->vote($request);
        return redirect()
            ->route('quiz')
            ->with('success', 'წარმატებით დაფიქსირდა თქვენი ხმა!');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function statistic()
    {
        return view('quiz::statistic')
            ->with($this->quizService->getStatistics());
    }

}
