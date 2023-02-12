@extends('layouts.admin')

@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <div class="card">
        @if (session()->has('message'))
            <div class="alert alert-success" id="message">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables de Commendes</h1>
    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit..</p>

    <!-- DataTales Example -->
    @if($cart_count)
    @if($carts_att_count > 0)
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if($carts_att_count == 1)
            <h6 class="m-0 font-weight-bold text-primary">{{ $carts_att_count }} Commande en attente</h6>
            @else
            <h6 class="m-0 font-weight-bold text-primary">{{ $carts_att_count }} Commandes en attentes</h6>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Menu</th>
                            <th>Clients</th>
                            <th>Téléphone</th>
                            <th>Quantité</th>
                            <th>Prix Unitaire</th>
                            <th>Prix Total</th>
                            <th>Statut</th>
                            <th>Date</th>
                            <th>Date de réservation</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Menu</th>
                            <th>Clients</th>
                            <th>Téléphone</th>
                            <th>Quantité</th>
                            <th>Prix Unitaire</th>
                            <th>Prix Total</th>
                            <th>Statut</th>
                            <th>Date</th>
                            <th>Date de réservation</th>
                            <th>Action</th>
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
                                <p class="text-sm ">{{ $item->phone }}</p>
                            </td>
                            <td>
                                <p class="text-sm ">{{ $item->quantity }}</p>
                            </td>
                            <td>
                                <p class="text-ms ">{{ $item->price }} FCFA</p>
                            </td>
                            <td>
                                <p class="text-ms ">{{ $item->total_price }} FCFA</p>
                            </td>
                            <td>
                                <p class="text-ms text-primary">{{ $item->status }}</p>
                            </td>
                            <td>
                                <p class="text-ms ">{{Carbon\Carbon::parse($item->create_at)->format('Y-m-d')}}</p>
                            </td>
                            <td>
                                <p class="text-ms ">{{ $item->date_reserv}}</p>
                            </td>
                            <td class="align-middle" style="display: inline-flex;">
                            <a href="{{ route('admin.editcart',$item->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-original-title="Edit user">
                                Modifier
                            </a>
                            <a href="{{ url('https://wa.me/228'.$item->phone) }}" target="_blank" style="margin-left: 5px;">
                                <img src="{{ asset('frontend/WhatsApp_logo.png') }}" alt="whatsapp logo" width="30px" height="30px"></a>
                            </td>



                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    @if($carts_liv_count > 0)
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if($carts_liv_count == 1)
            <h6 class="m-0 font-weight-bold text-primary">{{ $carts_liv_count }} Commande Livrée</h6>
            @else
            <h6 class="m-0 font-weight-bold text-primary">{{ $carts_liv_count }} Commandes Livrées</h6>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Menu</th>
                            <th>Clients</th>
                            <th>Téléphone</th>
                            <th>Quantité</th>
                            <th>Prix Unitaire</th>
                            <th>Prix Total</th>
                            <th>Statut</th>
                            <th>Date</th>
                            <th>Date de réservation</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Menu</th>
                            <th>Clients</th>
                            <th>Téléphone</th>
                            <th>Quantité</th>
                            <th>Prix Unitaire</th>
                            <th>Prix Total</th>
                            <th>Statut</th>
                            <th>Date</th>
                            <th>Date de réservation</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($carts_liv as $item)
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
                                <p class="text-sm ">{{ $item->phone }}</p>
                            </td>
                            <td>
                                <p class="text-sm ">{{ $item->quantity }}</p>
                            </td>
                            <td>
                                <p class="text-ms ">{{ $item->price }} FCFA</p>
                            </td>
                            <td>
                                <p class="text-ms ">{{ $item->total_price }} FCFA</p>
                            </td>
                            <td>
                                <p class="text-ms text-success">{{ $item->status }}</p>
                            </td>
                            <td>
                                <p class="text-ms ">{{Carbon\Carbon::parse($item->created_at)->format('Y-m-d')}}</p>
                            </td>
                            <td>
                                <p class="text-ms ">{{$item->date_reserv}}</p>
                            </td>
                            <td class="align-middle">
                            <a href="{{ route('admin.editcart',$item->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-original-title="Edit user">
                                Modifier
                            </a>
                            <a href="{{ url('https://wa.me/228'.$item->phone) }}" target="_blank" style="margin-left: 5px;">
                                <img src="{{ asset('frontend/WhatsApp_logo.png') }}" alt="whatsapp logo" width="30px" height="30px"></a>
                            </td>



                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    @if($carts_an->count() > 0)
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if($carts_an->count() == 1)
            <h6 class="m-0 font-weight-bold text-primary">{{ $carts_an->count() }} Commande Annulée</h6>
            @else
            <h6 class="m-0 font-weight-bold text-primary">{{ $carts_an->count() }} Commandes Annulées</h6>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Menu</th>
                            <th>Clients</th>
                            <th>Téléphone</th>
                            <th>Quantité</th>
                            <th>Prix Unitaire</th>
                            <th>Prix Total</th>
                            <th>Statut</th>
                            <th>Date</th>
                            <th>Date de réservation</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Menu</th>
                            <th>Clients</th>
                            <th>Téléphone</th>
                            <th>Quantité</th>
                            <th>Prix Unitaire</th>
                            <th>Prix Total</th>
                            <th>Statut</th>
                            <th>Date</th>
                            <th>Date de réservation</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($carts_an as $item)
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
                                <p class="text-sm ">{{ $item->phone }}</p>
                            </td>
                            <td>
                                <p class="text-sm ">{{ $item->quantity }}</p>
                            </td>
                            <td>
                                <p class="text-ms ">{{ $item->price }} FCFA</p>
                            </td>
                            <td>
                                <p class="text-ms ">{{ $item->total_price }} FCFA</p>
                            </td>
                            <td>
                                <p class="text-ms text-danger">{{ $item->status }}</p>
                            </td>
                            <td>
                                <p class="text-ms ">{{Carbon\Carbon::parse($item->created_at)->format('Y-m-d')}}</p>
                            </td>
                            <td>
                                <p class="text-ms ">{{$item->date_reserv}}</p>
                            </td>
                            <form action="{{ route('admin.destroycarts',$item->id) }}" method="POST">
                                <td class="align-middle" style="display: inline-flex;">
                                    <a href="{{ route('admin.editcart',$item->id) }}" class="btn btn-sm btn-primary" style="margin-right: 5px;" data-toggle="tooltip" data-original-title="Edit user">
                                        Modifier
                                    </a>
                                    <a href="{{ url('https://wa.me/228'.$item->phone) }}" target="_blank" style="margin-right: 5px;">
                                    <img src="{{ asset('frontend/WhatsApp_logo.png') }}" alt="whatsapp logo" width="30px" height="30px"></a>
                                @csrf
                                @method('delete')
                                <button href="" class="btn btn-sm btn-outline-danger" onclick="return confirm('êtes-vous sûr de supprimer ça ?');" data-toggle="tooltip" data-original-title="Edit user">
                                    Supprimer
                                </button>
                                </td>
                            </form>



                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    @else
    <div class="card">
        <div class="card-header">
            <h2>
                Vous n'avez pas encore de commande
            </h2>
        </div>
    </div>
    @endif

</div>
<!-- /.container-fluid -->
@endsection
