<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CategoryMaterial;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\User;
use App\Models\UserPemasok;
use App\Models\UserPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public $user;
    public function __construct()
    {
        $user = null;
            $user = auth()->user();

        $this->user = $user;
    }
    public function index()
    {

        if ($this->user->authorities_id == 1) {
            $data['collection'] = Product::when(request('search'), function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })->paginate(10);
        } else {
            $data['collection'] = Product::where('user_id', $this->user->id)->when(request('search'), function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })->paginate(10);
        }
        return view('backend.product.index', $data);
    }

    public function add()
    {
        $data['category'] = CategoryProduct::data();
        $data['user'] = $this->user;
        return view('backend.product.add', $data);
    }

    function store(Request $req)
    {
        try {
                $other_photo = ($req->other_photo) ? $this->upload($req->other_photo, 'Product') : '';
                $name = $req->name;

            $create = Product::create([
                'name' => $name,
                'category_id' => $req->category_id,
                'description' => $req->description,
                'price' => $req->price,
                'photo' => ($req->photo) ? $this->upload($req->photo, 'Product') : '',
                'more_image_1' => ($req->more_image_1) ? $this->upload($req->more_image_1, 'Product') : '',
                'more_image_2' => ($req->more_image_2) ? $this->upload($req->more_image_2, 'Product') : '',
                'more_image_3' => ($req->more_image_3) ? $this->upload($req->more_image_3, 'Product') : '',
                'address' => $req->address,
                'button_link' => $req->button_link,
                'other_photo' => $other_photo,
                'city' => $req->city,
                'province' => $req->province,
                'volume' => $req->volume,
                'url' => Str::slug($name) . '-' . Str::slug($name),
                'user_id' => $this->user->authorities_id == 1 ? NULL : $this->user->id,
                'visible' => $req->visible ? 'yes' : 'no',
                'svsc' => $req->svsc ? 'yes' : 'no',
                'svlk' => $req->svlk ? 'yes' : 'no',
                'jass' => $req->jass ? 'yes' : 'no',
            ]);
            return [
                'code' => 200,
                'success' => true,
                'url' => url('product')
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    public function edit($id)
    {
        $data['item'] = Product::find($id);
        // return $data['item'];
        $data['category'] = CategoryProduct::data();
        $data['user'] = $this->user;
        return view('backend.product.edit', $data);
    }

    function update(Request $req)
    {
        try {
            $data = Product::find($req->id);
                $other_photo = $data->other_photo;
                $name = $req->name;

            $data->update([
                'name' => $name,
                'category_id' => $req->category_id,
                'description' => $req->description,
                'price' => $req->price,
                'photo' => ($req->photo) ? $this->upload($req->photo, 'Product') : $data->photo,
                'more_image_1' => ($req->more_image_1) ? $this->upload($req->more_image_1, 'Product') : $data->more_image_1,
                'more_image_2' => ($req->more_image_2) ? $this->upload($req->more_image_2, 'Product') : $data->more_image_2,
                'more_image_3' => ($req->more_image_3) ? $this->upload($req->more_image_3, 'Product') : $data->more_image_3,
                'address' => $req->address,
                'button_link' => $req->button_link,
                'other_photo' => $other_photo,
                'city' => $req->city,
                'province' => $req->province,
                'volume' => $req->volume,
                'url' => Str::slug($name) . '-' . Str::slug($name),
                'user_id' => $this->user->authorities_id == 1 ? NULL : $this->user->id,
                'visible' => $req->visible ? 'yes' : 'no',
                'svsc' => $req->svsc ? 'yes' : 'no',
                'svlk' => $req->svlk ? 'yes' : 'no',
                'jass' => $req->jass ? 'yes' : 'no',
            ]);
            return [
                'code' => 200,
                'success' => true,
                'url' => url('product')
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }

    function delete(Request $req)
    {
        try {
            $data = Product::find($req->id);
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
