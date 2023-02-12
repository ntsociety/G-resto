@extends('layouts.admin')

@section('content')
<div class="card">
    @if (session()->has('message'))
        <div class="alert alert-success" id="message">
            {{ session()->get('message') }}
        </div>
    @endif
</div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-bord" >Tableau de bord</h1>
        <a href="{{ url('/') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" target="_blank"><i
                class=""></i> Vister le Site</a>
    </div>
    <div class="container-fluid py-4 bg-gray">
        <div class="row bg-gray">
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">

                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Total Catégories :</p>
                  <h4 class="mb-0">{{ $category_count }}</h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">{{ $category_count }} </span>Catégories Enregistrées</p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">

                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Total Menus :</p>
                  <h4 class="mb-0">{{ $menu->count() }}</h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">{{ $menu->count() }} </span>Menus Enregistrées</p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">

                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Total Clients :</p>
                  <h4 class="mb-0">{{ $client->count() }}</h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">{{ $client->count() }}</span> Contacts Enregistrés</p>
              </div>
            </div>
          </div>
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
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">{{ $carts_livr->count() }} </span>Réservations Livrées</p>
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">{{ $carts_atte->count() }} </span>Réservations en attentes</p>
              </div>
            </div>
        </div>
    </div>

        <div class="row mb-4">
          <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
            <div class="card">
              <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6>Menus</h6>
                    <p class="text-sm mb-0">
                      <i class="fa fa-check text-info" aria-hidden="true"></i>

                      <span class="font-weight-bold ms-1">Liste des Menus récement ajouter</span>
                    </p>
                  </div>
                  <div class="col-lg-6 col-5 my-auto text-end">
                    <div class="dropdown float-lg-end pe-4">
                      <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-secondary"></i>
                      </a>
                      <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                        <li><a class="dropdown-item border-radius-md" href="{{ route('menu.create') }}">Ajouter un Menu</a></li>
                        <li><a class="dropdown-item border-radius-md" href="{{ route('menu.index') }}">Voir tous les Menus</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Catégorie</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Prix</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Catégorie</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Prix</th>
                                <th>Description</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($menus as $item)
                            <tr>
                                <td>
                                    <p class="text-xs ">{{ $item->id }}</p>
                                </td>
                                <td style="text-transform: capitalize;">
                                    <p class="text-sm ">{{ $item->category->name }}</p>


                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="{{ asset('assets/menu/'.$item->image) }}" class="avatar avatar-sm me-3 border-radius-lg img-ronded card-img-top" style="width: 50px; height: 50px; object-fit: cover; border-radius:100%;" alt="user1">
                                    </div>
                                    </div>
                                </td>
                                <td style="text-transform: capitalize;">
                                    <p class="text-sm ">{{ $item->name }}</p>
                                    @if ($item->special == '1')
                                    <p class="text-xs text-secondary mb-0">Spécial</p>
                                    @endif

                                </td>
                                <td>
                                    <p class="text-ms ">{{ $item->price }} FCFA</p>
                                </td>
                                <td>
                                    <p class="text-ms ">{{ $item->description }}</p>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card h-100">
              <div class="card-header pb-0">
                <h6>Réservations Récentes</h6>
                <p class="text-sm">
                  <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                  <span class="font-weight-bold">Plus de {{ $carts_att_count }} Réservations</span> En attentes
                </p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Menu</th>
                                <th>Clients</th>
                                <th>Quantité</th>
                                <th>Prix Unitaire</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Menu</th>
                                <th>Clients</th>
                                <th>Quantité</th>
                                <th>Prix Unitaire</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($carts_att as $item)
                            <tr>
                                <td>
                                    <p class="text-xs ">{{ $item->id }}</p>
                                </td>
                                <td>
                                    <p class="text-sm ">{{ $item->menu_name }}</p>
                                </td>
                                <td>
                                    <p class="text-sm ">{{ $item->name }}</p>
                                </td>
                                <td>
                                    <p class="text-sm ">{{ $item->quantity }}</p>
                                </td>
                                <td>
                                    <p class="text-ms ">{{ $item->price }} FCFA</p>
                                </td>



                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>


          </div>


        </div>



        <!--  footer   -->


      </div>

@endsection
