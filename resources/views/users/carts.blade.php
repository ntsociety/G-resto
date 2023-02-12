@extends('layouts.users')

@section('content')
 <!-- Begin Page Content -->
<div class="container-fluid">
        <div class="card">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables de Commendes</h1>
        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit..</p>
    @if($carts->count() > 0)
        <!-- DataTales Example -->
        @if ($carts_atte->count() > 0)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @if ($carts_atte->count() == 1)
                <h6 class="m-0 font-weight-bold text-primary">{{ $carts_atte->count() }} Commande en attente</h6>
                    
                @else
                <h6 class="m-0 font-weight-bold text-primary">{{ $carts_atte->count() }} Commandes en attentes</h6>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Menu</th>
                                    <th>Quantité</th>
                                    <th>Prix Unitaire</th>
                                    <th>Prix Total</th>
                                    <th>Date de Réservation</th>
                                    <th>Statut</th>
                                    <th>Action</th>
        
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Menu</th>
                                    <th>Quantité</th>
                                    <th>Prix Unitaire</th>
                                    <th>Prix Total</th>
                                    <th>Date de Réservation</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($carts_atte as $item)
                                <tr>
                                    <td>
                                        <p class="text-xs ">{{ $item->id }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm ">{{ $item->menu_name }}</p>
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
                                        <p class="text-ms ">{{ $item->date_reserv }}</p>
                                    </td>
                                    <td>
                                        @if ($item->status == 'En attente')
                                        <p class="text-ms text-secondary">{{ $item->status }}</p>
                                        @elseif($item->status == 'Livré')
                                        <p class="text-ms text-success">{{ $item->status }}</p>
                                        @elseif($item->status == 'Annuler')
                                        <p class="text-ms text-danger">{{ $item->status }}</p>
                                        @endif
                                    </td>
                                    <form action="{{ route('users.delete-cart',$item->id) }}" method="POST">
                                        <td class="align-middle" style="display: flex;">
                                        @if($item->status == 'En attente')
                                            <a href="{{ route('users.edit-cart',$item->id) }}" style="margin-right: 5px;" class="btn btn-sm btn-primary" data-toggle="tooltip" data-original-title="Edit user">
                                                Modifier
                                            </a>
                                        @csrf
                                        @method('delete')
                                        <button href="" class="btn btn-sm btn-outline-danger" onclick="return confirm('êtes-vous sûr d\'annuler la commande ?');" data-toggle="tooltip" data-original-title="Edit user">
                                            Annuler
                                        </button>
                                        @endif
                                        </td>
                                    </form>
        
        
                                </tr>
                                @endforeach
        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
        </div>
        @endif

        @if ($carts_livr->count() > 0)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @if ($carts_livr->count() == 1)
                <h6 class="m-0 font-weight-bold text-primary">{{ $carts_livr->count() }} Commande en attente</h6>
                    
                @else
                <h6 class="m-0 font-weight-bold text-primary">{{ $carts_livr->count() }} Commandes en attentes</h6>
                @endif
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Menu</th>
                                    <th>Quantité</th>
                                    <th>Prix Unitaire</th>
                                    <th>Prix Total</th>
                                    <th>Date de Réservation</th>
                                    <th>Statut</th>
        
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Menu</th>
                                    <th>Quantité</th>
                                    <th>Prix Unitaire</th>
                                    <th>Prix Total</th>
                                    <th>Date de Réservation</th>
                                    <th>Statut</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($carts_livr as $item)
                                <tr>
                                    <td>
                                        <p class="text-xs ">{{ $item->id }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm ">{{ $item->menu_name }}</p>
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
                                        <p class="text-ms ">{{ $item->date_reserv }}</p>
                                    </td>
                                    <td>
                                        @if ($item->status == 'En attente')
                                        <p class="text-ms text-secondary">{{ $item->status }}</p>
                                        @elseif($item->status == 'Livré')
                                        <p class="text-ms text-success">{{ $item->status }}</p>
                                        @elseif($item->status == 'Annuler')
                                        <p class="text-ms text-danger">{{ $item->status }}</p>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
        
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        @endif

        @if ($carts_an->count() > 0)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @if ($carts_an->count() == 1)
                <h6 class="m-0 font-weight-bold text-primary">{{ $carts_an->count() }} Commande en attente</h6>
                    
                @else
                <h6 class="m-0 font-weight-bold text-primary">{{ $carts_an->count() }} Commandes en attentes</h6>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Menu</th>
                                    <th>Quantité</th>
                                    <th>Prix Unitaire</th>
                                    <th>Prix Total</th>
                                    <th>Date de Réservation</th>
                                    <th>Statut</th>
                                    <th>Action</th>
        
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Menu</th>
                                    <th>Quantité</th>
                                    <th>Prix Unitaire</th>
                                    <th>Prix Total</th>
                                    <th>Date de Réservation</th>
                                    <th>Statut</th>
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
                                        <p class="text-sm ">{{ $item->quantity }}</p>
                                    </td>
                                    <td>
                                        <p class="text-ms ">{{ $item->price }} FCFA</p>
                                    </td>
                                    <td>
                                        <p class="text-ms ">{{ $item->total_price }} FCFA</p>
                                    </td>
                                    <td>
                                        <p class="text-ms ">{{ $item->date_reserv }}</p>
                                    </td>
                                    <td>
                                        @if ($item->status == 'En attente')
                                        <p class="text-ms text-secondary">{{ $item->status }}</p>
                                        @elseif($item->status == 'Livré')
                                        <p class="text-ms text-success">{{ $item->status }}</p>
                                        @elseif($item->status == 'Annuler')
                                        <p class="text-ms text-danger">{{ $item->status }}</p>
                                        @endif
                                    </td>
                                    <form action="{{ route('users.delete-cart',$item->id) }}" method="POST">
                                        <td class="align-middle" style="display: flex;">
                                        @csrf
                                        @method('delete')
                                        @if($item->status == 'Annuler')
                                        <button href="" class="btn btn-sm btn-outline-danger" onclick="return confirm('êtes-vous sûr de supprimer ça ?');" data-toggle="tooltip" data-original-title="Edit user">
                                            Supprimer
                                        </button>
                                        @endif
                                        </td>
                                    </form>
        
        
                                </tr>
                                @endforeach
        
                            </tbody>
                        </table>
                    </div>
                </div>
            

            </div>
        
        </div>
        @endif

    @else
        <h6 class="m-0 font-weight-bold">Vous n'avez pas encore de Commandes <a href="{{ url('menus') }}">Cliquer ici pour commander</a></h6>

    @endif

</div>
<!-- /.container-fluid -->
@endsection
