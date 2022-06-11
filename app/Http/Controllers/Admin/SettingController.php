<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class SettingController extends Controller
{
    public function index()
    {
        $data = [
            'item' => Setting::first()
        ];
        return view('admin.setting.index',$data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $logo = $request->file('logo');
        if ($logo) {
            $path = storage_path('app/public/image');
            if ($logo->move($path, $logo->getClientOriginalName())) {
                $data['logo'] = URL::asset('/storage/image/' . $logo->getClientOriginalName());
            }
        }
        Setting::updateOrCreate([
            'id' => 1
        ],$data);

        return Redirect::back();
    }
}
