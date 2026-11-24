<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Partner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public $title, $base_url;
    public function __construct()
    {
        $this->title = 'Katalog';
        $this->base_url = url('catalog');
    }
    public function index()
    {
        $data['collection'] = Catalog::when(request('search'), function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%');
            })
            ->paginate(10);
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.catalog.index', $data);
    }

    public function add()
    {
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
            return view('backend.catalog.add', $data);
    }

    function store(Request $req)
    {
        try {
            $create = Catalog::create([
                'title' => $req->title,
                'file' => ($req->file) ? $this->uploadPdf($req->file, 'file') : '',
                'visible' => $req->visible ? 'yes' : 'no',
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
        $data['item'] = Catalog::find($id);
        // return $data['item'];
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;

        return view('backend.catalog.edit', $data);
    }

    function update(Request $req)
    {
        try {
            $data = Catalog::find($req->id);
            $data->update([
                'title' => $req->title,
                'file' => ($req->file) ? $this->upload($req->file, 'file') : $data->file,
                'visible' => $req->visible ? 'yes' : 'no',
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
            $data = Catalog::find($req->id);
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
