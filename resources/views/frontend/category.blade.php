@extends('layouts.front')
@section('title')
    Catégories
@endsection
@section('content')
<div class="card">
    @if (session()->has('message'))
        <div class="alert alert-success" id="message">
            {{ session()->get('message') }}
        </div>
    @endif
</div>
    <div class="py-5">
        <div class="container">
            <section style="background-color: #eee;">
                @if($category)
                    <div class="text-center container py-5">
                        <h4 class="mt-4 mb-5"><strong>Toutes les Catégories</strong></h4>

                        <div class="row">
                        @foreach ($category as $item)
                        <div class="col-lg-3 col-md-12 mb-4">
                            <a href="{{ url('view-category/'.$item->slug) }}">
                                <div class="card h-100">
                                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                                    data-mdb-ripple-color="light">
                                    <img src="{{ asset('assets/category/'.$item->image) }}"
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
                                    </div>
                                    <div class="card-body">
                                    <a href="#" class="text-reset">
                                        <h5 class="card-title mb-3" style="text-transform: capitalize;">{{ $item->name }}</h5>
                                    </a>
                                    <a href="#" class="text-reset">
                                        <p>{{ $item->description }}</p>
                                    </a>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        </div>
                    </div>
                @endif
            </section>

        </div>
    </div>
@endsection
