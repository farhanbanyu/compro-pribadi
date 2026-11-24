<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public $title, $base_url;

    public function __construct()
    {
        $this->title = 'Office';
        $this->base_url = url('office');
    }

    public function index()
    {
        $data['collection'] = Office::when(request('search'), function ($query, $search) {
            return $query->where('nama_office', 'like', '%' . $search . '%');
        })->paginate(10);
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.office.index', $data);
    }

    public function add()
    {
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.office.add', $data);
    }

    public function store(Request $req)
    {
        try {
            $create = Office::create([
                'nama_office' => $req->nama_office,
                'alamat' => $req->alamat,
                'telepon' => $req->telepon,
                'gambar' => $req->gambar ? $this->upload($req->gambar, 'file') : '',
                'tipe' => $req->tipe,
            ]);

            return [
                'code' => 200,
                'success' => true,
                'url' => $this->base_url,
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    public function edit($id)
    {
        $data['item'] = Office::find($id);
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.office.edit', $data);
    }

    public function update(Request $req)
    {
        try {
            $data = Office::find($req->id);
            $data->update([
                'nama_office' => $req->nama_office,
                'alamat' => $req->alamat,
                'telepon' => $req->telepon,
                'gambar' => $req->gambar ? $this->upload($req->gambar, 'file') : $data->gambar,
                'tipe' => $req->tipe,
            ]);

            return [
                'code' => 200,
                'success' => true,
                'url' => $this->base_url,
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    public function delete(Request $req)
    {
        try {
            $data = Office::find($req->id);
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

