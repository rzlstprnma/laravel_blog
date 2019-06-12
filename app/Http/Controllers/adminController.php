<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use App\Skill;
use App\SocialMedia;
use App\Portfolio;
use App\Category;
use App\Tag;
use App\Post;
use App\User;

class adminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){
        $categories = Category::all();
        $tags = Tag::all();
        if($request->has('search')){
            $posts = Post::where('user_id', Auth::user()->id)->where('title', 'LIKE', '%'.$request->search.'%')->orderBy('isPublished', 'asc')->paginate(8);
        }else{
            $posts = Post::where('user_id', Auth::user()->id)->orderBy('isPublished', 'asc')->paginate(8);
        }

        return view('admin.home', compact('categories', 'tags', 'posts'));
    }

    public function profile(){
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        $skills = Skill::where('user_id', Auth::user()->id)->get();
        $socialMedias = SocialMedia::where('user_id', Auth::user()->id)->get();
        $portfolios = Portfolio::where('user_id', Auth::user()->id)->get();
        $user = User::where('id', Auth::user()->id)->first();
        return view('admin.profile', compact('user', 'profile', 'skills', 'socialMedias', 'portfolios'));
    }
}
