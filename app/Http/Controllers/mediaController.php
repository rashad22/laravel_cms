<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;

class mediaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $data = array(
            'title' => 'Media Image',
            'active' => 'media',
            'meta' => 'media_list'
        );
        $data['gallerys'] = DB::table('media')->orderBy('med_id', 'DESC')->get();
        return view('admin/media/media')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data = array(
            'title' => 'New Media Image',
            'active' => 'media',
            'meta' => 'new_media'
        );
        return view('admin/media/add_media')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
        $file = Input::file('file');

        if ($file) {
            $med_id = $this->file_uploads($file);
            if ($med_id) {
                echo $med_id;
            } else {
                echo 'error';
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
        $q = DB::table('media')->where('med_id', $id)->delete();
        if ($q) {
            session::flash('message', 'Record Removed');
            return redirect('media');
        }
    }

}
