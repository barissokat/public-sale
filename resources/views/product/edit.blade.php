@extends('layouts.app')

@section('content')
<div class="container">
    @include('alerts._messages')
    <form action="{{ route('products.update', $product) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Ürün Güncelle</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Ürün Adı</label>
                            <input id="inputName"
                                class="form-control form-control-lg {{ $errors->has('name') ? 'alert-danger' : '' }}"
                                type="text" name="name" placeholder="Ad" value="{{ $product->name }}" autofocus
                                required>
                            @if ($errors->has('name'))
                            <small id="nameHelp" class="form-text text-danger ">{!!
                                $errors->first('name') !!}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="inputImage">Görsel</label>
                            <input id="inputImage"
                                class="form-control form-control-lg {{ $errors->has('image') ? 'alert-danger' : '' }}"
                                type="file" name="image" placeholder="Ad">
                            @if ($errors->has('image'))
                            <small id="imageHelp" class="form-text text-danger ">{!!
                                $errors->first('image') !!}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="inputPrice">Başlangıç Fiyatı</label>
                            <input id="inputPrice"
                                class="form-control form-control-lg {{ $errors->has('price') ? 'alert-danger' : '' }}"
                                type="text" name="price" placeholder="Fiyat" value="{{ $product->price }}" required>
                            @if ($errors->has('price'))
                            <small id="priceHelp" class="form-text text-danger ">{!!
                                $errors->first('price') !!}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="inputDuedate">Bitiş Tarihi</label>
                            <input id="inputDuedate"
                                class="form-control form-control-lg {{ $errors->has('due_date') ? 'alert-danger' : '' }}"
                                type="date" name="due_date" placeholder="Bitiş Tarihi"
                                value="{{ date('Y-m-d',strtotime($product->due_date)) }}" required>
                            @if ($errors->has('due_date'))
                            <small id="dueDateHelp" class="form-text text-danger ">{!!
                                $errors->first('due_date') !!}</small>
                            @endif
                        </div>
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
                            <dt>Görsel: </dt>
                            <dd><img class="card-img-bottom" src="{{ $product->image_path }}"
                                    alt="{{ $product->name }}"></dd>
                        </dl>
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
                        <h3>Seçenekler</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $product) }}" class="my-2">
                            @method('PATCH') @csrf
                            <button type="submit" class="btn btn-success btn-block">Kaydet</button>
                            <a href="{{ route('products.show', $product) }}"
                                class="btn btn-primary btn-block">Vazgeç</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
