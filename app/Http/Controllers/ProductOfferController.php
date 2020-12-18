<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductOfferController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('due_date')->get();

        $user_offers = Offer::where('user_id', auth()->id())->get();

        return view('home', compact('products', 'user_offers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        request()->validate([
            'price' => 'required|integer|min:'.$product->price,
        ]);

        if (auth()->user()->credit >= request('price')) {
            $result = $product->giveOffer(request('price'));
        }
        else {
            return redirect()->route('home')->with('danger', 'Teklif vermek için yeterli krediniz bulunmamaktadır. ' . auth()->user()->credit . ' krediden düşük teklif verebilirsiniz.');
        }

        if ($result) {
            return redirect()->route('home')->with('success', 'Teklifiniz başarıyla kaydedildi.');
        }

        return redirect()->route('home')->with('danger', 'Teklifiniz en düşük tekliften fazla olmalıdır.');
    }
}
