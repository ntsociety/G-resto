@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Ajouter Categorie</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="slug">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror" required autocomplete="description" autofocus placeholder="Description">{{ old('description') }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="special">Speciale</label>
                        <input type="checkbox" name="special">

                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
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
