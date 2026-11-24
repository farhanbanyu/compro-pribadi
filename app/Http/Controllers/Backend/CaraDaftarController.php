<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CaraDaftar;
use Illuminate\Http\Request;

class CaraDaftarController extends Controller
{
    public function index()
    {
        $data['collection'] = CaraDaftar::when(request('search'), function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })->orderBy('id', 'desc')->paginate(10);

        return view('backend.caradaftar.index', $data);
    }

    public function add()
    {
        return view('backend.caradaftar.add');
    }

    public function store(Request $req)
    {
        try {
            CaraDaftar::create([
                'title' => $req->title,
                'description' => $req->description,
                'file' => $req->hasFile('file') ? $this->upload($req->file('file'), 'CaraDaftar') : '',
            ]);
            return [
                'code' => 200,
                'success' => true,
                'url' => url('cara-daftar'),
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    public function edit($id)
    {
        $data['item'] = CaraDaftar::findOrFail($id);
        return view('backend.caradaftar.edit', $data);
    }

    public function update(Request $req)
    {
        try {
            $data = CaraDaftar::findOrFail($req->id);
            $data->update([
                'title' => $req->title,
                'description' => $req->description,
                'file' => $req->hasFile('file') ? $this->upload($req->file('file'), 'CaraDaftar') : $data->file,
            ]);
            return [
                'code' => 200,
                'success' => true,
                'url' => url('cara-daftar'),
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    public function delete(Request $req)
    {
        try {
            $data = CaraDaftar::findOrFail($req->id);
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
