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
    <h1 class="h3 mb-2 text-gray-800">Listes de Clients</h1>
    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit..</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $clients_count }} Clients</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Addresse</th>
                            <th>whatsapp</th>
                            <th>Date</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Addresse</th>
                            <th>Whatsapp</th>
                            <th>Date</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($clients as $item)
                        <tr>
                            <td>
                                <p class="text-xs ">{{ $item->id }}</p>
                            </td>
                            <td>
                                <p class="text-sm " style="text-transform: capitalize">{{ $item->name }}</p>
                            </td>
                            <td>
                                <p class="text-sm " style="text-transform: capitalize">{{ $item->last_name }}</p>
                            </td>
                            <td>
                            @if($item->phone)
                                <p class="text-sm ">+228 {{ $item->phone }}</p>
                            @else
                            <p class="text-sm ">Pas de Téléphone</p>
                            @endif
                            </td>
                            <td>
                                <p class="text-sm ">{{ $item->email }}</p>
                            </td>
                            <td>
                                <p class="text-sm ">{{ $item->address }}</p>
                            </td>
                            <td>
                            @if($item->phone)
                                
                                    <a href="{{ url('https://wa.me/228'.$item->phone) }}" target="_blank">
                                        <img src="{{ asset('frontend/WhatsApp_logo.png') }}" alt="whatsapp logo" width="30px" height="30px"></a>
                                
                            @else
                                    <img src="{{ asset('frontend/WhatsApp_logo.png') }}" alt="whatsapp logo" width="30px" height="30px" onclick="return confirm('Ce client n\'a pas de numero téléphone');">
                            @endif
                            </td>
                            <td>
                                <p class="text-ms ">{{ $item->created_at }}</p>
                            </td>



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
