@extends('layouts.front')
@section('title')
{{ $category->name }}
@endsection
@section('content')
    <div class="card">
        @if (session()->has('message'))
            <div class="alert alert-success" id="message">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container mt-5">
            <h6 class="mb-0">/ {{ $category->name }}</h6>
        </div>
    </div>
    @if($menus->count() > 0)
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <h2 class="text-center" style="text-transform: capitalize;">{{ $category->name }}</h2>
                    @foreach ($menus as $item)
                    <div class="col-lg-4 col-md-12 mb-4">
                        <a href="{{ url('categories/'.$category->slug.'/'.$item->slug) }}">
                            <div class="card h-100">
                                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                                    data-mdb-ripple-color="light">
                                    <img src="{{ asset('assets/menu/'.$item->image) }}"
                                        class="w-100 card-img-top" />
                                    <a href="#!">
                                        <div class="mask">
                                            @if ($item->special > 0)
                                            <div class="d-flex justify-content-start align-items-end h-100">
                                                <h5><span class="badge bg-primary ms-2">Spécial</span></h5>
                                            </div>
                                            @endif

                                        </div>
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <a href="" class="text-reset">
                                            <h5 class="card-title mb-3" style="text-transform: capitalize;">{{ $item->name }}</h5>
                                        </a>
                                        <a href="" class="text-reset">
                                            <p>{{ $item->description }}</p>
                                        </a>
                                        <h6 class="mb-3 text-success text-borde">{{ $item->price }} FCFA</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endforeach


                </div>
            </div>
        </div>
    @else
        <div class="card center mb-5">
            <div class="card-header text-center">
                Cette catégorie n'a pas encore de Menus
            </div>
        </div>
    @endif


@endsection
