@extends('layouts.front')
@section('title')
Menus
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
                <div class="text-center container py-5">
                    <h4 class="mt-4 mb-5"><strong>Résultats du Menu Recherché</strong></h4>
                    @if ($menus_count > 0)
                        <span class=""><strong>{{ $menus_count }} Résultats Trouvés pour {{ $search_text }}</strong></span>
                    @else
                    <span class="text-secondary"><strong>Votre Recherche du Menu {{ $search_text }} n'a pas été Trouvés </strong></span>
                    <a href="{{ url('menus') }}">Cliquer ici pour voir les menus disponibles</a>
                    @endif


                    <div class="col-md-4 mb-2">
                        <form class="d-flex" role="search" action="{{ url('query') }}" method="GET">
                            <input class="form-control me-2" type="search" name="search" id="search" placeholder="Rechercher Menus ici" aria-label="Search">
                            <button class="btn btn-outline-success btn-sm" type="submit">Rechercher</button>
                        </form>
                    </div>
                    <div class="row">
                    @foreach ($menus as $item)
                    <div class="col-lg-4 col-md-12 mb-4">
                        <a href="{{ url('menus/'.$item->slug) }}">
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
                                </div>
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
                        </a>
                    </div>
                    @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>

@section('script')
<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })
</script>

@endsection


@endsection
