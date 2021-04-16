<?php

namespace App\Modules\Quiz\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    /**
     * @var string
     */
    protected $table='statistics';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var string[]
     */
    protected $fillable = [
        'option_id',
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quizOptions()
    {
        return $this->belongsTo(QuizOption::class,'option_id','id');
    }

    /**
     * @param $optionId
     * @return mixed
     */
    public function getVoteCount($optionId)
    {
        return $this->where('option_id', $optionId)->whereNotNull('user_id')->count();
    }
}
