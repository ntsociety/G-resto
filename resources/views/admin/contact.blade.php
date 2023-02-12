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
    @if($contact->count() > 0)
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if($contact->count() == 1)
            <h6 class="m-0 font-weight-bold text-primary">Vous avez {{ $contact->count() }} Message</h6>
            @else
            <h6 class="m-0 font-weight-bold text-primary">Vous avez {{ $contact->count() }} Messages</h6>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Sujet</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Sujet</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($contact as $item)
                        <tr>
                            <td>
                                <p class="text-xs ">{{ $item->id }}</p>
                            </td>
                            <td>
                                <p class="text-sm ">{{ $item->name }}</p>
                            </td>
                            <td>
                                <p class="text-sm ">{{ $item->sujet }}</p>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="card">
        <div class="card-header text-center">
            <h2>
                Vous n'avez pas encore de messages.
            </h2>
        </div>
    </div>
    @endif


</div>
<!-- /.container-fluid -->
@endsection
