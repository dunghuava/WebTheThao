<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class PostController extends Controller
{
    public function index()
    {
        return view('web.news');
    }

    public function getOptionCategories($id = 0)
    {
        $options = '';
        $categories = Category::where('type', 0)->get();
        foreach ($categories as $cate) {
            $options .= '<option ' . ($id == $cate->id ? 'selected' : '') . ' value="' . $cate->id . '">' . $cate->name . '</option>';
        }
        return $options;
    }

    public function detail(Request $request, $alias = null)
    {
        $data = [
            'item' => Post::where([
                'status' => 1,
                'slug' => $alias
            ])->first()
        ];
        return view('web.new-detail', $data);
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
        $data = [
            'options' => $this->getOptionCategories()
        ];
        return view('admin.post.create', $data);
    }

    public function edit(Request $request, Post $item)
    {
        $data = [
            'item' => $item,
            'options' => $this->getOptionCategories($item->category_id)
        ];
        return view('admin.post.create', $data);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->except(['_token']);
            $data['slug'] = str_slug($data['name']);
            if ($dublicate = Post::where('slug', $data['slug'])->first()) {
                $data['slug'] = $data['slug'] . '-' . rand(0, 999);
            }
            $image = $request->file('image');
            if ($image) {
                $path = storage_path('app/public/image');
                if ($image->move($path, $image->getClientOriginalName())) {
                    $data['image'] = URL::asset('/storage/image/' . $image->getClientOriginalName());
                }
            }
            if (!isset($data['id'])) {
                $Post = Post::create($data);
                return Redirect::route('admin.post.list');
            } else {
                $Post = Post::where('id', $data['id'])->update($data);
                return Redirect::route('admin.post.list');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            return Redirect::back();
        }
    }
}
