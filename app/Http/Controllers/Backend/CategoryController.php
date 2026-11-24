<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Partner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $title, $base_url;
    public function __construct()
    {
        $this->title = 'Kategori';
        $this->base_url = url('category');
    }
    public function index()
    {
        $data['collection'] = Category::where('type', '!=', 'portfolio')
            ->when(request('search'), function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%');
            })
            ->orderBy('type', 'ASC')
            ->orderBy('order', 'ASC')
            ->paginate(10);
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.category.index', $data);
    }

    public function add()
    {
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        $data['partners'] = Partner::all();
        return view('backend.category.add', $data);
    }

    function store(Request $req)
    {
        try {
            $create = Category::create([
                'title' => $req->title,
                'type' => $req->type,
                'order' => $req->order,
                'file' => ($req->file) ? $this->upload($req->file, 'file') : '',
                'visible' => $req->visible ? 'yes' : 'no',
                'brand' => is_array($req->brand) ? json_encode($req->brand) : $req->brand,
                'url' => Str::slug($req->title),
                'description' => $req->description,
                'link' => $req->link,
            ]);
            return [
                'code' => 200,
                'success' => true,
                'url' => $this->base_url
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    public function edit($id)
    {
        $data['item'] = Category::find($id);
        // return $data['item'];
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        $data['partners'] = Partner::all();

        return view('backend.category.edit', $data);
    }

    function update(Request $req)
    {
        try {
            $data = Category::find($req->id);
            $data->update([
                'title' => $req->title,
                'type' => $req->type,
                'file' => ($req->file) ? $this->upload($req->file, 'file') : $data->file,
                'order' => $req->order,
                'brand' => is_array($req->brand) ? json_encode($req->brand) : $req->brand ,
                'url' => Str::slug($req->title),
                'visible' => $req->visible ? 'yes' : 'no',
                 'description' => $req->description,
                'link' => $req->link,

            ]);
            return [
                'code' => 200,
                'success' => true,
                'url' => $this->base_url
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    function delete(Request $req)
    {
        try {
            $data = Category::find($req->id);
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
