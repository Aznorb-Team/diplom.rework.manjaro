<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_Work extends Model
{
    use HasFactory;

    protected $table = 'status_work';

    protected $fillable = [
        'title',
    ];


    public function application()
    {
        return $this->belongsTo(Application::class, 'status_work_id');
    }
}
