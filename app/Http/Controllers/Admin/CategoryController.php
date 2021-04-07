<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use App\Category;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::latest()->paginate(10);
        
        return view ('admin.category.index', [
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
        $data = Category::all();

        return view('admin.category.create', [
            'data' => $data, //truyền data sang view
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
        //validate
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ], [
                'name.required' => 'Tên không được để trống',
                'image.image' => 'Hình ảnh không đúng định dạng'

            ]);

        $is_active = 0;
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }

        //luu vào csdl
        $category = new Category;
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->parent_id = $request->input('parent_id');
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');

        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/category/';
            // upload file
            $request->file('image')->move($path_upload,$filename);

            $category->image = $path_upload.$filename;
        }

        $category->is_active = $is_active;
        $category->position = $request->input('position');
        $category->save();

        // chuyen dieu huong trang
        return redirect()->route('quan-tri.danh-muc.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Category::find($id);

        if ($data) {
            return view ('admin.category.show', [
                'data' => $data,
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
        $data = Category::all();
        $category = Category::find($id);

        if ($category) {
            return view ('admin.category.edit', [
                'data' => $data,
                'category' => $category
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
        //validate
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ], [
                'name.required' => 'Tên không được để trống'
        ]);

        $is_active = 0;
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }

        $category = Category::findorFail($id);
        $category->name = $request->input('name');
        $category->slug = str_slug($request->input('name'));
        $category->parent_id = $request->input('parent_id');
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->is_active = $is_active;

        if ($request->hasFile('new_image')) {
            // xóa file cũ
            @unlink(public_path($category->image));
            // get file mới
            $file = $request->file('new_image');
            // get tên
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/category/';
            // upload file
            $request->file('new_image')->move($path_upload,$filename);

            $category->image = $path_upload.$filename;
        }

        $category->position = $request->input('position');
        $category->save();

        // chuyen dieu huong trang
        return redirect()->route('quan-tri.danh-muc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);

        return response()->json([
            'status' => true,
        ], 200 );
    }

    //Code an hoăc kich hoat trang thai trong CSDL
    public function active ($id)
    {
        DB::table('categories')->where('id', $id)->update(['is_active'=> 0]);

        return redirect()->route('quan-tri.danh-muc.index');
    }

    public function unactive($id)
    {
        DB::table('categories')->where('id', $id)->update(['is_active'=> 1]);

        return redirect()->route('quan-tri.danh-muc.index');
    }
}
