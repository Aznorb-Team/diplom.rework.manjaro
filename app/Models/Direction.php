<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;

    protected $table = 'directions';

    protected $fillable = [
        'title',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class, 'direction_id');
    }
}
