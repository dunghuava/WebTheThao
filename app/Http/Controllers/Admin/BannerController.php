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
        $data = [
            'banner' => Banner::all()
        ];
        return view('admin.banner.index', $data);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->except(['_token']);
            $image = $request->file('image');
            if ($image) {
                $path = storage_path('app/public/image');
                if ($image->move($path, $image->getClientOriginalName())) {
                    $data['image'] = URL::asset('/storage/image/' . $image->getClientOriginalName());
                }
            }
            $banner = Banner::create($data);
            return Redirect::route('admin.banner.index');
        } catch (\Exception $e) {
            return Redirect::back();
        }
    }
}
