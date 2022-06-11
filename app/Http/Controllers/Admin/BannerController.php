<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class BannerController extends Controller
{
    public function index()
    {
        $item = null;
        if (request()->get('edit')) {
            $item = Banner::find(request()->get('edit', 0));
        }
        $data = [
            'item' => $item,
            'banner' => Banner::all()
        ];
        return view('admin.banner.index', $data);
    }

    public function edit(Banner $item)
    {
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $data['status'] = $request->get('status', 0);
            $image = $request->file('image');
            if ($image) {
                $path = storage_path('app/public/image');
                if ($image->move($path, $image->getClientOriginalName())) {
                    $data['image'] = URL::asset('/storage/image/' . $image->getClientOriginalName());
                }
            }
            Banner::updateOrCreate([
                'id' => $request->get('id', 0)
            ], $data);
            return Redirect::route('admin.banner.index');
        } catch (\Exception $e) {
            return Redirect::back();
        }
    }

    public function delete(Banner $id)
    {
        $id->delete();
        return Redirect::back();
    }
}
