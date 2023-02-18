<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        
        $title = '';
        if(request('category')){
                $category = Category::firstWhere('slug', request( 'category'));
                $title= ' by : ' . $category->name;    
        }
        
        if(request('author')){
            $user = User::firstWhere('username', request( 'author'));
            $title= ' by : ' . $user->name;    
        }
            
        return view('blog', [
            
            "title" => 'All Post' . $title,
            "active" => 'blog',
            // "post"  => Post::all()
            "post" =>  Post::latest()->filter(request([ 'search','category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $blog){
        return view('posts',[
            "active" => 'blog',
            'title' => 'Single Posts',
            'blog' => $blog
           ]); 
    }

    
}