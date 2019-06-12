<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Portfolio;
use App\Category;
use App\Tag;
use App\SocialMedia;
use App\Skill;
use App\Profile;
use App\User;   

class frontController extends Controller
{
    public function index(){
        $posts = Post::where('isPublished', 1)->paginate(6);
        return view('index', compact('posts'));
    }

    public function penulis(){
        $users = User::all();
        return view('penulis', compact('users'));
    }

    public function penulisShow($id){
        $user = User::find($id);
        return view('penulisShow', compact('user'));
    }

    public function blog(){
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::paginate(3);
        return view('blog', compact('categories', 'tags', 'posts'));
    }

    public function blogCategory($slug){
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Category::where('slug', $slug)->first();
        // dd($posts);
        return view('blog_category', compact('categories', 'tags', 'posts'));
    }

    public function blogTag($slug){
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Tag::where('slug', $slug);
        // dd($posts);
        return view('blog_tag', compact('categories', 'tags', 'posts'));
    }
}
