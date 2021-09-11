<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    public function index(){
        $data = Blog::paginate(10);
        return view('Admin-blog.index', compact('data'));
    }

    public function create(){
        return view('Admin-blog.create');
    }

    public function checkcreate(BlogRequest $request){
        $data = $request->all();
        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $imgName = $file->getClientOriginalName();
            $file->move('images/blog', $imgName);
            $data['thumbnail'] = $imgName;
        }
        
        $cre = new Blog($data);
        $cre->save();
        return redirect()->route('admin.blog');
    }

    public function update($id){
        $data = Blog::where('id_blog', $id)->first();
        //dd($data);
        return view('Admin-blog.update', compact('data'));
    }

    public function checkUpdate(Request $request){
        $blog = $request->all();

        $imageName = '';
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $imageName = $file->getClientOriginalName();
            $file->move("images/blog", $imageName);
        } else {
            $b = Blog::find($request->id);
            $imageName = $b->thumbnail;
        }
        $b = new Blog($blog);

        $b->thumbnail = $imageName;
        //dd($b);
        $b->exists = true;
        $b->save(); //insert $b vo bang tbbook

        return redirect('/admin/blog'); //quay ve trang book index
    }

    public function delete($id){
        $blog = Blog::find($id);
        $image = Blog::where('id_blog', $id)->select('thumbnail')->get();
        
        foreach($image as $item){
            $str = 'images/blog/'.$item['thumbnail'];
            unlink($str);
        }

        Blog::where('id_blog', $id)->delete();
        return redirect('admin/blog');
    }

    public function view($id){
        $data = Blog::find($id);
        return view('Admin-blog.view', compact('data'));
    }
}
