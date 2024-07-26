<?php
  
  namespace App\Models;
  
  // use Illuminate\Contracts\Auth\MustVerifyEmail;
  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Foundation\Auth\User as Authenticatable;
  use Illuminate\Notifications\Notifiable;
  use Laravel\Passport\HasApiTokens;
  
  class User extends Authenticatable
  {
    use HasApiTokens, HasFactory, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'full_name',
      'email',
      'password',
      'phone_number',
      'address',
      'birth_date',
      'gender',
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
     * @return array<string, string>
     */
    protected function casts(): array
    {
      return [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'birth_date' => 'date',
      ];
    }
  }
