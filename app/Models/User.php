<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'email',
        'password',
        'role_id',
        'direction_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function authors_application(){
        return $this->belongsToMany(User::class, 'applications_authors', 'authors_id', 'application_id');
    }

    public function user_application(){
        return $this->belongsTo(Application::class, 'user_id');
    }
    public function employee_application(){
        return $this->belongsTo(Application::class, 'employee_id');
    }

    public function role_id()
    {
        return $this->hasOne(Role::class, 'id');
    }
    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
    public function direction(){
        return $this->hasOne(Direction::class, 'id', 'direction_id');
    }
}
