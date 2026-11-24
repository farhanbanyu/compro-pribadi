<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AddOn;
use App\Models\CategoryAddOn;
use Illuminate\Http\Request;

class CategoryAddOnController extends Controller
{
    public function index()
    {
        $data['collection'] = CategoryAddOn::when(request('search'), function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })->orderBy('id', 'desc')->paginate(10);

        return view('backend.categoryaddon.index', $data);
    }

    public function add()
    {
        return view('backend.categoryaddon.add');
    }

    public function store(Request $req)
    {
        try {
            CategoryAddOn::create([
                'title' => $req->title,
            ]);
            return [
                'code' => 200,
                'success' => true,
                'url' => url('category-addon'),
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    public function edit($id)
    {
        $data['item'] = CategoryAddOn::findOrFail($id);
        return view('backend.categoryaddon.edit', $data);
    }

    public function update(Request $req)
    {
        try {
            $data = CategoryAddOn::findOrFail($req->id);
            $data->update([
                'title' => $req->title,
            ]);
            return [
                'code' => 200,
                'success' => true,
                'url' => url('category-addon'),
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    public function delete(Request $req)
    {
        try {
            $data = CategoryAddOn::findOrFail($req->id);
            AddOn::where('category_id', $data->id)->delete();
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
