@extends('layouts.app')

@section('content')
<div class="container">
    @include('alerts._messages')
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Ürün Ekle</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Ürün Adı</label>
                            <input id="inputName"
                                class="form-control form-control-lg {{ $errors->has('name') ? 'alert-danger' : '' }}"
                                type="text" name="name" placeholder="Ad" value="{{ old('name') }}" autofocus required>
                            @if ($errors->has('name'))
                            <small id="nameHelp" class="form-text text-danger ">{!!
                                $errors->first('name') !!}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="inputImage">Görsel</label>
                            <input id="inputImage"
                                class="form-control form-control-lg {{ $errors->has('image') ? 'alert-danger' : '' }}"
                                type="file" name="image" placeholder="Ad" value="{{ old('image') }}" required>
                            @if ($errors->has('image'))
                            <small id="imageHelp" class="form-text text-danger ">{!!
                                $errors->first('image') !!}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="inputPrice">Başlangıç Fiyatı</label>
                            <input id="inputPrice"
                                class="form-control form-control-lg {{ $errors->has('price') ? 'alert-danger' : '' }}"
                                type="text" name="price" placeholder="Fiyat" value="{{ old('price') }}" required>
                            @if ($errors->has('price'))
                            <small id="priceHelp" class="form-text text-danger ">{!!
                                $errors->first('price') !!}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="inputDuedate">Bitiş Tarihi</label>
                            <input id="inputDuedate"
                                class="form-control form-control-lg {{ $errors->has('due_date') ? 'alert-danger' : '' }}"
                                type="date" name="due_date" placeholder="Bitiş Tarihi" value="{{ old('due_date') }}" required>
                            @if ($errors->has('due_date'))
                            <small id="dueDateHelp" class="form-text text-danger ">{!!
                                $errors->first('due_date') !!}</small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>İşlemler</h3>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success btn-block" type="submit"> Kaydet</button>
                        <a href="{{ route('products') }}" class="btn btn-primary btn-block">Vazgeç</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
