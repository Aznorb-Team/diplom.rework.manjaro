<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App_Survey extends Model
{
    use HasFactory;

    protected $table = 'app_survey';

    protected $fillable = [
        'application_id',
        'survey_id',
        'question_id',
        'result',
    ];

    public function application(){
        return $this->hasOne(Application::class, 'id', 'application_id');
    }

    public function survey(){
        return $this->hasOne(Survey::class, 'id', 'survey_id');
    }

    public function question(){
        return $this->hasOne(Expert_Question::class, 'id', 'question_id');
    }
}
