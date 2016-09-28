<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function file_uploads($file) {
        $destinationPath = 'public/uploads/';
        $filename = str_random(15);
        $extension = $file->getClientOriginalExtension();
        $imagefullname = $filename . '.' . $extension;
        $imagewithurl = "public/uploads/" . $imagefullname;
        $success = $file->move($destinationPath, $imagefullname);

        $media_arr = array(
            'med_name' => $imagefullname,
            'med_caption' => '',
            'med_description' => '',
            'med_path' => $destinationPath,
            'created_at' => date('Y-m-d h:i:s')
        );
        $med_id = DB::table('media')->insertGetId($media_arr);
        return $med_id;
    }

}
