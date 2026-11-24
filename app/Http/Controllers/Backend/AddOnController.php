<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AddOn;
use App\Models\CategoryAddOn;
use Illuminate\Http\Request;

class AddOnController extends Controller
{
    public function index()
    {
        $data['collection'] = AddOn::with('categoryAddOn')
            ->when(request('search'), function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('backend.addon.index', $data);
    }

    public function add()
    {
        $data['categories'] = CategoryAddOn::orderBy('title')->get();
        return view('backend.addon.add', $data);
    }

    public function store(Request $req)
    {
        try {
            AddOn::create([
                'title' => $req->title,
                'description' => $req->description,
                'file' => $req->hasFile('file') ? $this->upload($req->file('file'), 'AddOn') : '',
                'category_id' => $req->category_id,
                'visible' => $req->visible ? 'yes' : 'no',
            ]);
            return [
                'code' => 200,
                'success' => true,
                'url' => url('add-on'),
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    public function edit($id)
    {
        $data['item'] = AddOn::findOrFail($id);
        $data['categories'] = CategoryAddOn::orderBy('title')->get();
        return view('backend.addon.edit', $data);
    }

    public function update(Request $req)
    {
        try {
            $data = AddOn::findOrFail($req->id);
            $data->update([
                'title' => $req->title,
                'description' => $req->description,
                'file' => $req->hasFile('file') ? $this->upload($req->file('file'), 'AddOn') : $data->file,
                'category_id' => $req->category_id,
                'visible' => $req->visible ? 'yes' : 'no',
            ]);
            return [
                'code' => 200,
                'success' => true,
                'url' => url('add-on'),
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    public function delete(Request $req)
    {
        try {
            $data = AddOn::findOrFail($req->id);
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
