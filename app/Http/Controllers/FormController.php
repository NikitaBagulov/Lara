<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
public function showForm(){
    return view('form');
}

public function processForm(Request $request){
    $validator = Validator::make($request->all(), [
        'data' => 'required',
    ]);

    if ($validator->fails()) {
        return back()
            ->withInput()
            ->withErrors($validator);
    }

    $data = $request->input('data');
    $filename = uniqid('data_', true) . '.json';
    file_put_contents(storage_path('app/' . $filename), json_encode($data));

    return redirect()->route('form')->with('success', 'Данные успешно сохранены.');
}

}
