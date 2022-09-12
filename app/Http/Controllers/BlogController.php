<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\BlogThumbnail;
use App\Models\Tag;
use App\Models\Thumbnail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public  function index() {
        $returnArr['posts'] = Blog::where(function ($query){
            if (isset($_GET['title']) && $_GET['title'] != '') {
                $query->where('title', 'LIKE', '%' . $_GET['title'] . '%' );
            }
        })->orderBy('created_at', 'desc')->paginate(5);
        return view('blog', $returnArr);
    }

    public function detail($id) {

    }

    public function create() {
        $returnArr['tags'] = Tag::get();
        $returnArr['thumbnails'] = Thumbnail::get();
        return view('panel.admin.blog-post.add_edit', $returnArr);
    }

    public function store(Request $request) {
        $request->validate([
            'title'=>'required|unique:blogs|max:150',
            'tags'=>'required',
            'thumbnail'=>'required',
            'post'=>'required',
        ]);

        $blog = new Blog();
        $blog->title = $request['title'];
        $blog->slug = Str::slug($request['title']);
        $blog->post = $request['post'];
        $blog->Save();

        BlogThumbnail::create([
            'blog_id'=>$blog->id,
            'thumbnail_id' => $request['thumbnail']
        ]);

        foreach ($request['tags'] as $tag) {
            BlogTag::create([
                'blog_id'=>$blog->id,
                'tag_id' =>$tag
            ]);
        }
        return redirect()->back()->with('success', 'Blog post added successfully.');
    }
}
