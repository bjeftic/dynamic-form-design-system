<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Field;
use App\Models\FieldType;

class FormController extends Controller
{
    public function listForms()
    {
        return response()->json([
            'message' => 'OK', 
            'data' => Form::with('fields.fieldType')->get()
        ], 200);
    }

    public function show($id)
    {
        return response()->json([
            'message' => 'OK', 
            'data' => Form::where('id', $id)->with('fields.fieldType')->first()
        ], 200);
    }

    public function store(Request $request)
    {
        $form = Form::create([
            'name' => $request['name']
        ]);

        foreach($request['fields'] as $field) {
            Field::create([
                'value' => $field['value'],
                'field_type_id' => FieldType::where('name', $field['name'])->first()->id,
                'form_id' => $form->id
            ]);
        }

        return response()->json([
            'message' => 'OK', 
            'data' => $form
        ], 200);
    }

    public function update(Request $request)
    {
        $form = Form::where('id', $request['id'])->first();

        foreach($request['fields'] as $field) {
            $dbField = Field::where('form_id', $request['id'])->where('id', $field['id'])->first();
            $dbField->value = $field['value'];
            $dbField->save();
        }

        $form->name = $request['name'];
        $updated = $form->save();

        return response()->json([
            'message' => 'OK', 
            'data' => $updated
        ], 200);
    }

    public function delete($id)
    {
        $fields = Field::where('form_id', $id)->get();

        foreach($fields as $field) {
            $field->delete();
        }
        
        $deleted = Form::where('id', $id)->delete();

        if($deleted) {
            return response()->json([
                'message' => 'Form deleted'
            ], 204);
        }

        return response()->json([
            'message' => 'Form cannot be deleted'
        ], 409);
    }
}
