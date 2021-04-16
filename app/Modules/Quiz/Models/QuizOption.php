<?php

namespace App\Modules\Quiz\Models;

use Illuminate\Database\Eloquent\Model;

class QuizOption extends Model
{
    /**
     * @var string
     */
    protected $table='quiz_options';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var string[]
     */
    protected $fillable = [
        'quiz_id',
        'option',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statistics()
    {
        return $this->hasMany(Statistic::class,'option_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id');
    }

    /**
     * @param $option
     * @param $quiz
     * @return float|int
     */
    public function getVotedOptionsCount($option, $quiz)
    {
        $vodeCount = (new Statistic)->where('option_id', $option->id)->count();
        $someCount = Statistic::whereIn('option_id', $quiz->options->pluck('id')->toArray())->count();
        return $someCount == 0 ? 0 : ($vodeCount/$someCount)*100;
    }
}
