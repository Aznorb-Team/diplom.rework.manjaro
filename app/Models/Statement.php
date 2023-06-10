<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    use HasFactory;

    protected $table = 'statements';

    protected $fillable = [
        'link',
    ];

    public function ris_application()
    {
        return $this->belongsTo(Application::class, 'ris_statement_id');
    }
}
