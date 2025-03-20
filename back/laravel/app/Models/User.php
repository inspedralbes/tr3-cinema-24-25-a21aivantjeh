<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Laravel\Sanctum\NewAccessToken;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function createToken(string $name, array $abilities = ['*'])
    {
        do {
            $plainTextToken = Str::random(60); // Generate random token 
            $hashedToken = hash('sha256', $plainTextToken); // Hased token
        } while ($this->tokens()->where('token', $hashedToken)->exists()); 

        $token = $this->tokens()->create([
            'name' => $name,
            'token' => $hashedToken,
            'abilities' => $abilities,
            'expires_at' => now()->addDay(), // Expira en 24 horas
        ]);

        return new NewAccessToken($token, $plainTextToken);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
