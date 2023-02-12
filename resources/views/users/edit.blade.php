@extends('layouts.users')

@section('content')
<div class="card">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
</div>
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Modifier Votre Profile!</h1>
                    </div>
                    <form class="user" action="{{ route('users.update-profile') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control form-control-user" id="name"
                                    name="name" value="{{ $user->name }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="name">Prénom</label>
                                <input type="text" class="form-control form-control-user" id="last_name"
                                    name="last_name" value="{{ $user->last_name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="name">Téléphone</label>
                                <input type="text" class="form-control form-control-user" id="phone"
                                    name="phone" value="{{ $user->phone }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="name">Addresse</label>
                                <input type="text" class="form-control form-control-user" id="address"
                                    name="address" value="{{ $user->address }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" class="form-control form-control-user" id="email"
                                name="email" value="{{ $user->email }}">
                        </div>

                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Modifier
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
