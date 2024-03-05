<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;
use App\Models\Smtp;

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

    //___smtp settings show___/
    public function smtp()
    {
        $smtp = Smtp::all()->first();
        return view('admin.settings.smtp',compact( 'smtp'));
    }
    //___seo settings update___//
    public function smtp_update(Request $request,$id)
    {
        $update = Smtp::findOrfail($id);
        $update->mailer = $request->mailer;
        $update->host = $request->host;
        $update->port = $request->port;
        $update->username = $request->username;
        $update->password = $request->password;
        $update->update();

        //__toaster alert notification for the controller
        $notification = array(
            'message' => 'SMTP Settings Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
