<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Brand;
use DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Brand::all();

        return view ('admin.brand.index', [
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
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ], [
                'name.required' => 'Tên không được để trống',
                'image.required' => 'Ảnh không đúng định dạng'
        ]);

        //Khởi tạo Model và gán giá trị từ form cho những thuộc tính của đối tượng (cột trong CSDL)
        $brand = new Brand();
        $brand->name = $request->input('name');
        $brand->slug = Str::slug($request->input('name')); // slug

        //Luu hinh anh
        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/brands/'; // uploads/brand ; uploads/vendor
            // Thực hiện upload file
            $request->file('image')->move($path_upload,$filename);

            $brand->image = $path_upload.$filename;
        }

        // Trạng thái
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $brand->is_active = $request->input('is_active');
        }
        // Vị trí
        $brand->position = $request->input('position');
        // Lưu
        $brand->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('quan-tri.thuong-hieu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);

        if ($brand) {
            return view('admin.brand.edit', [
                'brand' => $brand
            ]);
        } else {

            return view ('admin.notfound');
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
        //validate dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ], [
            'name.required' => 'Tên không được để trống',
            'image.required' => 'Ảnh không đúng định dạng'

        ]);

        //Lấy đối tượng  và gán giá trị từ form cho những thuộc tính của đối tượng (cột trong CSDL)
        $brand = Brand::findorFail($id);
        $brand->name = $request->input('name');
        $brand->slug = Str::slug($request->input('name')); // slug

        if ($request->hasFile('new_image')) { // dòng này Kiểm tra xem có image có được chọn
            // xóa file cũ
            @unlink(public_path($brand->image)); // hàm unlink của PHP không phải laravel , chúng ta thêm @ đằng trước tránh bị lỗi
            // get new_image
            $file = $request->file('new_image');
            // đặt tên cho file new_image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/brands/';
            // Thực hiện upload file
            $request->file('new_image')->move($path_upload,$filename);

            $brand->image = $path_upload.$filename; // gán giá trị ảnh mới cho thuộc tính image của đối tượng
        }

        // Vị trí
        $brand->position = $request->input('position');
        // Trạng thái
        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $brand->is_active = $request->input('is_active');
        }

        // Lưu
        $brand->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('quan-tri.thuong-hieu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::destroy($id);

        $dataResponse = [
            'status' => true
        ];

        return response()->json($dataResponse, 200);
    }
}
