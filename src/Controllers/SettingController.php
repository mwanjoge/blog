<?php

namespace Nisimpo\Blog\Controllers;

use Illuminate\Routing\Controller;

class SettingController extends Controller
{
    public function index(){
        return view('blog::settings.index',);
    }
}