<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileHandlerController extends Controller
{
    public function upload(Request $request) {
        $file = $request->file('file');
        if (!empty($file)) {
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->storeAs('public/storage', $fileName);
            return response()->json(['name'=> $fileName, 'link' => asset('storage/storage/' . $fileName)]);
        }
        return response()->json(['ref'=> '']);
    }
}
