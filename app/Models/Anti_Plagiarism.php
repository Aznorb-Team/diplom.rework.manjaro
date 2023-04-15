<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anti_Plagiarism extends Model
{
    use HasFactory;

    protected $table = 'anti_plagiarisms';

    protected $fillable = [
        'title',
        'link',
        'borrowing',
        'citation',
        'originality',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class, 'anti_plagiarism_id');
    }
}
