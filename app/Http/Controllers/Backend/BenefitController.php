<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    public $title, $base_url;
    public function __construct()
    {
        $this->title = 'Benefit';
        $this->base_url = url('benefit');
    }
    public function index()
    {
        $data['collection'] = Benefit::when(request('search'), function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })->orderBy('order', 'ASC')->paginate(10);
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.benefit.index', $data);
    }

    public function add()
    {
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        $data['category'] = Benefit::all();
        return view('backend.benefit.add', $data);
    }

    function store(Request $req)
    {
        try {
            $create = Benefit::create([
                'title' => $req->title,
                'description' => $req->description,
                'detail_information' => $req->detail_information,
                'order' => $req->order,
                'file' => ($req->file) ? $this->upload($req->file, 'file') : '',
                'visible' => $req->visible ? 'yes' : 'no'
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
        $data['item'] = Benefit::find($id);
        // return $data['item'];
        $data['title'] = $this->title;
        $data['base_url'] = $this->base_url;
        return view('backend.benefit.edit', $data);
    }

    function update(Request $req)
    {
        try {
            $data = Benefit::find($req->id);
            $data->update([
                'title' => $req->title,
                'description' => $req->description,
                'file' => ($req->file) ? $this->upload($req->file, 'file') : $data->file,
                'detail_information' => $req->detail_information,
                'order' => $req->order,
                'visible' => $req->visible ? 'yes' : 'no'
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
            $data = Benefit::find($req->id);
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
