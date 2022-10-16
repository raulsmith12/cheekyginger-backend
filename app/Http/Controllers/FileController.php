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

    public function upload(Request $request) {
        $filesName = [];
        $response = [];

        $validator = Validator::make($request->all(),
            [
                'files' => 'required',
                'files.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]
        );

        if($validator->fails()) {
            return response()->json(["status" => "failed", "message" => "Validation error", "errors" => $validator->errors()]);
        }

        if($request->has('files')) {
            foreach($request->file('files') as $file) {
                $filename = time().rand(3). '.'.$file->getClientOriginalExtension();
                $file->move('uploads/', $filename);

                File::create([
                    'file_name' => $filename
                ]);
            }

            $response["status"] = "successs";
            $response["message"] = "Success! image(s) uploaded";
        }

        else {
            $response["status"] = "failed";
            $response["message"] = "Failed! image(s) not uploaded";
        }
        return response()->json($response);
    }
}
