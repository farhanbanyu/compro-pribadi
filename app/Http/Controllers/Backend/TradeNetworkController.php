<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TradeNetwork;
use Illuminate\Http\Request;

class TradeNetworkController extends Controller
{
    public function index()
    {
        $data['item'] = TradeNetwork::firstOrFail();
        return view('backend.trade_networks.index', $data);
    }

    public function update(Request $req)
    {
        try {
            $data = TradeNetwork::find($req->id);
            $data->update([
                'name' => $req->name,
                'description' => $req->description,
                'photo' => ($req->photo) ? $this->upload($req->photo, 'Trade') : $data->photo,
            ]);

            return [
                'code' => 200,
                'success' => true,
                'url' => url('trade-networks')
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }
}
