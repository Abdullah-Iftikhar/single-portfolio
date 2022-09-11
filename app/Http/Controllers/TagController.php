<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index() {
        $returnArr['tags'] = Tag::where(function ($query){
            if (isset($_GET['tag']) && $_GET['tag'] != '') {
                $query->where('name', 'LIKE', '%' . $_GET['tag'] . '%' );
            }

        })->orderBy('created_at', 'desc')->paginate(10);
        return view('panel.admin.blog-tag.list', $returnArr);
    }

    public function store(Request $request) {
        $request->validate([
            'tag' => 'required |unique:tags,name'
        ]);

        Tag::create(['name'=>$request['tag']]);

        return redirect()->back()->with('success', 'Tag added successfully.');
    }

    public function destroy($id) {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->back()->with('success', 'Tag deleted successfully.');
    }
}
