<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    public function index() {
        $files = File::all();
        return response()->json(["status" => "success", "count" => count($files), "data" => $files]);
    }

    public function upload(Request $request)
    {
        if($request->get('file'))
       {
          $image = $request->get('file');
          $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
          File::make($request->get('file'))->save(public_path('images/').$name);
        }



        $file = new File();
        $file->file_name=$name;
        $file->save();
        return response()->json('Successfully added', $file);

    }
}
