<?php

namespace App\Models;

use Database\Factories\VarcharFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Varchar extends Model
{
    use HasFactory;

    protected $fillable = [
        'entity_id',
        'type_id',
        'attribute_id',
        'value'

    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected static function newFactory(): VarcharFactory
    {
        return new VarcharFactory();
    }
}