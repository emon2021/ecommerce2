<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Models\Seo;
use App\Models\Smtp;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
    //____seo settings show____//
    public function seo()
    {
        $seo = Seo::all()->first();
        return view('admin.settings.seo', compact('seo'));
    }
    //___seo settings update___//
    public function update(Request $request, $id)
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
        return view('admin.settings.smtp', compact('smtp'));
    }
    //___smtp settings update___//
    public function smtp_update(Request $request, $id)
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

    //___website settings show___/
    public function website_setting()
    {
        $website = Currency::all()->first();
        return view('admin.settings.website', compact('website'));
    }
    //___seo settings update___//
    public function website_update(Request $request, $id)
    {


        $update = Currency::findOrfail($id);
        $update->currency = $request->currency;
        $update->phone_one = $request->phone_one;
        $update->phone_two = $request->phone_two;
        $update->main_email = $request->main_email;
        $update->support_email = $request->support_email;
        //  logo upload
        if ($request->hasFile('logo')) {   // check if user has uploaded an image or not
            if (File::exists($update->logo)) {
                File::delete($update->logo);    //  delete old image if exists
                $logo = $request->file('logo');     // get new image from post request

                $extension = $logo->getClientOriginalExtension();
                $path = 'public/backend/settings/';
                $logoname = $path . time() . uniqid() . '.' . $extension;   // create unique name for image
                $logo->move($path, $logoname);
                $update->logo = $logoname;      // store image in logos table column



            } else {
                $logo = $request->file('logo');     // get new image from post request

                $extension = $logo->getClientOriginalExtension();
                $path = 'public/backend/settings/';
                $logoname = $path . time() . uniqid() . '.' . $extension;   // create unique name for image
                $logo->move($path, $logoname);
                $update->logo = $logoname;      // store image in logos table column
            }
        }

        //  favicon upload
        if ($request->hasFile('favicon')) {   // check if user has uploaded an image or not
            if (File::exists($update->favicon)) {
                File::delete($update->favicon);    //  delete old image if exists
                $favicon = $request->file('favicon');     // get new image from post request

                $get_extension = $favicon->getClientOriginalExtension();
                $favicon_path = 'public/backend/settings/';
                $favicon_name = $favicon_path . time() . uniqid() . '.' . $get_extension;   // create unique name for image
                $favicon->move($favicon_path, $favicon_name);
                $update->favicon = $favicon_name;      // store image in logos table column



            } else {
                $favicon = $request->file('favicon');     // get new image from post request
                $get_extension = $favicon->getClientOriginalExtension();
                $favicon_path = 'public/backend/settings/';
                $favicon_name = $favicon_path . time() . uniqid() . '.' . $get_extension;   // create unique name for image
                $favicon->move($favicon_path, $favicon_name);
                $update->favicon = $favicon_name;      // store image in logos table column
            }
        }
        $update->address = $request->address;
        $update->facebook = $request->facebook;
        $update->twitter = $request->twitter;
        $update->linkedin = $request->linkedin;
        $update->youtube = $request->youtube;
        $update->instagram = $request->instagram;
        $update->update();

        //__toaster alert notification for the controller
        $notification = array(
            'message' => 'Website Settings Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
