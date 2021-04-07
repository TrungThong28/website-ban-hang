<?php

namespace App\Http\Controllers\Admin;

use Aws\TranscribeService\TranscribeServiceClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Session;
if(!isset($_SESSION)){
    session_start();
}

class AdminController extends Controller
{
    public function index()
    {
    	return view('admin.dashboard');
    }

    public function login()
    {
    	return view('admin.login');
    }

    public function postLogin(Request $request)
    {
    	$request->validate([
    		'email' => 'required|string|email|max: 255',
    		'password' => 'required|string|min: 6'
    	]);

    	$data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        
        // Check success
        if (Auth::attempt($data, $request->has('remember'))) {
            if (Auth::user()->admin_id == 1 || 2) {

                //lay session id
                Session::put('user_id', Auth::user()->id);

                //Lay session name
                Session::put('user_name', Auth::user()->admin_name);
               
                //Hien thi thong bao khi dang nhap thanh cong
                Toastr::success('Bạn đã đăng nhập thành công','Chúc mừng');

                return redirect()->route('quan-tri.bang-dieu-khien');
            }

        } return redirect()->back()->with('msg', 'Email hoặc Password không hợp lệ');

    }

    public function logout()
    {
    	Auth::logout();

        //xóa session
        session()->forget('user_id');

    	return redirect()->route('dang-nhap');
    }

}
