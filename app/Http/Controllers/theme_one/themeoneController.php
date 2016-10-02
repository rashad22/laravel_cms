<?php

namespace App\Http\Controllers\theme_one;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class themeoneController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function __construct() {
        $active_menu_ids = DB::table('option_meta')->where('meta_key', 'menu_page_ids')->first();
        if ($active_menu_ids) {
            $active_menu_ids = unserialize($active_menu_ids->meta_value);
        }
        $all_post = DB::table('post')->where('post_status', 1)->get();
        $main_menu = array();
        foreach ($all_post as $key => $value) {
            if (in_array($value->post_id, $active_menu_ids)) {
                array_push($main_menu, $value);
            }
        }
        $med_id = DB::table('options')->where('opt_name', 'site_logo')->first();
        if ($med_id) {
            $GLOBALS['site_logo'] = DB::table('media')->where('med_id', $med_id->opt_value)->first();
        }
        $option_id = DB::table('options')->where('opt_name', 'theme_option')->first();
        if ($option_id) {
            $option_id = $option_id->opt_id;
            $meta_arr = array(
                array(
                    'opt_id' => $option_id,
                    'meta_key' => 'site_name',
                ), array(
                    'opt_id' => $option_id,
                    'meta_key' => 'site_email',
                ), array(
                    'opt_id' => $option_id,
                    'meta_key' => 'site_contact',
                ), array(
                    'opt_id' => $option_id,
                    'meta_key' => 'site_contact_address',
                )
            );
            foreach ($meta_arr as &$value) {
                $value['meta_value'] = DB::table('option_meta')->where($value)->first()->meta_value;
            }
            $GLOBALS['theme_options'] = $meta_arr;
        }
        $GLOBALS['main_menu'] = $main_menu;
    }

    public function index() {
        $data = array(
            'title' => 'Home',
            'active' => 'home',
            'meta' => 'home',
            'main_menu' => $GLOBALS['main_menu']
        );
        $data['content'] = DB::table('post')->where('post_type', 2)->paginate(3);
        foreach ($data['content'] as $key => &$value) {
            $meta = DB::table('post_meta')->where(array('post_id' => $value->post_id, 'meta_key' => 'post_featured_image'))->first();
            if ($meta) {
                $value->post_featured_image = DB::table('media')->where('med_id', $meta->meta_value)->first();
            }
        }
        return view('website/theme_one/index')->with('data', $data);
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

    public function all_books() {
        $data = array(
            'title' => 'Books',
            'active' => 'books',
            'meta' => 'books',
            'main_menu' => $GLOBALS['main_menu']
        );
        $data['content'] = DB::table('post')->where('post_type', 2)->get();
        foreach ($data['content'] as $key => &$value) {
            $meta = DB::table('post_meta')->where(array('post_id' => $value->post_id, 'meta_key' => 'post_featured_image'))->first();
            if ($meta) {

                $value->post_featured_image = DB::table('media')->where('med_id', $meta->meta_value)->first();
            }
        }
        //return view('admin/post/post')->with('data',$data);
        return view('website/theme_one/all_books')->with('data', $data);
    }

    public function page($slug, $id) {
        $data = array(
            'title' => 'Page',
            'active' => 'page',
            'meta' => $slug,
            'main_menu' => $GLOBALS['main_menu']
        );
        $data['content'] = DB::table('post')->where('post_id', $id)->first();
        $meta = DB::table('post_meta')->where(array('post_id' => $id, 'meta_key' => 'post_featured_image'))->first();
        if ($meta) {
            $data['content_meta'] = DB::table('media')->where('med_id', $meta->meta_value)->first();
        }

        //return view('admin/post/post')->with('data',$data);
        return view('website/theme_one/dynamic_page')->with('data', $data);
    }

    public function contact_us() {
        $data = array(
            'title' => 'Contact Us',
            'active' => 'contact',
            'meta' => 'contact',
            'main_menu' => $GLOBALS['main_menu']
        );

        return view('website/theme_one/contact_us')->with('data', $data);
    }

}
