<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $data['collection'] = Faq::when(request('search'), function ($query, $search) {
            return $query->where('question', 'like', '%' . $search . '%');
        })->orderBy('sort_order')->paginate(10);

        return view('backend.faq.index', $data);
    }

    public function add()
    {
        return view('backend.faq.add');
    }

    public function store(Request $req)
    {
        try {
            $faq = Faq::create([
                'question'    => $req->question,
                'answer'      => $req->answer,
                'is_active'   => $req->has('is_active') ? 1 : 0,
                'sort_order'  => $req->sort_order ?? 0,
            ]);
            return [
                'code'    => 200,
                'success' => true,
                'url'     => url('faq')
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    public function edit($id)
    {
        $data['item'] = Faq::find($id);
        return view('backend.faq.edit', $data);
    }

    public function update(Request $req)
    {
        try {
            $faq = Faq::find($req->id);
            $faq->update([
                'question'    => $req->question,
                'answer'      => $req->answer,
                'is_active'   => $req->has('is_active') ? 1 : 0,
                'sort_order'  => $req->sort_order ?? 0,
            ]);
            return [
                'code'    => 200,
                'success' => true,
                'url'     => url('faq')
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    public function delete(Request $req)
    {
        try {
            $faq = Faq::find($req->id);
            if ($faq) {
                $faq->delete();
            }
            return [
                'code'    => 200,
                'success' => true,
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }
}
