<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\PickupPoint;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\WareHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Colors\Rgb\Channels\Red;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //_____auth check_____
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin']);
    }

    //_______product.fetch.subcategory________
    public function subcategory(Request $request)
    {
        $id = $request->id;
        $sub = SubCategory::select('id', 'subcategory_name')->where('category_id', $id)->get();
        return view("admin.products.subcategory", compact('sub'));
    }

    //_______child.view.on.product.page_______
    public function childView(Request $request)
    {
        $child_cat = ChildCategory::select('id', 'childcategory_name')->where('subcategory_id', $request->id)->get();
        return response()->json($child_cat);
    }

    //_______product.create________
    public function create()
    {
        $data['category'] = Category::all();
        $data['brands'] = Brand::all();
        //$data['child']  = ChildCategory::all();
        $data['pickup'] = PickupPoint::all();
        $data['warehouses'] = WareHouse::all();
        return view("admin.products.create", $data);
    }

    //_________product.store________
    public function store(ProductRequest $request)
    {
        $request->validated();
        //_____storing data___
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name, '-');
        $product->code = $request->code;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->childcategory_id = $request->childcategory_id;
        $product->brand_id = $request->brand_id;
        $product->unit = $request->unit;
        $product->tags = $request->tags;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->stock_quantity = $request->stock_quantity;
        $product->warehouse = $request->warehouse;
        $product->description = $request->description;
        $product->video = $request->video;
        $product->cash_on_delivery = $request->cash_on_delivery;
        $product->featured = $request->featured;
        $product->today_deal = $request->today_deal;
        $product->status = $request->status;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->date = $request->date;
        $product->month = $request->month;
        $product->admin_id = Auth::user()->id;
        $product->pickup_point_id = $request->pickup_point_id;
        $product->date = date('d-m-y');
        $product->month = date('F');
        //_______thumnail upload_____
        if ($request->file('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $path = 'public/backend/products/';
            $thumb_extension = $thumbnail->getClientOriginalExtension();
            $thumb_name = time() . "." . $thumb_extension;
            $thumbnail->move($path, $thumb_name);

            //___insert name into database___
            $product->thumbnail = $path . $thumb_name;
        } else {
            return response()->json('Thumbnail field is empty!');
        }

        //_____multiple image upload for product_____
        if ($request->hasFile('images')) {
            //____image name container in array___
            $muliple_image = [];
            foreach ($request->images as $image) {

                $img_extension = $image->getClientOriginalExtension();
                $img_name = time() . "_" . uniqid() . "." . $img_extension;
                $image->move($path, $img_name);
                //___pushing image name in array___
                array_push($muliple_image, $path . $img_name);
            }
            $product->images = json_encode($muliple_image);
        }

        $product->save();
        return response()->json('Product added successfully!');
    }

    //________product.index__________
    public function index(Request $request)
    {
        if ($request->ajax()) {
            //  joining  relational table to get the related data
            $product = Product::leftJoin('categories', 'categories.id', 'products.category_id')
                ->leftJoin('sub_categories', 'sub_categories.id', 'products.subcategory_id')
                ->leftJoin('brands', 'brands.id', 'products.brand_id')
                ->leftJoin('pickup_points', 'pickup_points.id', 'products.pickup_point_id')
                ->leftJoin('ware_houses', 'ware_houses.id', 'products.warehouse')
                ->select([
                    'products.*',
                    'categories.category_name',
                    'sub_categories.subcategory_name',
                    'brands.brand_name',
                    'pickup_points.pickup_point_name',
                    'ware_houses.warehouse_name'
                ])->orderBy('id', 'ASC')->get();

                //  declaring yajra data table and pushing data in that table
            return DataTables::of($product)
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" class="btn btn-primary edit" data-bs-target="#editModal" data-bs-toggle="modal" >
                <i class="fas fa-edit"></i>
              </a>
              <a href="' . route('product.destroy', $row->id) . '" id="delete_data" class="btn btn-danger">
              <i class="fas fa-trash"></i>
            </a>';
                    return $actionbtn;
                })
                ->addIndexColumn() //   add  an index column
                //  editColumn for editing  any column of a specific row
                ->editColumn('thumbnail', function ($data) {
                    return '<img src="' . asset($data->thumbnail) . '"  width="100px"/>';
                })
                ->editColumn('images', function ($data) {
                    $image = '';    //    initializing image variable
                    $img_json = json_decode($data->images); //  converting string into array
                    //  get  image from images array
                    foreach ($img_json as $img) {
                        //   adding each image tag in $image variable with image url
                        $image .= '<img src="' . asset($img) . '"  width="50px"/></br>'; 
                    }
                    return $image;  //    returning image
                })
                ->editColumn('subcategory_name', function ($data) {
                    return $data->subcategory->subcategory_name;
                })
                ->editColumn('category_name', function ($data) {
                    return $data->category->category_name;
                })
                ->editColumn('brand_name', function ($data) {
                    return $data->brand->brand_name;
                })
                ->editColumn('pickup_point_name', function ($data) {
                    return $data->pickuppoint->pickup_point_name;
                })
                //    rawColumn is used when you want to show the data in same format without applying any processing or    
                ->rawColumns(['action', 'thumbnail', 'images', 'subcategory_name', 'category_name', 'brand_name', 'pickup_point_name', 'warehouse_name'])
                ->make(true);
        }
        return view("admin.products.index");
    }
//____________-end of product.index__________________


    //_______product.destroy__________
    public function destroy(Request $request, $id)
    {
        $product = Product::findOrfail($id);
        //  check thumbnail exists or not
        if (File::exists($product->thumbnail)) {
            $oldImage = $product->thumbnail;    //   get old image path
            @unlink($oldImage); //   delete old image from folder
            $imageArr = json_decode($product->images);  //     get all images and convert in array
            
            //     loop for each image and delete image from folder
            if (!empty($imageArr)) {    
                foreach ($imageArr as $img) {
                    @unlink($img); //   delete each image from folder
                }
            }
        }
        $product->delete();
        return response()->json('Product has been deleted!');
    }
}
