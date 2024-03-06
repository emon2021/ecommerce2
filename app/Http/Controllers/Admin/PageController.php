<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{
    //___security check using middleware
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin']);
    }

    //____pages.index___
    public function index()
    {
        $pages = Page::select('id', 'page_position', 'page_name', 'page_title', 'page_description')->get();
        return view('admin.settings.pages.index', compact('pages'));
    }
    //____pages.create___
    public function create()
    {
        return view('admin.settings.pages.create');
    }
    //____pages.store___
    public function store(Request $request)
    {
        //  validation
        $validatedData = $request->validate(
            [
                'page_name' => 'required|unique:pages,page_name',
                'page_title' => 'required',
                'page_position' => 'required',
                'page_description' => 'nullable',
            ],
            //  custom validation error messages.
            [],
            //  ____customizing attribute names__________
            [
                'page_name'  => "Page Name",
                'page_title'   => "Page Title",
                'page_position'   => "Page Position"
            ]
        );

        //   getting all inputs
        $inputs = $request->all();
        //  make object or instance of the page model
        $page = new Page();
        //  set values to the fields by calling
        $page->page_slug = Str::slug($request->page_name, '-');
        //    save data in database
        $page->fill($inputs)->save();

        //__toaster alert notification for the controller
        $notification = array(
            'message' => 'Page Added Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('pages.index')->with($notification);
    }
    //____pages.destroy____
    public function destroy($id)
    {
        //  finding a row from the table by its id
        $page = Page::findOrFail($id);
        //  deleting found row from the table
        $page->delete();
        //__toaster alert notification for the controller
        $notification = array(
            'message' => 'Page Deleted Successfully!',
            'alert-type' => 'danger'
        );
        return redirect()->back()->with($notification);
    }

    //____pages.edit____
    public function edit($id)
    {
        //  find a record by its id and create a view with this record
        $page = Page::whereId($id)->first();
        return view("admin.settings.pages.edit", compact("page"));
    }


    
}
