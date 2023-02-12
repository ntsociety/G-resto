@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Modifier la Commande</h1>
    </div>
    <div class="card-body">
        <form class="form" role="form" action="{{ route('admin.updatecart',$cart->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">

                <div class="form-group col-lg-6">
                    <label for="status" class="mt-4">Sélectiner statut:</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status') }}" required>
                        <option value="" selected>{{ $cart->status}}</option>
                        @foreach ($status_list as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
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
