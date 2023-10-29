<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DataController extends Controller
{
    

public function show_data(){
        $files = Storage::files('test-data');
        $data = [];
        foreach($files as $file){
            $id = basename($file, '.json');
            $data[$id] = json_decode(Storage::get($file));
        }
    // dd($files, $data);
    return view('data', compact('data'));
    }

}
