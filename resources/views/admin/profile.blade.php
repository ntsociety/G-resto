@extends('layouts.admin')

@section('content')

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Mon Profile!</h1>
                    </div>
                    <div class="user">

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <p type="text" class="form-control form-control-user">{{ $user->name }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p type="text" class="form-control form-control-user">{{ $user->last_name }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <p type="text" class="form-control form-control-user">{{ $user->phone }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p type="text" class="form-control form-control-user" row="3">{{ $user->address }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <p type="text" class="form-control form-control-user">{{ $user->email }}</p>
                        </div>



                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
