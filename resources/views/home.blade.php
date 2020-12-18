@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('alerts._messages')
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        {{ __('Ürünler') }}
                    </div>
                    <div>
                        Krediniz: <span class="badge badge-success">{{ auth()->user()->credit }}</span>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-sm-4">
                            <div class="card mb-2" style="width: 18rem;">
                                <img src="{{ $product->image_path }}" class="card-img-top" alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Başlangıç Fiyatı: {{ $product->price }}</li>
                                    @foreach ($user_offers as $item)
                                    @if ($item->product_id == $product->id)
                                    <li class="list-group-item">Sizin Teklifiniz: {{ $item->price }}
                                    </li>
                                    @endif
                                    @endforeach
                                    <li class="list-group-item">Son Gün: {{ Carbon\Carbon::parse($product->due_date)->formatLocalized(' %d %B %Y') }}</li>
                                </ul>
                                <div class="card-body">
                                    <form action="{{ route('products.offer.store', $product) }}" method="post">
                                        @csrf
                                        <input id="inputPrice"
                                            class="form-control form-control mb-2 {{ $errors->has('price') ? 'alert-danger' : '' }}"
                                            type="text" name="price" placeholder="Teklifiniz" value="{{ old('price') }}"
                                            required>
                                        @if ($errors->has('price'))
                                        <small id="priceHelp" class="form-text text-danger ">{!!
                                            $errors->first('price') !!}</small>
                                        @endif
                                        <button type="submit" class="btn btn-primary btn-block">Teklif Ver</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
