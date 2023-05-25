<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// protected $guarded = []; //

class products extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'price',
        'description',
        'quantity',
        'slug'
    ];

    public function gallery(): HasMany
    {
        return $this->hasMany(ProductsGallery::class, 'product_id', 'id');
    }

    public function Carts(): HasOne
    {
        return $this->hasOne(Carts::class, 'product_id', 'id');
    }

    public function Transactions_Items(): BelongsTo
    {
        return $this->belongsTo(TransactionsItems::class, 'foreign_key', 'other_key');
    }

}
