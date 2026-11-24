<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TradeFinanceSupport;
use Illuminate\Http\Request;

class TradeFinanceSupportController extends Controller
{
    public function index()
    {
        $data['item'] = TradeFinanceSupport::firstOrFail();
        return view('backend.trade_finance_support.index', $data);
    }

    public function update(Request $req)
    {
        try {
            $data = TradeFinanceSupport::find($req->id);
            $data->update([
                'name' => $req->name,
                'description' => $req->description,
                'photo' => ($req->photo) ? $this->upload($req->photo, 'Trade') : $data->photo,
            ]);

            return [
                'code' => 200,
                'success' => true,
                'url' => url('trade-finance-support')
            ];
        } catch (\Throwable $th) {
            return errors($th);
        }
    }
}
