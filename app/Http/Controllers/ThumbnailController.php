<?php

namespace App\Http\Controllers;

use App\Models\Thumbnail;
use Illuminate\Http\Request;

class ThumbnailController extends Controller
{
    public function index() {
        $returnArr['thumbnails'] = Thumbnail::where(function ($query){
            if (isset($_GET['title']) && $_GET['title'] != '') {
                $query->where('name', 'LIKE', '%' . $_GET['title'] . '%' );
            }

        })->orderBy('created_at', 'desc')->paginate(10);
        return view('panel.admin.thumbnail.list', $returnArr);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required |unique:thumbnails,name',
            'pro_img.*' => 'required | image | mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->file('thumbnail')) {
            $thumbnail = $request['thumbnail'];
            $thumbName = "thumbnail_" . time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move(public_path() . '/thumbnail', $thumbName);
        }

        Thumbnail::create([
            'name'=>$request['title'],
            'thumbnail'=>$thumbName,
            'thumbnail_url'=>asset('thumbnail/'.$thumbName),
            ]);

        return redirect()->back()->with('success', 'Thumbnail added successfully.');
    }

    public function destroy($id) {
        $thumbnail = Thumbnail::findOrFail($id);
        if (\File::exists(public_path('thumbnail/' . $thumbnail->thumbnail))) {
            \File::delete(public_path('thumbnail/' . $thumbnail->thumbnail));
        }
        $thumbnail->delete();
        return redirect()->back()->with('success', 'Thumbnail deleted successfully.');
    }
}
