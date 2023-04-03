<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{

    public function index() {
        $posts = DB::table('posts')->select('id', 'name')->get();
        $setting_data = DB::table('setting')->select('first_post', 'second_post')->get();
        if (count($setting_data) > 0) {
            $data = $setting_data[0];
        } else {
            $data = new \stdClass();
            $data->first_post = 1;
            $data->second_post = 1;
        }
        return view('admin.setting.index', compact('posts', 'data'));
    }

    public function store(Request $request){
        $existSetting = DB::table('setting')->select('id')->limit(1)->get();
        if (count($existSetting) > 0) {
            DB::table('setting')
                ->where('id', '=', $existSetting[0]->id)
                ->update($request->except('_token'));
        } else {
            DB::table('setting')->insert([
                $request->except('_token')
            ]);
        }
        return redirect(route('setting.index'))->with('status', 'Successfully!');
    }
}
