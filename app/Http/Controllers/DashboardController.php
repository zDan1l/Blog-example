<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.post.index',[
            'post' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.post.create',[
            'categories' => Category::all()
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
       $data = $request->validate([
        'title' => 'required|max:255',
        'slug' => 'required|unique:posts',
        'category_id' => 'required',
        'image' => 'required|image',
        'body' => 'required'
       ]);

       if($request->file('image')){
        $data['image'] = $request->file('image')->store('data-image');
       }

       $data['user_id'] = auth()->user()->id;
       $data['excerpt'] = Str::limit(strip_tags($request->body), 100);

       Post::create($data);
       return redirect('/dashboard/post')->with('success', 'Post Successfull Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
       return view('dashboard.post.show',[
            'blog' => $post
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.post.edit',[
            'categories' => Category::all(),
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data =[
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'required|image',
            'body' => 'required'
        ];
        
        if($request->slug != $post->slug){
           
            $data['slug'] = 'required|unique:posts';
        }
        $validate = $request->validate($data);
        
        if($request->file('image')){
            if($post->image){
                Storage::delete($post->image);
            }
            $validate['image'] = $request->file('image')->store('data-image');
        }

        
       $validate['user_id'] = auth()->user()->id;
       $validate['excerpt'] = Str::limit(strip_tags($request->body), 100);

       Post::where('id', $post->id)
                ->update($validate);
       return redirect('/dashboard/post')->with('success', 'Post Successfull Has Been Updated');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('/dashboard/post')->with('success', 'Post Successfull Has Been Deleted');
         
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}