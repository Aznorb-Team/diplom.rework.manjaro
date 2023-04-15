<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'title',
        'link',
    ];

    public function application(){
        return $this->belongsToMany(Application::class, 'applications_reviews', 'review_id', 'application_id');
    }
}
