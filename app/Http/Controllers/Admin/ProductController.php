<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    public function index()
    {
        return view('web.products');
    }

    public function getOptionCategories($id = 0)
    {
        $options = '';
        $categories = Category::where('type', 1)->get();
        foreach ($categories as $cate) {
            $options .= '<option ' . ($id == $cate->id ? 'selected' : '') . ' value="' . $cate->id . '">' . $cate->name . '</option>';
        }
        return $options;
    }

    public function detail(Request $request, $alias = null)
    {
        $data = [
            'item' => Product::where([
                'status' => 1,
                'slug' => $alias
            ])->first()
        ];
        return view('web.product-detail', $data);
    }
    public function list(Request $request)
    {
        $data = [
            'product' => Product::orderBy('order_index', 'asc')->get()
        ];
        return view('admin.product.index', $data);
    }

    public function add(Request $request)
    {
        $data = [
            'options' => $this->getOptionCategories()
        ];
        return view('admin.product.create', $data);
    }

    public function edit(Request $request, Product $item)
    {
        $data = [
            'options' => $this->getOptionCategories($item->category_id),
            'item' => $item
        ];
        return view('admin.product.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        $data['slug'] = str_slug($data['name']);
        $data['price'] = preg_replace('/[^0-9]/', '', $data['price']);
        if ($dublicate = Product::where('slug', $data['slug'])->first()) {
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
            $category = Product::create($data);
            return Redirect::route('admin.product.list');
        } else {
            $category = Product::where('id', $data['id'])->update($data);
            return Redirect::route('admin.product.list');
        }
    }

    public function delete(Product $id)
    {
        $id->delete();
        return Redirect::back();
    }
}
