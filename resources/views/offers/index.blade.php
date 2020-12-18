@extends('layouts.app')

@section('content')
<div class="container">
    @include('alerts._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kullanıcı</th>
                        <th scope="col">Ürün</th>
                        <th scope="col">Teklif</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offers as $offer)
                    <tr>
                        <th scope="row">{{ $offer->id }}</th>
                        <td>{{ $offer->product->name }}</td>
                        <td>{{ $offer->user->name }}</td>
                        <td>{{ $offer->price }}</td>
                        <td><a href="{{ route('offers.show', $offer) }}" class="btn btn-primary">Bitir</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>İşlemler</h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('products.create') }}" class="btn btn-success btn-block">Yeni Ürün Ekle</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
