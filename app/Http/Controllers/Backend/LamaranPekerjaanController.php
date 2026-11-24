<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LamaranPekerjaan;
use App\Models\LowonganPekerjaan;
use Illuminate\Http\Request;

class LamaranPekerjaanController extends Controller
{
    public $title, $base_url;

    public function __construct()
    {
        $this->title = 'Lamaran Pekerjaan';
        $this->base_url = url('lamaran-pekerjaan');
    }

    public function index()
    {
        $data['collection'] = LamaranPekerjaan::with('lowongan')
            ->orderByDesc('created_at')
            ->paginate(10);
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.lamaran_pekerjaan.index', $data);
    }

    public function show($id)
    {
        $data['item'] = LamaranPekerjaan::with('lowongan')->find($id);
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.lamaran_pekerjaan.show', $data);
    }

    public function delete(Request $req)
    {
        try {
            $data = LamaranPekerjaan::find($req->id);
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

