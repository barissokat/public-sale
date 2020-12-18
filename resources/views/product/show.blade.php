@extends('layouts.app')

@section('content')
<div class="container">
    @include('alerts._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $product->name }}</h2>
                </div>
                <div class="card-body">
                    <img class="card-img-bottom" src="{{ $product->image_path }}" alt="{{ $product->name }}">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-header">
                    <h3>Ayrıntılar</h3>
                </div>
                <div class="card-body">
                    <dl class="dl-horizontal">
                        <dt>Fiyat: </dt>
                        <dd>{{ $product->price }}</dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Bitiş Tarihi: </dt>
                        <dd>{{ date('H:i - d.m.Y', strtotime($product->due_date)) }}</dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Eklenme Tarihi: </dt>
                        <dd>{{ date('H:i - d.m.Y', strtotime($product->created_at)) }}</dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Güncellenme Tarihi: </dt>
                        <dd>{{ date('H:i - d.m.Y', strtotime($product->updated_at)) }}</dd>
                    </dl>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>İşlemler</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('products.destroy', $product) }}" class="my-2">
                        @method('DELETE') @csrf
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-primary btn-block">Düzenle</a>
                        <button type="submit" class="btn btn-danger btn-block"
                            onclick="return confirm('Silme işlemini onaylıyor musunuz?')">Sil</button>
                        <a href="{{ route('products', $product) }}"
                            class="btn btn-secondary btn-block text-light">Geri</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
