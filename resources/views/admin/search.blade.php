@extends('layouts.admin')

@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Résultats du Menu recherché</h1>
    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit..</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        @if ($menus_count > 0)
        <div class="card-header py-3">
            @if($menus_count == 1)
            <h6 class="m-0 font-weight-bold text-secondary">{{ $menus_count }} Menu Trouvé pour <span class="text-primary">{{ $search_text }}</span></h6>
            @else
            <h6 class="m-0 font-weight-bold text-secondary">{{ $menus_count }} Menus Trouvés pour <span class="text-primary">{{ $search_text }}</span></h6>
            @endif
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
                            <th>Action</th>
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
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($menus as $item)
                        <tr>
                            <td>
                                <p class="text-xs ">{{ $item->id }}</p>
                            </td>
                            <td>
                                <p class="text-sm ">{{ $item->category->name }}</p>


                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                <div>
                                    <img src="{{ asset('assets/menu/'.$item->image) }}" class="avatar avatar-sm me-3 border-radius-lg img-ronded" style="width: 50px; border-radius:100%;" alt="user1">
                                </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-sm ">{{ $item->name }}</p>
                                @if ($item->trending == '1')
                                <p class="text-xs text-secondary mb-0">Spécial</p>
                                @endif

                            </td>
                            <td>
                                <p class="text-ms ">{{ $item->price }} FCFA</p>
                            </td>
                            <td>
                                <p class="text-ms ">{{ $item->description }}</p>
                            </td>
                            <form action="{{ route('menu.destroy',$item->id) }}" method="POST">
                                <td class="align-middle" style="display: flex;">
                                <a href="{{ route('menu.edit',$item->id) }}" style="margin-right: 5px;" class="btn btn-sm btn-primary" data-toggle="tooltip" data-original-title="Edit user">
                                    Modifier
                                </a>
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
        @else
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Votre recherche du Menu {{ $search_text }} n'a pas été Trouvés</h6>
        </div>
        @endif

    </div>

</div>
<!-- /.container-fluid -->
@endsection
