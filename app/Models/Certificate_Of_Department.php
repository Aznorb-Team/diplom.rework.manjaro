<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate_Of_Department extends Model
{
    use HasFactory;

    protected $table = 'certificate_of_departments';

    protected $fillable = [
        'title',
        'link',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class, 'certificate_of_department_id');
    }
}
