<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class CategoryController extends Controller
{
    public function index()
    {
        return view('web.category');
    }
    public function list(Request $request)
    {
        $data = [
            'category' => Category::orderBy('order_index', 'asc')->get()
        ];
        return view('admin.category.index', $data);
    }

    public function add(Request $request)
    {
        return view('admin.category.create');
    }

    public function edit(Request $request, Category $item)
    {
        return view('admin.category.create', compact('item'));
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        if (!$data['slug']) {
            $data['slug'] = str_slug($data['name']);
        }
        if (!isset($data['id'])) {
            $category = Category::create($data);
            return Redirect::route('admin.category.list');
        } else {
            if (!$data['slug']) {
                $data['slug'] = str_slug($data['name']);
            } else {
                unset($data['slug']);
            }
            $category = Category::where('id', $data['id'])->update($data);
            return Redirect::route('admin.category.list');
        }
    }
}
