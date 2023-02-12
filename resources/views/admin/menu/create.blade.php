@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Ajouter Menu</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('menu.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="cate_id" class="mt-4">Sélectiner une Catégorie:</label>
                        <select class="form-control @error('cate_id') is-invalid @enderror" id="cate_id" name="cate_id" value="{{ old('cate_id') }}" required>
                            <option value="" selected>--Sélectiner une Catégorie--</option>
                            @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                        <label for="name">Nom</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required value="{{ old('name') }}"autocomplete="name" autofocus placeholder="Nom">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="slug">
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror" required></textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="special">Spéciale</label>
                        <input type="checkbox" name="special" >

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="price" class="mt-4">Prix : (en CFA)</label>
                        <input type="number" step="0,01" class="form-control @error('price') is-invalid @enderror" id="price" name="price"  value="" required>
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
