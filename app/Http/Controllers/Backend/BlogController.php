<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        
        $data['collection'] = Blog::when(request('search'), function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->when(auth()->user()->authorities_id != 1, function ($query, $search) {
            return $query->where('created_by',  auth()->user()->id);
        })->paginate(10);
        return view('backend.blog.index', $data);
    }

    public function add()
    {
        $data['category'] = Category::where('visible', 'yes')->where('type', 'blog')->get();
        return view('backend.blog.add', $data);
    }

    function store(Request $req)
    {
        try {
            $create = Blog::create([
                'name' => $req->name,
                'category_id' => $req->category_id,
                'description' => $req->description,
                'overview' => $req->overview,
                'photo' => ($req->photo) ? $this->upload($req->photo, 'Blog') : '',
                'tags' => $req->tags,
                'meta_description' => $req->meta_description,
                'date' => $req->date,
                'meta_keyword' => $req->meta_keyword,
                'url' => Str::slug($req->name),
                'visible' => $req->visible ? 'yes' : 'no',
                'created_by' => auth()->user()->id
            ]);
            return [
                'code' => 200,
                'success' => true,
                'url' => url('blog')
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    public function edit($id)
    {
        $data['item'] = Blog::find($id);
        // return $data['item'];
        $data['category'] = Category::where('visible', 'yes')->where('type', 'blog')->get();
        return view('backend.blog.edit', $data);
    }

    function update(Request $req)
    {
        try {
            $data = Blog::find($req->id);
            $data->update([
                'name' => $req->name,
                'category_id' => $req->category_id,
                'description' => $req->description,
                'overview' => $req->overview,
                'photo' => ($req->photo) ? $this->upload($req->photo, 'Blog') : $data->photo,
                'tags' => $req->tags,
                'meta_description' => $req->meta_description,
                'meta_keyword' => $req->meta_keyword,
                'date' => $req->date,
                'url' => Str::slug($req->name),
                'visible' => $req->visible ? 'yes' : 'no'
            ]);
            return [
                'code' => 200,
                'success' => true,
                'url' => url('blog')
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    function delete(Request $req)
    {
        try {
            $data = Blog::find($req->id);
            $data->delete();
            return [
                'code' => 200,
                'success' => true,
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }
}
