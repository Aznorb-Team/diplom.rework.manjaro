<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ris_Votes extends Model
{
    use HasFactory;

    protected $table = 'ris_vote';

    protected $fillable = [
        'success_count',
        'unsuccess_count',
        'application_id',
    ];

    public function employee_vote(){
        return $this->belongsToMany(User::class, 'who_voted_ris', 'ris_vote_id', 'employee_id');
    }
}
