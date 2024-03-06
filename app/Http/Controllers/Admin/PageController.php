<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    //___security check using middleware
    public function __construct()
    {
        $this->middleware(['auth','is_admin']);
    }

    //____pages.index___
    public function index()
    {
        $pages = Page::select('id','page_position','page_name','page_title','page-description')->get();
        return view('admin.settings.pages.index',compact('pages'));
    }
    //____pages.create___
    public function create()
    {
        return view('admin.settings.pages.create');
    }
}
