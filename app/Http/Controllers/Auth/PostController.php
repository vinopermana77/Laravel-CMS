<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Post\CreateRequest;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('gallery','category')->get();
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        try {
            if ($request->has('file')) {
                $file = $request->file;
                $fileName = time(). $file->getClientOriginalName();
                // $imagePath = public_path('storage/images/posts');
                $file->move('storage/images/posts', $fileName);
    
                $gallery = Gallery::create([
                    'image' => $fileName
                ]);
            }
    
            Post::create([
                'category_id' => $request->category,
                'is_publish' => $request->is_publish,
                'title' => $request->title,
                'description' => $request->description,
                'gallery_id' => $gallery->id
            ]);
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }

        return redirect()->route('posts.index')->with('success','Post Created Successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
