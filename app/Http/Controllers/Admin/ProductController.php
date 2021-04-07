<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Category;
use App\Product;
use App\Brand;
use App\Vendor;
use DB;
use Session;
if(!isset($_SESSION)){
    session_start();
}

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::latest()->paginate(10);

        return view('admin.product.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $vendors = Vendor::all();

        return view ('admin.product.create', [
            'categories' => $categories,
            'brands' => $brands,
            'vendors' => $vendors,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'stock' => 'required|max:255',
            'position' => 'required|max:255',
            'price' => 'required|max:255',
            'sale' => 'required|max:255',
            'sku' => 'required|max:255',
            'summary' => 'required|max:10000',
            'description' => 'required|max:10000',
            'detail' => 'required|max:1000000',
            'policy' => 'required|max:1000000',
            'meta_title' => 'required|max:10000',
            'meta_description' => 'required|max:10000',
        ], [

            'name.required' => 'Tên không được để trống',
            'image.required' => 'Ảnh không đúng định dạng',
            'stock.required' => 'Không được để trống',
            'position.required' => 'Không được để trống',
            'price.required' => 'Không được để trống',
            'sale.required' => 'Không được để trống',
            'sku.required' => 'Không được để trống',
            'summary.required' => 'Không được để trống',
            'description.required' => 'Không được để trống',
            'detail.required' => 'Không được để trống',
            'policy.required' => 'Không được để trống',
            'meta_title.required' => 'Không được để trống',
            'meta_description.required' => 'Không được để trống',
        ]);

        $product = new Product(); // khởi tạo model
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('name'));

        // Upload file
        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');

            // đặt tên cho file image
            $filename = '/'.time() . '_' . $file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image

            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = "uploads/products/";

            // Thực hiện upload file
            $request->file('image')->move($path_upload, $filename);

            $product->image = $path_upload . $filename;

        }

        $product->user_id = session::get('user_name');
        $product->stock = $request->input('stock'); // số lượng
        $product->position = $request->input('position'); // position
        $product->price = $request->input('price');
        $product->sale = $request->input('sale');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->vendor_id = $request->input('vendor_id');
        $product->sku = $request->input('sku');

        // Trạng thái
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $product->is_active = $request->input('is_active');
        }

        // Sản phẩm Hot
        if ($request->has('is_hot')){
            $product->is_hot = $request->input('is_hot');
        }

        $product->summary = $request->input('summary');
        $product->description = $request->input('description');
        $product->detail = $request->input('detail');
        $product->policy = $request->input('policy');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');

        //Luu
        $product->save();

        // chuyển hướng đến trang
        return redirect()->route('quan-tri.san-pham.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = Product::find($id);

        if ($data) {

        return view('admin.product.show', [
            'data' => $data
        ]);
            
        } else {
            
            return view('admin.notfound');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        $vendors = Vendor::all();

        if ($product) {
            return view ('admin.product.edit', [
                'product' => $product,
                'categories' => $categories,
                'brands' => $brands,
                'vendors' => $vendors,
            ]);
        } else {

             return view('admin.notfound');
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //check validatedData
        $validatedData = $request->validate([

            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ], [

            'name.required' => 'Tên không được để trống',
            'image.required' => 'Ảnh không đúng định dạng',
        ]);

        $product = Product::findorFail($id); // khởi tạo model
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->input('name'));

        // Thay đổi ảnh
        if ($request->hasFile('new_image')) {
            // xóa file cũ
            @unlink(public_path($product->image));
            // get file mới
            $file = $request->file('new_image');
            // get tên
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/products/';
            // upload file
            $request->file('new_image')->move($path_upload, $filename);

            $product->image = $path_upload.$filename;
        }

        $product->user_id = session::get('user_name');
        $product->stock = $request->input('stock'); // số lượng
        $product->position = $request->input('position');
        $product->price = $request->input('price');
        $product->sale = $request->input('sale');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->vendor_id = $request->input('vendor_id');
        $product->sku = $request->input('sku');
        $product->position = $request->input('position');

        // Trạng thái
        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $product->is_active = $request->input('is_active');
        }

        // Sản phẩm Hot
        if ($request->has('is_hot')) {
            $product->is_hot = $request->input('is_hot');
        }

        $product->summary = $request->input('summary');
        $product->description = $request->input('description');
        $product->detail = $request->input('detail');
        $product->policy = $request->input('policy');
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->save();

        // chuyển hướng đến trang
        return redirect()->route('quan-tri.san-pham.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        $dataResponse = [
            'status' => true
        ];

        return response()->json($dataResponse, 200);
    }

    //Code an hoăc kich hoat trang thai trong CSDL
    public function active ($id)
    {
        DB::table('products')->where('id', $id)->update(['is_active'=> 0]);

        return redirect()->route('quan-tri.san-pham.index');
    }

    public function unactive($id)
    {
        DB::table('products')->where('id', $id)->update(['is_active'=> 1]);

        return redirect()->route('quan-tri.san-pham.index');
    }
}
