<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    public $incrementing = false;

    protected $fillable = [
        'description',
        'amount',
        'transaction_type_id',
        'source_account_id',
        'dest_account_id'
    ];

    public function getAmountAttribute($value)
    {
        return number_format($value / 100, 2);
    }

    public function source(): HasOne
    {
        return $this->hasOne(Account::class);
    }

    public function dest(): HasOne
    {
        return $this->hasOne(Account::class);
    }

    public function transactionType(): BelongsTo
    {
        return $this->belongsTo(TransactionType::class);
    }
}
