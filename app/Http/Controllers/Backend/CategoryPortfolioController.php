<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CategoryPortfolio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryPortfolioController extends Controller
{
    public $title, $base_url;
    public function __construct()
    {
        $this->title = 'Kategori';
        $this->base_url = url('category-portfolio');
    }
    public function index()
    {
        $data['collection'] = CategoryPortfolio::where('type', 'portfolio')
            ->orderBy('type', 'ASC')
            ->orderBy('order', 'ASC')
            ->paginate(10);
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.categoryportfolio.index', $data);
    }

    public function add()
    {
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.categoryportfolio.add', $data);
    }

    function store(Request $req)
    {
        try {
            $create = CategoryPortfolio::create([
                'title' => $req->title,
                'type' => "portfolio",
                'order' => $req->order,
                'file' => ($req->file) ? $this->upload($req->file, 'file') : '',
                'visible' => $req->visible ? 'yes' : 'no',
                'url' => Str::slug($req->title),
                'description' => $req->description,
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
        $data['item'] = CategoryPortfolio::find($id);
        // return $data['item'];
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.categoryportfolio.edit', $data);
    }

    function update(Request $req)
    {
        try {
            $data = CategoryPortfolio::find($req->id);
            $data->update([
                'title' => $req->title,
                'type' => "portfolio",
                'file' => ($req->file) ? $this->upload($req->file, 'file') : $data->file,
                'order' => $req->order,
                'url' => Str::slug($req->title),
                'visible' => $req->visible ? 'yes' : 'no',
                 'description' => $req->description,
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
            $data = CategoryPortfolio::find($req->id);
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
