<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BannerContact;
use Illuminate\Http\Request;

class BannerContactController extends Controller
{
    public function index()
    {
        $data['item'] = BannerContact::firstOrFail();
        return view('backend.banner_contact.index', $data);
    }

    function update(Request $req)
    {
        try {
            $data = BannerContact::find($req->id);
            $data->update([
                'title' => $req->title,
                'description' => $req->description,
                'subtitle' => $req->subtitle,
                'button_text' => $req->button_text,
                'button_link' => $req->button_link,
                'file' => ($req->file) ? $this->upload($req->file, 'Banner') : $data->file,
            ]);
            return [
                'code' => 200,
                'success' => true,
                'url' => url('banner_contact')
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }
}
