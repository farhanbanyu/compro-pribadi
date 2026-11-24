<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LowonganPekerjaan;
use Illuminate\Http\Request;

class LowonganPekerjaanController extends Controller
{
    public $title, $base_url;

    public function __construct()
    {
        $this->title = 'Lowongan Pekerjaan';
        $this->base_url = url('lowongan-pekerjaan');
    }

    public function index()
    {
        $data['collection'] = LowonganPekerjaan::when(request('search'), function ($query, $search) {
            return $query->where('judul_pekerjaan', 'like', '%' . $search . '%');
        })->paginate(10);
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.lowongan_pekerjaan.index', $data);
    }

    public function add()
    {
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.lowongan_pekerjaan.add', $data);
    }

    public function store(Request $req)
    {
        try {
            $create = LowonganPekerjaan::create([
                'judul_pekerjaan' => $req->judul_pekerjaan,
                'lokasi' => $req->lokasi,
                'tipe_pekerjaan' => $req->tipe_pekerjaan,
                'tanggal_mulai' => $req->tanggal_mulai,
                'tanggal_berakhir' => $req->tanggal_berakhir,
                'deskripsi' => $req->deskripsi,
                'kualifikasi' => $req->kualifikasi,
                'status' => $req->status,
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
        $data['item'] = LowonganPekerjaan::find($id);
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.lowongan_pekerjaan.edit', $data);
    }

    public function update(Request $req)
    {
        try {
            $data = LowonganPekerjaan::find($req->id);
            $data->update([
                'judul_pekerjaan' => $req->judul_pekerjaan,
                'lokasi' => $req->lokasi,
                'tipe_pekerjaan' => $req->tipe_pekerjaan,
                'tanggal_mulai' => $req->tanggal_mulai,
                'tanggal_berakhir' => $req->tanggal_berakhir,
                'deskripsi' => $req->deskripsi,
                'kualifikasi' => $req->kualifikasi,
                'status' => $req->status,
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
            $data = LowonganPekerjaan::find($req->id);
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

