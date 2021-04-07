<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Roles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Session;
if(!isset($_SESSION)){
    session_start();
}


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Admin::with('roles')->orderBy('admin_id','ASC')->paginate(5);
        
        return view ('admin.user.index', [
            'data' => $data
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view ('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        $validateData = $request->validate([
            'name' => 'required|max: 255',
            'email' => 'required|email',
            'password' => 'required|min: 6',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ], [
                'name.required' => 'Tên không được để trống',
                'email.required' => 'Email không được để trống',
                'password.required' => 'Mật khẩu không được để trống',
                'avatar.image' => 'Hình ảnh không đúng định dạng'

            ]);

        //Kiem tra is_active co ton tai khong?
        $is_active = 0;
        if ($request->has('is_active')) {
            $is_active = $request->input('is_active');
        }

        //Luu vao co so du lieu
        $user = new Admin();
        $user->admin_name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        // $user->admin_id = $request->input('role_id');

        if ($request->hasFile('avatar')) {
            //lay file
            $file = $request->file('avatar');

            //lay ten
            $fileName = time().'_'. $file->getClientOriginalName();

            //duong dan upload
            $path_upload = 'uploads/users/';

            //upload file
            $request->file('avatar')->move($path_upload, $fileName);

            $user->avatar = $path_upload.$fileName;
        }

        $user->is_active = $is_active;
        $user->save();

        //chuyen huong trang
        return redirect()->route('quan-tri.nguoi-su-dung.index');

    }

    public function assign_roles(request $request)
    {
        $user = Admin::where('email', $request->email)->first();
        $user->roles()->detach();

        if($request->author_role){
           $user->roles()->attach(Roles::where('name','author')->first());

        }else {
           $user->roles()->attach(Roles::where('name','admin')->first());

        }

        //Thông báo cấp quyền thành công cho người dùng
        Toastr::success('Trao quyền thành công cho người dùng','Chúc mừng');

        return redirect()->back();
    }

    //Code an hoăc kich hoat trang thai trong CSDL
    public function active ($id)
    {
        DB::table('tbl_admin')->where('id', $id)->update(['is_active'=> 0]);

        return redirect()->route('quan-tri.nguoi-su-dung.index');
    }

    public function unactive($id)
    {
        DB::table('tbl_admin')->where('id', $id)->update(['is_active'=> 1]);

        return redirect()->route('quan-tri.nguoi-su-dung.index');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     $data = Admin::find($id);

    //     return view ('admin.user.show', [
    //         'data' => $data,

    //     ]);
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     $user = Admin::find($id);

    //     return view ('admin.user.edit', [
    //         'user' => $user
    //     ]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //validate
    //     $validatedData = $request->validate([
    //         'name' => 'required|max:255',
    //         'email' => 'required|email',
    //         'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
    //     ], [
    //             'name.required' => 'Tên không được để trống',
    //             'email.required' => 'Email không được để trống',
    //             'avatar.image' => 'Hình ảnh không đúng định dạng'

    //         ]);

    //     $user = Admin::findorFail($id);

    //     $is_active = 0;
    //     if ($request->has('is_active')) { // kiem tra is_active co ton tai khong?
    //         $is_active = $request->input('is_active');
    //     }

    //     //luu vào csdl
    //     $user->admin_name = $request->input('name'); // họ tên
    //     $user->email = $request->input('email'); // email
    //     $user->admin_id = $request->input('role_id'); // phần quyền

    //     if ($request->input('new_password')) {
    //         $user->password = bcrypt($request->input('new_password')); // mật khẩu mới
    //     }

    //     if ($request->hasFile('new_avatar')) {
    //         // xóa file cũ
    //         @unlink(public_path($user->avatar)); // hàm unlink của PHP không phải laravel , chúng ta thêm @ đằng trước tránh bị lỗi
    //         // get file
    //         $file = $request->file('new_avatar');
    //         // get ten
    //         $filename = time().'_'.$file->getClientOriginalName();
    //         // duong dan upload
    //         $path_upload = 'uploads/users/';
    //         // upload file
    //         $request->file('new_avatar')->move($path_upload,$filename);

    //         $user->avatar = $path_upload.$filename;
    //     }

    //     $user->is_active = $is_active;
    //     $user->save();

    //     // chuyen dieu huong trang
    //     return redirect()->route('quan-tri.nguoi-su-dung.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        if (session::get('user_id') == $id) {
            Toastr::success('Tài khoản đang sử dụng','Không xóa');
        }else {
            Admin::destroy($id);

            $dataResponse = [
                'status' => true
            ];
        }
        return response()->json($dataResponse, 200);
    }
}
