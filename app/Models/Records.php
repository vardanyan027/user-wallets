<?php

namespace App\Models;

use App\Services\Record\Dto\CreateRecordDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 * App\Models|Records
 *
 * @property int $amount
 * @property string $type
 * @property int $wallets_id
 *
 */
class Records extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'amount',
        'type',
        'wallets_id',
    ];

    public static function staticCreate(CreateRecordDto $createRecordDto): static
    {
        $record = new static();
        $record->setAmount($createRecordDto->amount);
        $record->setType($createRecordDto->type);
        $record->setWalletId($createRecordDto->walletId);
        return $record;
    }

    public function setAmount(int $amount)
    {
        $this->amount = $amount;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function setWalletId(int $walletId)
    {
        $this->wallets_id = $walletId;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getWalletId(): int
    {
        return $this->wallets_id;
    }

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallets::class);
    }
}
