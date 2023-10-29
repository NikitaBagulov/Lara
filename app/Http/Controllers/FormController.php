<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
public function show_form(){
    return view('form');
}

public function process_form(Request $request){
    $request->validate([
        'name' => 'required|min:2',
        'lastname' => 'required',
        'age' => 'required|numeric|min:12|max:120',
        'city' => 'required',
        'email' => 'required|email'
    ], [
        'name.required' => 'Представтесь',
        'name.min' => 'Не бывает таких маленьких имен',
        'age.required' => 'Сколько вам лет?',
        'age.min' => 'Малый ты, вырости до :min лет',
        'age.max' => 'Слишком старый, :max это максимум',
        'lastname.required' => 'Фамилии нет',
        'email.required' => 'Забыли email',
        'email.email' => 'Не похоже на Email'
    ]);
    $data = [
        $name = $request->input('name'),
        $lastname = $request->input('lastname'),
        $email = $request->input('email'),
        $city = $request->input('city'),
        $age = $request->input('age'),
    ];

    Storage::makeDirectory('test-data');
    Storage::put('test-data/'.uniqid().'.json', json_encode($data));

    return back()->with('message', "Форма сохранена!");
}

}
