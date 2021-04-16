<?php

namespace App\Services;

use App\Modules\Quiz\Models\Statistic;
use App\Modules\Quiz\Models\Quiz;
use Illuminate\Support\Facades\Cookie;

class QuizService extends Quiz
{
    /**
     * @return mixed
     */
    public function getSortedQioz()
    {
        return $this->getActiveQuiz()->with(['options' => function ($options) {
            $options->join('statistics', 'quiz_options.id', '=', 'statistics.option_id', 'left')
                ->withCount('statistics')
                ->groupBy('quiz_options.id')
                ->orderBy('statistics_count', 'desc')
            ;
        }]);
    }

    /**
     * @param integer $quizId
     * @return bool
     */
    public function validatetionRule($quizId)
    {
        if (is_array($quizId) && !empty($quizId))
        {
            foreach ($quizId as $key => $quiz)
            {
                $targetId = request()->quiz ? $quiz : $key;
                if($this->checkQuiz($targetId))
                {
                    return true;
                }
            }
        }
    }

    /**
     * @param $quizId
     * @return bool
     */
    protected function checkQuiz($quizId)
    {
        if(auth()->id())
        {
            $options = $this->find($quizId)->options;
            $arr = $options->pluck('id')->toArray();
            $base = Statistic::where('user_id', auth()->id())->whereIn('option_id', $arr)->count();
            return $base > 0;
        }
        else
        {
            return Cookie::get($quizId) !== null;
        }
    }

    /**
     * @param $request
     */
    public function vote($request)
    {
        $userId = auth()->id();
        if($request->quiz)
        {
            foreach($request->quiz as $key => $params)
            {
                Statistic::create([
                    'option_id' => $key,
                    'user_id' => $userId
                ]);
                Cookie::queue($params, $params, 10000);
            }
        }
        elseif($request->quiz_one)
        {
            $quizId = array_keys($request->quiz_one)[0];
            Statistic::create([
                'option_id' => ($request->quiz_one)[$quizId],
                'user_id' => $userId
            ]);
            Cookie::queue($quizId, $quizId, 10000);
        }

    }

    /**
     * @return array
     */
    public function getStatistics()
    {
        $userId = auth()->id();
        $statistics = Statistic::where('user_id', $userId);
        return [
            'voteSum' => $statistics->count(),
            'statistics'=> $statistics,
            'votes' => new Statistic,
        ];
    }

}
