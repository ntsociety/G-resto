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
        <h1>Modifier Categorie</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" required name="name" value="{{ $category->name }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <input type="hidden" class="form-control" name="slug" value="{{ $category->slug }}">
                </div>
                <div class="col-md-6">
                    <label for="description">Description</label>
                    <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror" required>{{ $category->description }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="special">Spéciale</label>
                    <input type="checkbox" name="special" {{ $category->special ? 'checked':'' }}>

                </div>
                <div class="col-md-12">
                    @if ($category->image)
                        <img src="{{ asset('assets/category/'.$category->image) }}" style="width: 100px" alt="">
                    @endif
                    <input type="file" class="form-control @error('image') is-invalid @enderror"name="image">
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <input type="submit" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
