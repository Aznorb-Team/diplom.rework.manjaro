<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert_Question extends Model
{
    use HasFactory;

    protected $table = 'expert_question';

    protected $fillable = [
        'title',
        'type',
    ];

    public function survey(){
        return $this->belongsToMany(Survey::class, 'survey_exp_question', 'question_id', 'survey_id');
    }
    public function app_survey()
    {
        return $this->belongsTo(App_Survey::class, 'question_id', 'id');
    }
    public function type_question(){
        return $this->hasOne(Question_Type::class, 'id','type');
    }
}
