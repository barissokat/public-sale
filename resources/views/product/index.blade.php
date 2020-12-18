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
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->due_date }}</td>
                        <td><a href="{{ route('products.show', $product) }}" class="btn btn-primary">Göster</a></td>
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
