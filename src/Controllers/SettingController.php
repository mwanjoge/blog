<?php

namespace Nisimpo\Blog\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index(){
        return view('blog::settings.index',);
    }

    public function store(Request $request){
        foreach ($request->name as $key => $value){
            if($request->val[$key]->isValid()){
                $path = $request->val[$key]->storeAs('settings', Str::slug($key,'_').'.'.$request->$request->val[$key]->extension(),'public');
                settings()->set($key, $path);
            }
            else{
                settings()->set($key, $value);
            }

        }
        return back();
    }
}