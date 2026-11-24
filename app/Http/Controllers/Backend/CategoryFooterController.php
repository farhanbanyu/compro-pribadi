<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CategoryFooter;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryFooterController extends Controller
{
    public $title, $base_url;
    public function __construct()
    {
        $this->title = 'Kategori Menu Footer';
        $this->base_url = url('categoryfooter');
    }
    public function index()
    {
        $data['collection'] = CategoryFooter::when(request('search'), function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%');
            })
            ->paginate(10);
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.categoryfooter.index', $data);
    }

    public function add()
    {
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.categoryfooter.add', $data);
    }

    function store(Request $req)
    {
        try {
            $create = CategoryFooter::create([
                'title' => $req->title,
                'url' => Str::slug($req->title),
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
        $data['item'] = CategoryFooter::find($id);
        // return $data['item'];
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.categoryfooter.edit', $data);
    }

    function update(Request $req)
    {
        try {
            $data = CategoryFooter::find($req->id);
            $data->update([
                'title' => $req->title,
                'url' => Str::slug($req->title),
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
            $data = CategoryFooter::find($req->id);
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
