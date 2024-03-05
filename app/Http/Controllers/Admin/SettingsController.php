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
    //___seo settings update___//
    public function update(Request $request,$id)
    {
        $update = Seo::findOrfail($id);
        $update->meta_title = $request->meta_title;
        $update->meta_author = $request->meta_author;
        $update->meta_tag = $request->meta_tag;
        $update->meta_description = $request->meta_description;
        $update->meta_keyword = $request->meta_keyword;
        $update->google_verification = $request->google_verification;
        $update->google_analytics = $request->google_analytics;
        $update->alexa_verification = $request->alexa_verification;
        $update->update();

        //__toaster alert notification for the controller
        $notification = array(
            'message' => 'SEO Settings Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
