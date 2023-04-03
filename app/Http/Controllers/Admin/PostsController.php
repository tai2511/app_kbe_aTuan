<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = DB::table('posts')
            ->leftJoin('users','posts.user_id', '=', 'users.id')
            ->select(['posts.id', 'posts.name as post_name', 'users.name as author', 'posts.created_at'])
            ->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $countries = config('app.countries');
        $data = $rule = array();
        $data['post_name'] = $request->post_name;
        foreach ($countries as $country) {
            $data[$country] = strip_tags($request->$country);
            $nameTitle = $country . '_title';
            $data[$nameTitle] = $request->$nameTitle;
            $rule['post_name'] = 'required';
            $rule[$country] = 'required';
            $rule[$nameTitle] = 'required';
        }
        $validator = Validator::make($data, $rule, $messages = [
            'required' => 'The :attribute data is required.',
        ]);
        if ($validator->fails()) {
            return redirect(route('post.create'))
                ->withErrors($validator)
                ->withInput();
        }
        $id = Auth::id();
        $post_id = DB::table('posts')->insertGetId([
            'name' => $request->post_name,
            'user_id' => $id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        foreach ($countries as $k => $country) {
            $nameTitle = $country . '_title';
            DB::table('post_content')->insert([
                'post_id' => $post_id,
                'lang_id' => $k,
                'title' => $request->$nameTitle,
                'content' => $request->$country,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return redirect(route('post.index'))->with('status', 'Successfully Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $posts = DB::table('post_content')
            ->leftJoin('posts','post_content.post_id', '=', 'posts.id')
            ->where('posts.id', '=', $id)
            ->select(['posts.id as post_id', 'posts.name as post_name', 'title', 'content', 'lang_id'])
            ->get();
        if (count($posts) == 0) {
            return abort(404);
        }
        $countries = config('app.countries');
        $data = array();
        $data['post_name'] = $posts[0]->post_name;
        $data['post_id'] = $id;
        foreach ($posts as $post) {
            $country = $countries[$post->lang_id];
            $data[$country . '_title'] = $post->title;
            $data[$country] = $post->content;
        }
        return view('admin.posts.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $countries = config('app.countries');
        $data = $rule = array();
        $data['post_name'] = $request->post_name;
        foreach ($countries as $country) {
            $data[$country] = strip_tags($request->$country);
            $nameTitle = $country . '_title';
            $data[$nameTitle] = $request->$nameTitle;
            $rule['post_name'] = 'required';
            $rule[$country] = 'required';
            $rule[$nameTitle] = 'required';
        }
        $validator = Validator::make($data, $rule, $messages = [
            'required' => 'The :attribute data is required.',
        ]);
        if ($validator->fails()) {
            return redirect(route('post.edit', $id))
                ->withErrors($validator)
                ->withInput();
        }
        DB::table('posts')
            ->where('id', $id)
            ->update([
                'name' => $request->post_name,
                'updated_at' => now(),
            ]);
        foreach ($countries as $k => $country) {
            $contentId = DB::table('post_content')
                ->where('lang_id', '=', $k)
                ->where('post_id', '=', $id)
                ->pluck('id');
            $nameTitle = $country . '_title';
            DB::table('post_content')
                ->where('id', '=', $contentId[0])
                ->update([
                    'title' => $request->$nameTitle,
                    'content' => $request->$country,
                    'updated_at' => now(),
                ]);
        }
        return redirect(route('post.edit', $id))->with('status', 'Successfully Edited!');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            DB::table('post_content')
                ->where('post_id', '=', $id)
                ->delete();
            DB::table('posts')->delete($id);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        return redirect(route('post.index'))->with('status', 'Post deleted successfully!');
    }
}
