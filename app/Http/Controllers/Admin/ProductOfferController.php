<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;

class ProductOfferController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $offers = Offer::groupBy('product_id')->orderBy('price')->get();
        $offers = Offer::orderBy('price', 'desc')->get();

        return view('offers.index', compact('offers'));
    }
}
