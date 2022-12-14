<?php

namespace App\Models;

use App\Models\Attribute;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'price'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected static function newFactory(): ProductFactory
    {
        return new ProductFactory();
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class, 'type_id', 'type_id');
    }

    public function varchar()
    {
        return $this->hasMany(Varchar::class, 'type_id', 'type_id');
    }
}