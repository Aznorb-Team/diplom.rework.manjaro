<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $table = 'stages';

    protected $fillable = [
        'form_id',
        'order_num',
        'title',
        'role_id',
        'type',
    ];

    public function form(){
        return $this->hasOne(Form::class, 'id','form_id');
    }
}
