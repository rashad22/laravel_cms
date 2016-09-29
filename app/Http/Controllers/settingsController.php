<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\UploadedFile;
use DB;
use Session;
use Illuminate\Support\Facades\Input;

class settingsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
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
    }

    public function menu() {
        $data = array(
            'title' => 'Menu',
            'active' => 'settings',
            'meta' => 'menu'
        );
        $all_menu = array();
        $active_menu = array();
        $post_list = DB::table('post')->where(array('post_status'=> 1,'post_type'=>1))->get()->toArray();
        
        $active_menu_ids = DB::table('option_meta')->where('meta_key', 'menu_page_ids')->first();
        if($active_menu_ids){
			$data['post_list'] = $post_list;
            $active_menu = unserialize($active_menu_ids->meta_value);
            $active_menu_list = [];
            foreach ($active_menu as $key => $value) {
        		array_push($active_menu_list,DB::table('post')->where(array('post_id'=>$value))->first());

            }
$data['active_menu'] = $active_menu_list;
        }else{
        	$data['post_list'] = $post_list;
            $data['active_menu'] = array();
        }
        
       
        //$all_post_ids = array_intersect(array_column($data['post_list'], 'post_id'), $menu_item);

        return view('admin/menu')->with('data', $data);
    }

    public function menu_update(Request $data) {
        $data_arr = array(
            'opt_id' => 1,
            'meta_key' => 'menu_page_ids',
            'meta_value' => serialize($data->input('menu_item'))
        );
        $exist_menu = DB::table('option_meta')->where(array('opt_id' => $data_arr['opt_id'], 'meta_key' => $data_arr['meta_key']))->first();
        if ($exist_menu) {
            $q = DB::table('option_meta')->where('meta_id', $exist_menu->meta_id)->update($data_arr);
        } else {
            $q = DB::table('option_meta')->insert($data_arr);
        }

        if ($q > 0) {
            session::flash('message', 'Menu Updated');
            return redirect('menu');
        }
    }

    public function theme_option($active = null) {
        $data = array(
            'title' => 'Theme Option',
            'active' => 'settings',
            'meta' => 'theme_option',
        );
        $data['active_tab'] = $active;
        $opt_id = DB::table('options')->where('opt_name', 'site_logo')->first()->opt_value;
        $data['site_logo'] = DB::table('media')->where('med_id', $opt_id)->first();

        $opt_id = DB::table('options')->where('opt_name', 'theme_option')->first()->opt_id;
        $data['site_options_name'] = DB::table('option_meta')->where(array('opt_id' => $opt_id, 'meta_key' => 'site_name'))->first();
        $data['site_options_email'] = DB::table('option_meta')->where(array('opt_id' => $opt_id, 'meta_key' => 'site_email'))->first();
        $data['site_options_contact'] = DB::table('option_meta')->where(array('opt_id' => $opt_id, 'meta_key' => 'site_contact'))->first();
        $data['site_options_contact_address'] = DB::table('option_meta')->where(array('opt_id' => $opt_id, 'meta_key' => 'site_contact_address'))->first();
        return view('admin/theme_option')->with('data', $data);
    }

    public function site_logo() {
        $file = Input::file('file');

        if ($file) {
            $med_id = $this->file_uploads($file);
            if ($file && $med_id > 0) {
                $meta_arr = array(
                    'opt_name' => 'site_logo',
                    'opt_value' => $med_id,
                );
                $exist = DB::table('options')->where('opt_name', 'site_logo')->first();
                if ($exist) {
                    $option = DB::table('options')->where('opt_name', 'site_logo')->update($meta_arr);
                } else {
                    $option = DB::table('options')->insert($meta_arr);
                }
                if ($option) {
                    session::flash('message', 'Image Uploaded');
                    return redirect('theme-option/tab_1');
                }
            }
        }
    }

    public function save_theme_option() {
        $post = Input::all();
        $v = \Validator::make(Input::all(), [
                    'site_name' => 'required|max:500',
                    'site_email' => 'required|max:255|email',
                    'site_contact' => 'required',
        ]);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        } else {
            $data_arr = array(
                'opt_name' => 'theme_option',
                'opt_value' => 'theme_options'
            );
            $exist = DB::table('options')->where($data_arr)->first();
            if ($exist) {
                $option_id = $exist->opt_id;
            } else {
                $option_id = DB::table('options')->insertGetId($data_arr);
            }

            if ($option_id) {
                $meta_arr = array(
                    array(
                        'opt_id' => $option_id,
                        'meta_key' => 'site_name',
                        'meta_value' => $post['site_name']
                    ), array(
                        'opt_id' => $option_id,
                        'meta_key' => 'site_email',
                        'meta_value' => $post['site_email']
                    ), array(
                        'opt_id' => $option_id,
                        'meta_key' => 'site_contact',
                        'meta_value' => $post['site_contact']
                    ), array(
                        'opt_id' => $option_id,
                        'meta_key' => 'site_contact_address',
                        'meta_value' => $post['site_address']
                    )
                );
                $meta_con = array();
                foreach ($meta_arr as $value) {
                    $data_val = $value;
                    $meta_con = array_pop($value);
                    $exist_meta = DB::table('option_meta')->where($value)->first();
                    if ($exist_meta) {
                        DB::table('option_meta')->where($value)->update($data_val);
                    } else {
                        DB::table('option_meta')->insert($data_val);
                    }
                }
            }
            session::flash('message', 'Theme Option successfully Updated.');
            return redirect('theme-option/tab_2');
        }
    }

}
