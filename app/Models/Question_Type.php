<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question_Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function expert_question(){
        return $this->belongsTo(Expert_Question::class, 'type', 'id');
    }
}
