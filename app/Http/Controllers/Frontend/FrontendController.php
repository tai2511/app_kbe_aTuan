<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function getPostData($country){
        $countries = config('app.countries');
        if (!in_array($country, $countries)) {
            return abort(404);
        }
        $langId = array_search($country, $countries);
        $data = array();
        $result = $this->getData('setting.first_post', $langId);
        $data['first_post'] = isset($result[0]) ? $result[0] : '';
//        $result = $this->getData('setting.second_post', $langId);
//        $data['second_post'] = isset($result[0]) ? $result[0] : '';
        return view('clients.frontend.home', compact('data', 'country'));
    }

    private function getData($postNumber, $langId){
        return DB::table('post_content')
            ->select('title', 'content', 'photo', 'layout')
            ->leftJoin('posts', 'posts.id', '=', 'post_content.post_id')
            ->whereIn('post_id', function($query) use ($postNumber){
                $query->select('posts.id')
                    ->from('setting')
                    ->leftJoin('posts', 'posts.id', '=', $postNumber);
            })
            ->where('lang_id', '=', $langId)
            ->limit(1)
            ->get();
    }

}
