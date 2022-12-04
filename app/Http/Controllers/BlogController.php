<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');
        $topic = $request->input('topic');

        if ($search){
            $blogs = Blog::query()
                ->where('title', 'LIKE', "%{$search}%")
                ->orWhere('details', 'LIKE', "%{$search}%")
                ->get();
        }elseif($topic){
            $blogs = Blog::query()
                ->where('tags', 'LIKE', "%{$topic}%")
                ->get();
        }
        else{
            $blogs = Blog::latest()->get();
        }


        $tags = $blogs->pluck('tags');

        $tags = $tags->map(function ($item, $key) {
            return explode(",", $item);
        })->collapse()->all();


        return view('frontend.blog.index', compact('blogs', 'tags'));
    }

    public function details($id)
    {
        $blog = Blog::find($id);
        return view('frontend.blog.details', compact('blog'));
    }

}
