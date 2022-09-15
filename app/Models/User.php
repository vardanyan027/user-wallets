<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Services\User\Dto\CreateUserDto;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 *
 * App\Models|user
 *
 * @property string $name
 * @property string $email
 * @property string $password
 * @property Carbon email_verified_at
 *
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public static function staticCreate(CreateUserDto $createUserDto): static
    {
        $user = new static();
        $user->setName($createUserDto->name);
        $user->setEmail($createUserDto->email);
        $user->setPassword($createUserDto->password);
        return $user;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setPassword(?string $password)
    {
        $this->password = Hash::make($password);
    }

    public function wallets(): HasMany
    {
        return $this->hasMany(Wallets::class);
    }
}
