<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Vendor;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Vendor::all();

        return view ('admin.vendor.index', [
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
        return view ('admin.vendor.create');
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
        ], [

            'name.required' => 'Tên không được để trống',
            'image.required' => 'Ảnh không đúng định dạng',
            'email.required' => 'Email không để trống',
            'phone.required' => 'Số điện thoại không để trống',
            'address.required' => 'Địa chỉ không để trống',
        ]);

        //Khởi tạo Model và gán giá trị từ form cho những thuộc tính của đối tượng (cột trong CSDL)
        $vendor = new Vendor();
        $vendor->name = $request->input('name');
        $vendor->slug = Str::slug($request->input('name')); // slug

        // email
        $vendor->email = $request->input('email');
        // phone
        $vendor->phone = $request->input('phone');

        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/vendors/'; // uploads/brand ; uploads/vendor
            // Thực hiện upload file
            $request->file('image')->move($path_upload, $filename);

            $vendor->image = $path_upload.$filename;
        }

        // address
        $vendor->address = $request->input('address');

        // Vị trí
        $vendor->position = $request->input('position');

        // Trạng thái
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $vendor->is_active = $request->input('is_active');
        }

        // Lưu
        $vendor->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('quan-tri.nha-cung-cap.index');
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
        $data = Vendor::find($id);

        if ($data) {
            return view('admin.vendor.edit', [
                'data' => $data,
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
        ], [

            'name.required' => 'Tên không được để trống',
            'image.required' => 'Ảnh không đúng định dạng',
            'email.required' => 'Email không để trống',
            'phone.required' => 'Số điện thoại không để trống',
            'address.required' => 'Địa chỉ không để trống',
        ]);

        //Lấy đối tượng  và gán giá trị từ form cho những thuộc tính của đối tượng (cột trong CSDL)
        $vendor = Vendor::findorFail($id);
        $vendor->name = $request->input('name');
        $vendor->slug = Str::slug($request->input('name')); // slug

        // email
        $vendor->email = $request->input('email');
        // phone
        $vendor->phone = $request->input('phone');

        if ($request->hasFile('new_image')) { // dòng này Kiểm tra xem có image có được chọn
            // xóa file cũ
            @unlink(public_path($vendor->image)); // hàm unlink của PHP không phải laravel , chúng ta thêm @ đằng trước tránh bị lỗi
            // get new_image
            $file = $request->file('new_image');
            // đặt tên cho file new_image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/vendors/';
            // Thực hiện upload file
            $request->file('new_image')->move($path_upload,$filename);

            $vendor->image = $path_upload.$filename; // gán giá trị ảnh mới cho thuộc tính image của đối tượng
        }

        // địa chỉ
        $vendor->address = $request->input('address');

        // Trạng thái
        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $vendor->is_active = $request->input('is_active');
        }

        // Vị trí
        $vendor->position = $request->input('position');

        // Lưu
        $vendor->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('quan-tri.nha-cung-cap.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vendor::destroy($id);

        $dataResponse = [
            'status' => true
        ];

        return response()->json($dataResponse, 200);
    }
}
