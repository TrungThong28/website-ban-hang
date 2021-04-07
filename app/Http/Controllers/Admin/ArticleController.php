<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Article;
use App\Category;
use Session;
if(!isset($_SESSION)){
    session_start();
}

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::latest()->paginate(15);

        return view('admin.article.index', [
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

        return view('admin.article.create', [
            'data' => $data
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
        //Kiem tra du lieu
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',

        ],[
            'name.required' => 'Trường này không được để trống',
            'description.required' => 'Trường này không được để trống'
        ]);

        $article = new Article(); // khởi tạo model
        $article->name = $request->input('name');
        $article->slug = Str::slug($request->input('name'));

        // Trạng thái
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $article->is_active = $request->input('is_active');
        }

        $article->user_name = session::get('user_name');
        $article->parent_id = $request->input('parent_id');
        $article->summary = $request->input('summary');
        $article->description = $request->input('description');
        $article->meta_title = $request->input('meta_title');
        $article->meta_description = $request->input('meta_description');
        $article->save();

        // chuyển hướng đến trang
        return redirect()->route('quan-tri.tin-tuc.index');
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
        $data = Category::all();

        $article = Article::find($id);

        if ($article) {
            return view ('admin.article.edit', [
                'article' => $article,
                'data' => $data,
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',

        ], [
            'name.required' => 'Trường này không được để trống',
            'description.required' => 'Trường này không được để trống'
        ]);

        $article = Article::findorFail($id); // khởi tạo model
        $article->name = $request->input('name');
        $article->slug = Str::slug($request->input('name'));

        // Trạng thái
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $article->is_active = $request->input('is_active');
        }

        $article->summary = $request->input('summary');
        $article->description = $request->input('description');
        $article->meta_title = $request->input('meta_title');
        $article->meta_description = $request->input('meta_description');
        $article->save();

        // chuyển hướng đến trang
        return redirect()->route('quan-tri.tin-tuc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);

        $dataResponse = [
            'status' => true
        ];

        return response()->json($dataResponse, 200);
    }
}
