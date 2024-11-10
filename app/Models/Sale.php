<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'quantity',
        'sale_date',
        'price',
        'total_amount',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    //Generate 6 random sales ID
    public static function generateSaleId()
    {
        try {
            do {
                $id = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
            } while (self::where('id', $id)->exists());

            return $id;
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Oops! Something went wrong: ' . $e->getMessage());

            throw $e;
        }
    }
}
