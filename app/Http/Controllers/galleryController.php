<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;

class galleryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $data = array(
            'title' => 'Gallery Image',
            'active' => 'gallery',
            'meta' => 'gallery_list'
        );
        $data['gallery_name'] = DB::table('options')->where('opt_name', 'gallery_name')->first();
        $image_ids = DB::table('option_meta')->where(array('opt_id' => $data['gallery_name']->opt_id, 'meta_key' => 'gallery_items'))->first();
        if ($image_ids && ($image_ids->meta_value != '')) {
            $data['old_items'] = $image_ids->meta_value;
            $image_ids = explode(',', $image_ids->meta_value);

            $items = array();
            foreach ($image_ids as $image) {
                $item = DB::table('media')->where('med_id', $image)->first();
                if ($item) {
                    array_push($items, $item);
                }
            }
            $data['gallerys'] = $items;
        } else {
            $data['old_items'] = '';
        }


        return view('admin/gallery')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data) {
        $session = session()->all();


        $v = \Validator::make($data->all(), [
                    'gallery_name' => 'required|max:250',
        ]);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        } else {

            $meta_arr = array(
                'opt_name' => 'gallery_name',
                'opt_value' => $data->input('gallery_name'),
            );
            $exist_menu = DB::table('options')->where('opt_name', 'gallery_name')->first();
            if ($exist_menu) {
                $q = DB::table('options')->where('opt_id', $exist_menu->opt_id)->update($meta_arr);
                session::flash('message', 'Gallery Name Update');
            } else {
                $q = DB::table('options')->insert($meta_arr);
                session::flash('message', 'Gallery Name Added');
            }

            if ($q > 0) {
                return redirect('gallery');
            }
        }
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
        $gallery_name = DB::table('options')->where('opt_name', 'gallery_name')->first();
        $image_ids = DB::table('option_meta')->where(array('opt_id' => $gallery_name->opt_id, 'meta_key' => 'gallery_items'))->first();
        $images = $image_ids;
        if ($image_ids) {
            $image_ids = explode(',', $image_ids->meta_value);
            if (($key = array_search($id, $image_ids)) !== false) {
                unset($image_ids[$key]);
            }
            $image_ids = implode(',', $image_ids);
            $meta_arr = array(
                'opt_id' => $gallery_name->opt_id,
                'meta_key' => 'gallery_items',
                'meta_value' => $image_ids
            );
            $q = DB::table('option_meta')->where('meta_id', $images->meta_id)->update($meta_arr);
            session::flash('message', 'Record Removed');
            return redirect('gallery');
        }
    }

    public function all_ajax_images() {
        $images = DB::table('media')->orderBy('med_id', 'DESC')->get();
        echo json_encode($images);
        die();
    }

    public function get_caption() {
        $data = Input::all();
        $media = DB::table('media')->where('med_id', $data['media_id'])->first();
        echo json_encode($media);
        die();
    }

    public function ajax_caption_update() {
        $data = Input::all();
        $media = DB::table('media')->where('med_id', $data['med_id'])->update($data);
        echo json_encode($media);
        die();
    }

    public function ajax_gallery_update(Request $data) {

        $meta_arr = array(
            'opt_id' => $data->input('opt_id'),
            'meta_key' => 'gallery_items',
            'meta_value' => $data->input('media_ids')
        );
        $exist = DB::table('option_meta')->where('meta_key', 'gallery_items')->first();
        if ($exist) {
            $q = DB::table('option_meta')->where('meta_id', $exist->meta_id)->update($meta_arr);
            session::flash('message', 'Gallery Item Updated');
        } else {
            $q = DB::table('option_meta')->insert($meta_arr);
            session::flash('message', 'Gallery Item Added');
        }

        if ($q > 0) {
            return redirect('gallery');
        }
    }

}
