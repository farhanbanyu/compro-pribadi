<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public $title, $base_url;

    public function __construct()
    {
        $this->title = 'Sertifikat';
        $this->base_url = url('certificate');
    }

    public function index()
    {
        $data['collection'] = Certificate::when(request('search'), function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })->paginate(10);
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.certificate.index', $data);
    }

    public function add()
    {
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.certificate.add', $data);
    }

    public function store(Request $req)
    {
        try {
            $create = Certificate::create([
                'title' => $req->title,
                'file' => $req->file ? $this->upload($req->file, 'file') : '',
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
        $data['item'] = Certificate::find($id);
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.certificate.edit', $data);
    }

    public function update(Request $req)
    {
        try {
            $data = Certificate::find($req->id);
            $data->update([
                'title' => $req->title,
                'file' => $req->file ? $this->upload($req->file, 'file') : $data->file,
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
            $data = Certificate::find($req->id);
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

