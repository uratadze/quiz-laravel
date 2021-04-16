<?php

namespace App\Modules\Quiz\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    /**
     * @var string
     */
    protected $table='quizzes';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'creator',
        'description',
        'picture_path',
        'status',
        'multi_select',
        'started_at',
        'ended_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany(QuizOption::class, 'quiz_id','id');
    }

    /**
     * @return mixed
     */
    public function getActiveQuiz()
    {
        return $this->where('status', 1)->where('started_at', '<', now())->where('ended_at', '>', now());
    }
}
