<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    public function uploadImage(Request $request){
        if($request->hasFile('upload')){
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('upload/img_media/'), $fileName);

            $url = asset('upload/img_media/' . $fileName);
            return response()->json([
                'fileName' => $fileName,
                'uploaded' =>1,
                'url' => $url
            ]);
        }
    }
}
