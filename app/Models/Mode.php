<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mode extends Model
{
    use HasFactory;

    protected $table = 'modes';

    protected $fillable = [
        'title',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class, 'mode_id');
    }
}
