<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $visible = [
        'id',
        'name',
        'fields'
    ];

    public function fields()
    {
        return $this->hasMany('App\Models\Field');
    }
}
