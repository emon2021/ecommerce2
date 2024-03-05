<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;

class SettingsController extends Controller
{
    //____seo settings show____//
    public function seo()
    {
        $seo = Seo::all()->first();
        return view('admin.settings.seo',compact('seo'));
    }
}
