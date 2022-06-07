<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class CategoryController extends Controller
{
    public function index($alias = null)
    {
        $cate = Category::where([
            'status' => 1,
            'slug' => $alias
        ])->first();

        if (!$cate) {
            return Redirect::to('/');
        }
        $type = 'post';
        switch ($cate->type) {
            case 0:
                $type = 'post';
                $items = Post::where('category_id', $cate->id)->get();
                break;
            case 1:
                $type = 'product';
                $items = Product::where('category_id', $cate->id)->get();
                break;
        }
        $data = [
            'type' => $type,
            'items' => $items
        ];
        return view('web.category', $data);
    }
    public function list(Request $request)
    {
        $data = [
            'category' => Category::orderBy('order_index', 'asc')->get()
        ];
        return view('admin.category.index', $data);
    }

    public function getOptionCategories($id = 0)
    {
        $options = '';
        $categories = Category::where('parent_id', 0)->get();
        foreach ($categories as $cate) {
            $options .= '<option ' . ($id == $cate->id ? 'selected' : '') . ' value="' . $cate->id . '">' . $cate->name . '</option>';
            $subCate = Category::where('parent_id', $cate->id)->get();
            foreach ($subCate as $sub) {
                $options .= '<option ' . ($id == $sub->id ? 'selected' : '') . ' value="' . $sub->id . '">  →' . $sub->name . '</option>';
                $subCate3 = Category::where('parent_id', $sub->id)->get();
                foreach ($subCate3 as $sub3) {
                    $options .= '<option ' . ($id == $sub3->id ? 'selected' : '') . ' value="' . $sub3->id . '">    →' . $sub3->name . '</option>';
                }
            }
        }
        return $options;
    }

    public function add(Request $request)
    {
        $data = [
            'options' => $this->getOptionCategories()
        ];
        return view('admin.category.create', $data);
    }

    public function edit(Request $request, Category $item)
    {
        $data = [
            'item' => $item,
            'options' => $this->getOptionCategories($item->id)
        ];
        return view('admin.category.create', $data);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->except(['_token', 'slug']);
            $data['slug'] = str_slug($data['name']);
            if ($dublicate = Category::where('slug', $data['slug'])->first()) {
                $data['slug'] = $data['slug'] . '-' . rand(0, 999);
            }
            if (!isset($data['id'])) {
                $category = Category::create($data);
                return Redirect::route('admin.category.list');
            } else {
                if ($data['parent_id'] == $data['id']) {
                    unset($data['parent_id']);
                }
                $category = Category::where('id', $data['id'])->update($data);
                return Redirect::route('admin.category.list');
            }
        } catch (\Exception $e) {
            return Redirect::back();
        }
    }
}
