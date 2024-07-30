<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $danhMuc = DanhMuc::get();
        $cart = session()->get('cart', []);
        $sum = 0;
        foreach ($cart as $item) {
            $total = (int)$item['quantity'] * $item['price'];
            $sum += $total;
        }
        return view('clients.cart.index', compact('cart', 'danhMuc', 'sum'));
    }

    public function add(Request $request)
    {
        $product = [
            'id' => $request->id,
            'avatar' => $request->hinh_anh,
            "name" => $request->name,
            "quantity" => $request->quantity,
            "price" => $request->price
        ];
        // dd($product);
        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            // dd($product);
            $cart[$request->id]['quantity'] += $request->quantity;
            // dd($cart[$request->id]['quantity']);
        } else {
            $cart[$request->id] = $product;
        }

        session()->put('cart', $cart);
        // session()->put('cart', []);
        // dd(session()->all());
        return redirect()->back();
        // return redirect()->route('cart.index');
    }

    public function update(Request $request)
    {
        $quantities = $request->input('quantities');
        $cart = session()->get('cart', []);
        // dd($quantities);

        foreach ($quantities as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantity;
            }
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        // dd($cart);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            // session()->put('cart', []);
        }

        return redirect()->route('cart.index');
    }
}
