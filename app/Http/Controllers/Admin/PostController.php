<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index()
    {
        return view('web.news');
    }

    public function detail(Request $request)
    {
        return view('web.new-detail');
    }

    public function list(Request $request)
    {
        $data = [
            'post' => Post::orderBy('order_index', 'asc')->get()
        ];
        return view('admin.post.index', $data);
    }

    public function add(Request $request)
    {
        return view('admin.post.create');
    }

    public function edit(Request $request, Post $item)
    {
        return view('admin.post.create', compact('item'));
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        if (!$data['slug']) {
            $data['slug'] = str_slug($data['name']);
        }
        if (!isset($data['id'])) {
            $Post = Post::create($data);
            return Redirect::route('admin.category.list');
        } else {
            if (!$data['slug']) {
                $data['slug'] = str_slug($data['name']);
            } else {
                unset($data['slug']);
            }
            $Post = Post::where('id', $data['id'])->update($data);
            return Redirect::route('admin.post.list');
        }
    }
}
