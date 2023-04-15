<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $table = 'surveys';

    protected $fillable = [
        'title',
    ];

    public function questions(){
        return $this->belongsToMany(Expert_Question::class, 'survey_exp_question', 'survey_id', 'question_id');
    }
    public function app_survey()
    {
        return $this->belongsTo(App_Survey::class, 'survey_id', 'id');
    }
}
