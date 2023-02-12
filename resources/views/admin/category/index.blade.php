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
    <h1 class="h3 mb-2 text-gray-800">Tables de Catégories</h1>
    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit..</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <nav class="navbar navbar-expand-md navbar-light  shadow-sm">
                <div class="container-fluid">
                    <h6 class="m-0 font-weight-bold text-primary">Listes de Catégories</h6>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
    
                        </ul>
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            <a class="m-0 font-weight-bold text-primary" style="text-decoration: none;" href="{{ route('category.create') }}">Ajouter</a>
                            
                        </ul>
                    </div>
                </div>
            </nav>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($catego as $item)
                        <tr>
                            <td>
                                <p class="text-xs ">{{ $item->id }}</p>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                <div>
                                    <img src="{{ asset('assets/category/'.$item->image) }}" class="avatar avatar-sm me-3 border-radius-lg img-ronded card-img-top" style="width: 50px; height: 50px; object-fit: cover; border-radius:100%;" alt="user1">
                                </div>
                                </div>
                            </td>
                            <td style="text-transform: capitalize;">
                                <p class="text-sm ">{{ $item->name }}</p>
                                @if ($item->special == '1')
                                <p class="text-xs text-secondary mb-0">spéciale</p>
                                @endif

                            </td>
                            <td>
                                <p class="text-ms ">{{ $item->description }}</p>
                            </td>
                            <form action="{{ route('category.destroy',$item->id) }}" method="POST">
                                <td class="align-middle" style="display: flex;">
                                <a href="{{ route('category.edit',$item->id) }}" style="margin-right: 5px;" class="btn btn-sm btn-primary" data-toggle="tooltip" data-original-title="Edit user">
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
    </div>

</div>
<!-- /.container-fluid -->
@endsection
