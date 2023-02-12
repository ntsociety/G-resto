@extends('layouts.front')
@section('title', $menus->name)
@section('content')
<div class="container">
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container mt-5">
            <h6 class="mb-0">Menus / {{ $menus->category->name }} / {{ $menus->name }}</h6>
        </div>
    </div>
    <div class="container mb-5">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/menu/'.$menus->image) }}" alt="" class="w-100">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0" style="text-transform: capitalize;">{{ $menus->name }}
                            @if ($menus->special == 1)
                            <label for="" style="font-size: 16px" class="float-end badge bd-danger trending_tag">Populaire</label>
                            @endif
                        </h2>

                        <hr>
                        <label for="" class="me-3 text-success text-bord">Prix : {{ $menus->price }} FCFA </label>
                        <p class="mt-3">
                            {!! $menus->description !!}
                        </p>
                        <hr>


                            <div class="col-md-8">
                                <form action="{{ url('addcart',$menus->id) }}" method="POST">
                                    @csrf
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            <label for="Quantity">Quantité</label>
                                            <div class="input-group text-center mb-3" style="width: 130px;">
                                                <input type="number" name="quantity" class="form-control qty-input text-center @error('quantity') is-invalid @enderror" value="1" min="1">
                                                @error('qantity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="date reserv">Date de réservation</label>
                                            <div class="input-group text-center mb-3" style="width: 200px;">
                                                <input type="datetime-local" name="date_reserv" class="form-control qty-input text-center @error('date_reserv') is-invalid @enderror" required>
                                                @error('date_reserv')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary me-3 float-start"><i class="fa fa-shopping-cart "></i> Réserver</button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection


