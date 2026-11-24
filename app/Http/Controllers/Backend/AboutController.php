<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data['item'] = About::firstOrFail();
        return view('backend.about.index', $data);
    }

    function update(Request $req)
    {
        try {
            $data = About::find($req->id);
            $legality = [];
            foreach ($req->legality ?? [] as $key => $value) {
                $legality[] = ($value) ? $this->upload($value, 'Blog') : '';
            }
            $data->update([
                'title' => $req->title,
                'counter' => $req->counter,
                'title_counter' => $req->title_counter,
                'description' => $req->description,
                'overview' => $req->overview,
                'vision' => $req->vision,
                'file' => ($req->file) ? $this->upload($req->file, 'Blog') : $data->file,
                'file2' => ($req->file2) ? $this->upload($req->file2, 'Blog') : $data->file2,
                'file3' => ($req->file3) ? $this->upload($req->file3, 'Blog') : $data->file3,
                'mission' => $req->mission,
                'legality' => json_encode($legality) ?? [],
                'perjalanan' =>  $req->perjalanan,
                'video_timeline' => $req->video_timeline,
                'link_video_about' => $req->link_video_about,
                'management' => $req->management,
            ]);
            return [
                'code' => 200,
                'success' => true,
                'url' => url('about')
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }
}
