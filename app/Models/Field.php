<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'field_type_id',
        'value',
        'form_id'
    ];

    public function fieldType()
    {
        return $this->belongsTo('App\Models\FieldType');
    }

    public function form()
    {
        return $this->belongsTo('App\Models\Form');
    }
}
