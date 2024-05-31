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
        //dd($request);
        /*foreach ($request->name as $key => $value){
            if(array_key_exists($key,$request->val) && !is_string($request->val[$key]) && !is_null($request->val[$key])){
                if($request->val[$key]->isValid()){
                    $path = $request->val[$key]->storeAs('settings', Str::slug($key,'_').'.'.$request->val[$key]->extension(),'public');
                    settings()->set($request->name[$key], $path);
                }
            }
            else{
                if (array_key_exists($key,$request->val)){
                    settings()->set($request->name[$key],  $request->val[$key]);
                }
            }

        }*/
        if(!is_string($request->val) && !is_null($request->val)){
            if($request->val->isValid()){
                $path = $request->val->storeAs('settings', Str::slug($request->name,'_').'.'.$request->val->extension(),'public');
                settings()->set($request->name, $path);
            }
        }
        else{
            if (isset($request->val)){
                settings()->set($request->name,  $request->val);
            }
        }
        return back();
    }
}