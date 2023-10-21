<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataController extends Controller
{
    

public function showData(){
    $dataFiles = File::files(storage_path('app'));

    $data = [];
    foreach ($dataFiles as $file) {
        $data[] = json_decode(file_get_contents($file), true);
    }

    return view('data', ['data' => $data]);
}

}
