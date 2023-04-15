<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teaching_Material extends Model
{
    use HasFactory;

    protected $table = 'teaching_materials';
    
    protected $fillable = [
        'title',
        'link',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class, 'teaching_materials_id');
    }
}
