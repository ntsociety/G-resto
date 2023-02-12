@extends('layouts.users')

@section('content')
    <div class="card">
        @if (session()->has('message'))
            <div class="alert alert-success" id="message">
                {{ session()->get('message') }}
            </div>
        @endif
        @if (session()->has('error'))
          <div class="alert alert-danger" id="error">
              {{ session()->get('error') }}
          </div>
        @endif
    </div>
<!-- Page Heading -->

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <a href="{{ url('/') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" target="_blank">
                Vister le Site</a>
  </div>

@if($carts->count() > 0)
<div class="container-fluid py-4 bg-gray">
    <div class="row bg-gray">

      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">

            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total Réservations :</p>
              <h4 class="mb-0">{{ $carts->count() }}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            @if ($carts_livr->count() == 1)
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">{{ $carts_livr->count() }} </span>Commande Livrée</p>
            @elseif($carts_livr->count() > 1)
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">{{ $carts_livr->count() }} </span>Commandes Livrées</p>
            @else
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>Vous avez reçu aucune livraison </p>
            @endif
            @if($carts_atte->count() > 0)
            @if($carts_atte->count() == 1)
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">{{ $carts_atte->count() }} </span>Commande en attente</p>
            @elseif($carts_atte->count() > 1)
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">{{ $carts_atte->count() }} </span>Commandes en attentes</p>
            @endif
            @endif
          </div>

        </div>
      </div>
    </div>
</div>

@else

<div class="card">
  <div class="card-title">
    <h2>
      Vos commandes apparaîtront ici
    </h2>
  </div>
</div>

@endif
@endsection
