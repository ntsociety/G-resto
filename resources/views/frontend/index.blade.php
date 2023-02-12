@extends('layouts.front')
@section('title')
    Bienvenue sur Dtech Resto
@endsection
@section('content')
<div class="card mt-5">
    @if (session()->has('message'))
        <div class="alert alert-success" id="message">
            {{ session()->get('message') }}
        </div>
    @endif
</div>


    @include('layouts.inc.slider')
<div class="py-5">
    <div class="container">


        <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title text-center">Nos Menus</h3>

						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
                                        @if ($menu->count() > 0)
                                            @foreach ($menu as $item)
                                            <div class="product">
                                                <div class="product-img">
                                                    <a href="{{ url('menus/'.$item->slug) }}"><img src="{{ asset('assets/menu/'.$item->image) }}" alt="" class="w-100 card-img-top"></a>
                                                    <div class="product-label">
                                                        @if ($item->special > 0)
                                                        <span class="new">Spécial</span>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">Catégorie : {{ $item->category->name }}</p>
                                                    <h3 class="product-name" style="text-transform: capitalize;"><a href="{{ url('menus/'.$item->slug) }}">{{ $item->name }}</a></h3>
                                                    <h4 class="product-price">{{ $item->price }} FCFA</h4>


                                                </div>
                                            </div>
                                            @endforeach
                                        @else
                                        <div class="card">
                                            <div class="card-title">
                                                <h3>
                                                    Pas de menus
                                                </h3>
                                            </div>
                                        </div>

                                        @endif
										<!-- /product -->


									</div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


        {{-- <section style="background-color: #eee;">
            <div class="container">
                <h4 class="mt-4 mb-5 text-center"><strong>Nos Menus</strong></h4>

                <div class="row">
                @foreach ($menu as $item)
                <div class="col-lg-3 col-md-12 mb-4">
                    <a href="{{ url('menus/'.$item->slug) }}">
                        <div class="card h-100 container">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                            data-mdb-ripple-color="light">
                            <img src="{{ asset('assets/menu/'.$item->image) }}"
                                class="w-100 card-img-top"/>
                                <div class="mask">
                                @if ($item->special > 0)
                                <div class="d-flex justify-content-start align-items-end">
                                    <h5><span class="badge bg-primary ms-2">Spécial</span></h5>
                                </div>

                                @endif

                                </div>
                            </div>
                            <div class="card-body">
                            <a href="" class="text-reset">
                                <h5 class="card-title mb-3">{{ $item->name }}</h5>
                            </a>
                            <a href="" class="text-reset">
                                <p>{{ $item->description }}</p>
                            </a>
                            <h6 class=" text-success text-borde" style="font-size:20px;">Prix : {{ $item->price }} FCFA</h6>

                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                </div>
            </div>
        </section> --}}

        <!-- about us -->
        <section id = "about" class = "py-5">
            <div class = "container">
                <div class = "row gy-lg-5 align-items-center">
                    <div class = "col-lg-6 order-lg-1 text-center text-lg-start">
                        <div class = "title pt-3 pb-5">
                            <h2 class = "position-relative d-inline-block ms-4">A Propos de Nous</h2>
                        </div>
                        <p class = "lead text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, ipsam.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem fuga blanditiis, modi exercitationem quae quam eveniet! Minus labore voluptatibus corporis recusandae accusantium velit, nemo, nobis, nulla ullam pariatur totam quos.</p>
                    </div>
                    <div class = "col-lg-6 order-lg-0">
                        <img src="{{ asset('assets/menu/'.$item->image) }}" style="width: 450px;">
                    </div>
                </div>
            </div>
        </section>
        <!-- end of about us -->

        <section style="background-color: #eee;">
            <div class="container py-5">
                <h4 class="mt-4 mb-5 text-center"><strong>Nos Menus Spécials</strong></h4>
                <div class="row justify-content-center mb-3">
                @foreach ($special_menu as $item)
                <div class="col-md-12 col-xl-10">
                    <div class="card shadow-0 border rounded-3">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                            <div class="bg-image hover-zoom ripple rounded ripple-surface">
                            <img src="{{ asset('assets/menu/'.$item->image) }}"
                                class="w-100 card-img-top" />
                            <a href="#!">
                                <div class="hover-overlay">
                                <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                </div>
                            </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                            <h5>{{ $item->name }}</h5>

                            <p class="text-truncate mb-4 mb-md-0">
                            {{ $item->description }}
                            </p>
                        </div>
                        <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                            <div class="d-flex flex-row align-items-center mb-1">
                            <h4 class="mb-1 me-1">{{ $item->price }} FCFA</h4>
                            </div>
                            <div class="d-flex flex-column mt-4">
                            @if ($item->special > 0)
                            <button class="btn btn-primary btn-sm" type="button">Spécial</button>
                            @endif
                            <a href="{{ url('menus/'.$item->slug) }}" class="btn btn-outline-primary btn-sm mt-2">
                                Réserver
                            </a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        </section>

        <!-- SECTION -->
		{{-- <div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-3">
                            @foreach ($special_menu as $item)
							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{ asset('assets/menu/'.$item->image) }}" class="w-100 card-img-top" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">{{ $item->description }}</p>
										<h3 class="product-name"><a href="#">{{ $item->name }}</a></h3>
										<h4 class="product-price">{{ $item->price }} FCFA </h4>
									</div>
								</div>
								<!-- /product widget -->
							</div>
                            @endforeach
						</div>
                        <div class="products-widget-slick" data-nav="#slick-nav-3">
                            @foreach ($special_menu as $item)
							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{ asset('assets/menu/'.$item->image) }}" class="w-100 card-img-top" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">{{ $item->description }}</p>
										<h3 class="product-name"><a href="#">{{ $item->name }}</a></h3>
										<h4 class="product-price">{{ $item->price }} FCFA </h4>
									</div>
								</div>
								<!-- /product widget -->
							</div>
                            @endforeach
						</div>
                        <div class="products-widget-slick" data-nav="#slick-nav-3">
                            @foreach ($special_menu as $item)
							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{ asset('assets/menu/'.$item->image) }}" class="w-100 card-img-top" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">{{ $item->description }}</p>
										<h3 class="product-name"><a href="#">{{ $item->name }}</a></h3>
										<h4 class="product-price">{{ $item->price }} FCFA </h4>
									</div>
								</div>
								<!-- /product widget -->
							</div>
                            @endforeach
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div> --}}
		<!-- /SECTION -->




    </div>
</div>


@endsection

