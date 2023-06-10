<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ums_Votes extends Model
{
    use HasFactory;

    protected $table = 'ums_vote';

    protected $fillable = [
        'success_count',
        'unsuccess_count',
        'application_id',
    ];

    public function employee_vote(){
        return $this->belongsToMany(User::class, 'who_votes_ums', 'ums_vote_id', 'employee_id');
    }
}
