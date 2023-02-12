@extends('layouts.admin')

@section('content')
    <div class="card">
        @if (session()->has('message'))
            <div class="alert alert-success" id="message">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
    <div class="card">
        <div class="card-header">
            <h1>Modifier le Menu</h1>
        </div>
        <div class="card-body">
            <form class="form" role="form" action="{{ route('menu.update',$menus->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="cate_id" class="mt-4">Sélectiner une Catégorie:</label>
                            <select class="form-control @error('cate_id') is-invalid @enderror" id="cate_id" name="cate_id">
                                <option value="{{ $menus->category->id }}">{{ $menus->category->name }}</option>
                                @foreach ($category as $item)
                                <option style="text-transform: capitalize;" value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                            @error('cate_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name" class="mt-4">Nom du Produit</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $menus->name }}" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="slug" value="{{ $menus->slug }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="description" class="mt-4">Description:</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" required placeholder="Description du produit" value="{{ $menus->description }}">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="price" class="mt-4">Prix : (en CFA)</label>
                            <input type="number" step="0,01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" required placeholder="Prix" value="{{ $menus->price }}">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="special">Spécial</label>
                            <input type="checkbox" name="special" {{ $menus->special ? 'checked':'' }}>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            @if ($menus->image)
                                <img src="{{ asset('assets/menu/'.$menus->image) }}" style="width: 100px" alt="">
                            @endif
                            <label for="image" class="mt-4">Sélectionner une image:</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" style="margin-top:10px">Modifier</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
