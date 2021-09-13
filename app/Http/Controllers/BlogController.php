<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->blog = new Blog();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'blog' => $this->blog->list()
        ];
        return view('blog', $data);
    }

    public function add()
    {
        return view('blog-add');
    }

    public function save(Request $request)
    {
        $slug = Str::slug(Request()->title, '-');
        $file = '';
        $id = Auth::user()->id;

        $validated = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'image' => 'required|mimes:jpg,jpeg,bmp,png,svg',
            'editordata' => 'required'
        ]);

        if ($validated->fails()) {
            return redirect('/blog/add')->with('failed-message', 'Data failed to save')->withErrors($validated, 'content');
        } else {
            if ($request->image->getClientOriginalName()) {
                $file = str_replace(' ', '_', $request->image->getClientOriginalName());
                $fileName =  date('mYdHs') . rand(1, 999) . '_' . $file;
                $request->image->storeAs('public/images/blogs', $fileName);
            }

            date_default_timezone_set('Asia/Jakarta');
            $data = [
                'blogTitle' => Request()->title,
                'blogSlug' => $slug,
                'blogContent' => Request()->editordata,
                'blogImage' => $fileName,
                'blogView' => 0,
                'blogDate' => date('Y-m-d H:i:s'),
                'blogUser' => $id,
            ];
            $this->blog->saveData($data);
            return redirect('/blog')->with('success-message', 'Data saved successfully');
        }
    }

    public function delete()
    {
        $id = Request()->id;
        $this->blog->deleteData($id);
        return redirect('/blog')->with('success-message', 'Data deleted successfully');
    }
}
