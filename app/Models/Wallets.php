<?php

namespace App\Models;

use App\Services\Wallet\Dto\CreateWalletDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Wallets
 *
 * @property string $name
 * @property string $type
 * @property int $totalAmount
 * @property int $user_id
 *
 */
class Wallets extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type',
        'totalAmount',
        'user_id',
    ];

    public static function staticCreate(CreateWalletDto $createWalletDto): static
    {
        $wallet = new static();
        $wallet->setName($createWalletDto->name);
        $wallet->setType($createWalletDto->type);
        $wallet->setUserId($createWalletDto->userId);
        return $wallet;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setTotalAmount(int $amount)
    {
        $this->totalAmount = $amount;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function setUserId(int $userId)
    {
        $this->user_id = $userId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTotalAmount(): int
    {
        return $this->totalAmount;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function records(): HasMany
    {
        return $this->hasMany(Records::class);
    }
}
