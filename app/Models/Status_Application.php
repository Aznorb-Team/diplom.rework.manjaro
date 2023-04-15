<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_Application extends Model
{
    use HasFactory;

    protected $table = 'status_application';

    protected $fillable = [
        'title',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class, 'status_application_id');
    }
}
