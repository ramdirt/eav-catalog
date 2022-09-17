<?php

namespace App\Models;

use Database\Factories\EntityFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entity extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected static function newFactory(): EntityFactory
    {
        return new EntityFactory();
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