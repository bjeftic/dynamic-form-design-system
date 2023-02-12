<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FieldType;

class FieldTypeController extends Controller
{
    public function listFieldTypes()
    {
        return response()->json([
            'message' => 'OK', 
            'data' => FieldType::all()
        ], 200);
    }
}
